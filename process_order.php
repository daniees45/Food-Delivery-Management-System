<?php
session_start();
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FOOD_SERVICE";

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Database connection failed']);
    exit();
}

// Get the user ID from the request payload
$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'User ID not provided']);
    exit();
}

$userID = $data['user_id'];

// Prepare and execute the SQL query
$sql = $conn->prepare("SELECT cartid, user_id, product_id, product_name, product_price, quantity, product_image FROM cart WHERE user_id = ?");
if (!$sql) {
    echo json_encode(['success' => false, 'error' => 'Failed to prepare query']);
    exit();
}

$sql->bind_param('i', $userID);
$sql->execute();
$result = $sql->get_result();

// Fetch the cart items into an array
$Items = [];
while ($row = $result->fetch_assoc()) {
    $Items[] = $row;
}
echo json_encode($Items);
// Close the database connection
$sql->close();
$conn->close();

// Output the cart items as JSON


?>
