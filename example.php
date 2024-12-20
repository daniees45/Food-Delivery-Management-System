<?php
session_start();
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
    echo json_encode(['success' => false, 'error' => 'Database connection failed']);
    exit();
}
$userID = $_SESSION['id'];
$searchTerm = $_GET[$userID] ?? ' ';

if (!$searchTerm) {
    echo json_encode(['success' => false, 'error' => 'No search term provided']);
    exit();
}

$sql = $conn->prepare("SELECT cartid, quantity, product_price, category FROM cart WHERE user_id =?");
if (!$sql) {
    echo json_encode(['success' => false, 'error' => 'Query preparation failed']);
    exit();
}
$sql->bind_param('i', $searchTerm);
$sql->execute();
$result = $sql->get_result();

$food = [];
while ($row = $result->fetch_assoc()) {
    $food[] = $row;
}

if (count($food) > 0) {
    echo json_encode(['success' => true, 'data' => $food]);
} else {
    echo json_encode(['success' => false, 'error' => 'No results found']);
}

$sql->close();
$conn->close();



?>