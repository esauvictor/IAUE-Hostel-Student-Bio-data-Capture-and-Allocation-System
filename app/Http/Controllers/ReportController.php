<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\Hostel;
use Illuminate\Support\Facades\Log;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ReportController extends Controller
{
    public function report1($pid)
    {
        try {
            if (!is_numeric($pid)) {
                abort(400, 'Invalid student ID');
            }

            $registration = Hostel::findOrFail($pid);

            $pdf = App::make('dompdf.wrapper');

            $studentPhotoSrc = $this->getImageSource($registration->photo);
            $logoUrl = "https://iauestudentsaffairs.com/wp-content/uploads/2021/02/logo_png.png";
            $logoSrc = $this->getImageSource($logoUrl, true);
            $footerImageUrl = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXZAisM9c_2cSIFRQZ3MN5ZYT5b4x5JTvypA&s";
            $footerImageSrc = $this->getImageSource($footerImageUrl, true); // Optional now, can remove too

            $html = $this->generateHtmlContent($registration, $studentPhotoSrc, $logoSrc);

            $pdf->loadHTML($html);
           $studentName = preg_replace('/[^A-Za-z0-9_\-]/', '_', $registration->name);
$filename = $studentName . '_Student Hostel Data.pdf';
return $pdf->stream($filename); 

        } catch (\Exception $e) {
            Log::error('PDF generation failed: ' . $e->getMessage());
            abort(500, 'Failed to generate PDF. Please try again later.');
        }
    }

    private function getImageSource($path, $isUrl = false)
    {
        try {
            $imageContent = $isUrl ? file_get_contents($path) : file_get_contents(public_path($path));
            if ($imageContent === false) {
                throw new \Exception("Failed to read image");
            }
            $imageData = base64_encode($imageContent);
            return 'data:image/' . pathinfo($path, PATHINFO_EXTENSION) . ';base64,' . $imageData;
        } catch (\Exception $e) {
            Log::warning('Image processing error: ' . $e->getMessage());
            return $this->getPlaceholderImage();
        }
    }

    private function getPlaceholderImage()
    {
        $placeholder = public_path('images/placeholder.jpg');
        if (file_exists($placeholder)) {
            $imageData = base64_encode(file_get_contents($placeholder));
            return 'data:image/jpeg;base64,' . $imageData;
        }

        return 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=';
    }

    private function generateHtmlContent($registration, $studentPhotoSrc, $logoSrc)
    {
        $css = $this->getCssStyles();
        $header = $this->getHeaderContent($logoSrc);
        $studentInfo = $this->getStudentInfoContent($registration, $studentPhotoSrc);
        $dataTable = $this->getDataTableContent($registration);
        $qrCodeSection = $this->getQrCodeSection($registration->id);

        return <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student Hostel Data - {$registration->name}</title>
    <link rel="icon" href="https://iaue.edu.ng/favicon.ico" type="image/x-icon">
    <style>{$css}</style>
</head>
<body>
    {$header}
    {$studentInfo}
    {$dataTable}
    {$qrCodeSection}
</body>
</html>
HTML;
    }

private function getCssStyles()
{
    return <<<CSS
body {
    margin: 0;
    padding: 10px 14px;
    font-family: 'Arial', sans-serif;
    font-size: 12.5px;
    font-weight: bold;
    color: #2C2C2C;
    line-height: 1.4;
    background-color: #FFFFFF;
}

.header {
    text-align: center;
    margin-bottom: 4px;
}

.header img {
    width: 65px;
    height: auto;
}

.university-name {
    text-align: center;
    font-size: 17px;
    font-weight: bold;
    text-transform: uppercase;
    margin: 3px 0;
}

.report-title {
    text-align: center;
    font-size: 13px;
    font-weight: bold;
    color: #007B5E;
    margin: 0;
    text-transform: uppercase;
}

.student-photo {
    width: 65px;
    height: 65px;
    border-radius: 50%;
    object-fit: cover;
    margin: 4px auto;
    border: 2px solid #2C2C2C;
}

.student-name {
    text-align: center;
    background-color: #F5F5F5;
    padding: 5px;
    font-size: 13px;
    color: #2C2C2C;
    font-weight: bold;
    text-transform: uppercase;
    border: 1px solid #CCCCCC;
    margin-bottom: 6px;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
    margin: 6px 0;
    font-size: 12px;
    font-weight: bold;
}

.data-table td {
    padding: 6px 8px;
    border: 1px solid #999999;
    color: #2C2C2C;
}

.data-table td:first-child {
    font-weight: bold;
    font-style: italic;
    width: 40%;
    color: #111111;
}

.qr-section {
    text-align: center;
    margin-top: 10px;
}

.qr-section p {
    font-size: 12px;
    font-weight: bold;
    margin-bottom: 4px;
}

.qr-code-img {
    width: 85px;
    height: 85px;
    padding: 2px;
    border: 1.5px solid #2C2C2C;
}
CSS;
}



    private function getHeaderContent($logoSrc)
    {
        return <<<HTML
<div class="header">
    <img src="{$logoSrc}" alt="University Logo"/>
    <h2 class="university-name">IGNATIUS AJURU UNIVERSITY OF EDUCATION</h2>
    <h1 class="report-title">Student Hostel Data</h1>
</div>
HTML;
    }

    private function getStudentInfoContent($registration, $studentPhotoSrc)
    {
        return <<<HTML
<table class="data-table">
    <tr>
        <td colspan="2" style="text-align: center; padding-bottom: 10px;">
            <img src="{$studentPhotoSrc}" class="student-photo" alt="Student Photo"/>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="student-name">{$registration->name}</td>
    </tr>
HTML;
    }

    private function getDataTableContent($registration)
    {
        $rows = [
            ['Mat/Reg.No.', $registration->matriculation_number],
            ['Date of Birth', \Carbon\Carbon::parse($registration->date_of_birth)->format('jS F, Y')],
            ['Marital Status', $registration->marital_status],
            ['Year of Entry', $registration->year_of_entry],
            ['Level', $registration->level],
            ['Sex', $registration->sex],
            ['Department', $registration->department],
            ['State of Origin', $registration->state_of_origin],
            ['Faculty', $registration->faculty],
            ['Campus', $registration->campus],
            ['LGA', $registration->local_government_area],
            ['Residential Address', $registration->residential_address],
            ['Phone Number', $registration->phone_number],
            ['Hostel Choice', $registration->hostel_choice],
            ['Email', $registration->email],
            ['Club Membership', $registration->club_membership],
            ['Status', $registration->status],
            ['Application Date', $registration->created_at->format('jS F, Y')],
            ['Assigned Room', $registration->assigned_Room],
        ];

        $html = '';
        foreach ($rows as $row) {
            $html .= <<<HTML
    <tr>
        <td><strong>{$row[0]}</strong></td>
        <td>{$row[1]}</td>
    </tr>
HTML;
        }

        return $html . '</table>';
    }

    private function getQrCodeSection($pid)
    {
        $documentLink = "https://hostel.iauestudentsaffairs.com/admin/report/report1/{$pid}";

        $qrCode = base64_encode(
            QrCode::format('svg')->size(150)->generate($documentLink)
        );
        $qrImageSrc = 'data:image/svg+xml;base64,' . $qrCode;

        return <<<HTML
<div class="qr-section">
    <p><strong>Scan this code to verify this document online:</strong></p>
    <img src="{$qrImageSrc}" alt="QR Code" class="qr-code-img" />
</div>
HTML;
    }
}
