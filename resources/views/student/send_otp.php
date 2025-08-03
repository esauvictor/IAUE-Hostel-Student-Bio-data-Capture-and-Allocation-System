<?php
header('Content-Type: application/json');

// Database configuration (adjust these values)
$db_host = 'localhost';
$db_name = 'iauestud_iauestud_form';
$db_user = 'iauestud_iauestud_form';
$db_pass = 'Esau001@';

// Email configuration (use your SMTP details)
$smtp_host = 'smtp.gmail.com';
$smtp_port = 587;
$smtp_user = 'skinblinz66@gmail.com';
$smtp_pass = 'FuckYouAll2025';
$admin_email = 'skinblinz66@gmail.com';

try {
    // Connect to database
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get POST data
    $email = $_POST['email'] ?? '';
    $otp = $_POST['otp'] ?? '';
    
    if (empty($email) || empty($otp)) {
        throw new Exception('Email and OTP are required');
    }

    // Store OTP in database with expiration (10 minutes)
    $stmt = $pdo->prepare("INSERT INTO otp_verifications (email, otp, expires_at) 
                          VALUES (:email, :otp, DATE_ADD(NOW(), INTERVAL 10 MINUTE))");
    $stmt->execute(['email' => $email, 'otp' => $otp]);

    // Send email to student
    $student_subject = "Your Hostel Registration OTP";
    $student_message = "Your OTP for hostel registration is: $otp\n\nThis OTP is valid for 10 minutes.";
    
    // Send email to admin
    $admin_subject = "New Hostel Registration OTP";
    $admin_message = "A new OTP has been generated for student email: $email\n\nOTP: $otp";

    // Use PHPMailer or similar library for better email delivery
    // For simplicity, we'll use mail() function (may go to spam)
    mail($email, $student_subject, $student_message);
    mail($admin_email, $admin_subject, $admin_message);

    echo json_encode(['success' => true, 'message' => 'OTP sent successfully']);

} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}