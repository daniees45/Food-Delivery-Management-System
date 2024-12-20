<?php
session_start();
header('Content-Type: application/json');

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FOOD_SERVICE";

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database Connection failed']);
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);

$email = $data['email2'] ?? '';
$Oldpassword = $data['Oldpass'] ?? '';
$Newpassword = $data['Newpass'] ?? '';

// Validate inputs
if (!$email || !$Oldpassword || !$Newpassword) {
    echo json_encode(['success' => false, 'message' => 'All fields are required']);
    exit();
}

// Validate password length
if (strlen($Newpassword) < 8) {
    echo json_encode(['success' => false, 'message' => 'Password must be at least 8 characters long']);
    exit();
}

// Prepare statement to find user
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param('s', $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verify old password
    if (password_verify($Oldpassword, $user['password'])) {
        // Hash new password before storing
        $hashedNewPassword = password_hash($Newpassword, PASSWORD_DEFAULT);
        
        // Update password
        $updateStmt = $conn->prepare('UPDATE users SET password = ? WHERE id = ?');
        $updateStmt->bind_param('si', $hashedNewPassword, $user['id']);

        if ($updateStmt->execute()) {
            echo json_encode([
                "success" => true,
                "message" => "Password changed successfully"
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Failed to update password"
            ]);
        }
        $updateStmt->close();
    } else {
        echo json_encode([
            'success' => false, 
            'message' => 'Incorrect old password'
        ]);
    }
} else {
    echo json_encode([
        'success' => false, 
        'message' => 'User not found'
    ]);
}

$stmt->close();
$conn->close();
?>