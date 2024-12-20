<?php
session_start();
header('Content-Type: application/json');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FOOD_SERVICE";



// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    echo json_encode(['success' => false,'error'=> 'Database Connection failed']);
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);

$email = $data['email1'] ?? '';
$password = $data['password1'] ?? '';

 if (!$email || !$password) {
     echo json_encode(['success' => false, 'error' => 'Email or password not provided']);
    exit();
}    

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param('s', $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
            $del = $conn->prepare('DELETE FROM users WHERE id = ?');
            $del->bind_param('i', $user['id']);

            if ($del->execute()) {
                echo json_encode([
                    "success" => true,
                    "message" => "user account deleted successfully"
                ]);
            }else {
                echo json_encode([
                    "success" => false,
                    "message"=> "Wrong password"
                    ]);
            }
    }else {
        echo json_encode([
            'status'=> false, 'error'=> 'No Users found'
        ]);
    }
}
$stmt->close();
$conn->close();
?>