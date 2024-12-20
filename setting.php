<?php
session_start();
header('Content-Type: application/json');

// Check if the user is logged in by verifying session data


// Get user data from POST request




// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FOOD_SERVICE";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]);
    exit();
}
$surname = $_POST['surname'];
$firstname = $_POST['firstname'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$user_id = $_POST['id'];
$addr = $_POST['address'];

if (!$user_id) {
    echo json_encode(["status" => "error", "message" => "User ID not set in session"]);
    exit();
}
// Prepare the update SQL query
$sql = "UPDATE users SET surname = ?, firstname = ?, email = ?, phone_number = ? , address =? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $surname, $firstname, $email, $phone_number, $addr, $user_id);

// Execute the query and check if it was successful
if ($stmt->execute()) {
    
    // If the update is successful, return a success response
    echo json_encode([
                'status'=> 'success',
                "id" => $user_id,
                "email"=> $email,
                "surname"=> $surname,
                "firstname"=> $firstname,
                "phone_number"=> $phone_number,
                "address"=> $addr
            ]);
} else {
    // If there is an error updating, return an error response
    echo json_encode(["success" => false, "message" => "Error updating profile"]);
}

$stmt->close();
$conn->close();
?>
