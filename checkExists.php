<?php
header("Content-Type: application/json");

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FOOD_SERVICE";

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$data = json_decode(file_get_contents("php://input"), true);
$email = $data["email"];

$sl = "SELECT 1 FROM users WHERE email = ?";
    $stmt = $conn->prepare($sl);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

$response = ["exists" => false];
if($stmt->num_rows > 0) {
       $response["exists"] = true;
}

echo json_encode($response);

$stmt->close();
$conn->close();
?>