<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FOOD_SERVICE";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

// Check if 'order' is set in the GET request; default to 'DESC' if not provided
$order = isset($_GET["order"]) && $_GET["order"] == "ASC" ? "ASC" : "DESC";

// SQL query to get posts, including dynamic sorting based on 'order'
$sql = "SELECT restaurantID, Postid,price, PostTitle,Description,  banner_image,category, created_at, updated_at FROM blog ORDER BY created_at $order";

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    die(json_encode(["status" => "error", "message" => "Query failed: " . $conn->error]));
}

$posts = [];

// Check if any posts are returned
if ($result->num_rows > 0) {
    // Fetch each row as an associative array
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }

    // Send the response as JSON
    echo json_encode($posts);
} else {
    // No posts found
    echo json_encode(["status" => "error", "message" => "No posts found"]);
}

// Close the database connection
$conn->close();
?>
