<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Hostel;
use Intervention\Image\ImageManager;
use Illuminate\Database\QueryException;

class StudentController extends Controller
{
    /**
     * Display the registration form.
     */
    public function registration()
    {
        return view('student.index');
    }

    /**
     * Handle new student registration.
     */
    public function registerPost(Request $request, ImageManager $imageManager)
    {
        // Validate form data
        $validated = $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'name' => 'required|string|max:255',
            'matriculation_number' => 'required|string|unique:hostels,matriculation_number',
            'state_of_origin' => 'required|string|max:255',
            'residential_address' => 'required|string|max:500',
            'phone_number' => 'required|string|max:20|unique:hostels,phone_number',
            'email' => 'required|email|unique:hostels,email',
            'sex' => 'required|string',
            'marital_status' => 'required|string',
            'campus' => 'required|string',
            'hostel_choice' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'faculty' => 'required|string|max:255',
            'year_of_entry' => 'required|integer|min:1900|max:' . date('Y'),
            'date_of_birth' => 'required|date',
            'acknowledgement_of_consent' => 'required',
            'local_government_area' => 'required|string|max:255',
            'level' => 'required|string|max:50',
            'club_membership' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ], [
            'phone_number.unique' => 'This phone number has already been used.',
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '_' . uniqid() . '.jpg';

            $image = $imageManager->read($file)->scale(width: 300); // Resize to width 300px, auto height

            // Compress to fit ~36KB
            $quality = 90;
            do {
                $encoded = (string) $image->toJpeg(quality: $quality);
                $size = strlen($encoded);
                $quality -= 5;
            } while ($size > 36864 && $quality > 10);

            // Save to storage
            Storage::disk('public')->put("images/{$fileName}", $encoded);
            $validated['photo'] = "/storage/images/{$fileName}";
        }

        // Create student record
        try {
            $hostel = Hostel::create($validated);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return back()
                    ->withErrors(['phone_number' => 'This phone number has already been used.'])
                    ->withInput();
            }

            throw $e;
        }

        if ($hostel) {
            return redirect()
                ->route('register.post')
                ->with('success', 'We are pleased to inform you that your records have been successfully submitted and processed. You are now kindly requested to come in person to complete the next step, which is your allocation. Please ensure you bring any required documents with you, and feel free to contact us if you have any questions or need further assistance. We look forward to seeing you soon.');
        }

        return redirect()
            ->route('register.post')
            ->with('error', 'Registration failed. Please try again.');
    }
}
