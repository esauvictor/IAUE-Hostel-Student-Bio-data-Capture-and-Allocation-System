<?php
header('Content-Type: application/json');

// Database configuration (same as above)
$db_host = 'localhost';
$db_name = 'iauestud_iauestud_form';
$db_user = 'iauestud_iauestud_form';
$db_pass = 'Esau001@';

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

    // Verify OTP
    $stmt = $pdo->prepare("SELECT * FROM otp_verifications 
                          WHERE email = :email AND otp = :otp 
                          AND expires_at > NOW() AND verified = 0");
    $stmt->execute(['email' => $email, 'otp' => $otp]);
    $otp_record = $stmt->fetch();

    if (!$otp_record) {
        throw new Exception('Invalid or expired OTP');
    }

    // Mark OTP as verified
    $update = $pdo->prepare("UPDATE otp_verifications SET verified = 1 WHERE id = :id");
    $update->execute(['id' => $otp_record['id']]);

    echo json_encode(['success' => true, 'message' => 'OTP verified successfully']);

} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}