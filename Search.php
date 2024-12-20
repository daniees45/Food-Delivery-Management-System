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
    echo json_encode(['success' => false, 'error' => 'Database connection failed']);
    exit();
}

$searchTerm = $_GET['term'] ?? ' ';

if (!$searchTerm) {
    echo json_encode(['success' => false, 'error' => 'No search term provided']);
    exit();
}

$sql = $conn->prepare("SELECT restaurantID, Postid, price, PostTitle, Description,banner_image, category FROM blog WHERE PostTitle LIKE ? OR Description LIKE ? OR category LIKE ? LIMIT 50");
if (!$sql) {
    echo json_encode(['success' => false, 'error' => 'Query preparation failed']);
    exit();
}
$likeTerm = '%'. $searchTerm. '%';
$sql->bind_param('sss', $likeTerm, $likeTerm, $likeTerm);
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