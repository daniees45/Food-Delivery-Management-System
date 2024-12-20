<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();    
// Check if the user is already logged in
if (isset($_SESSION["loggedIn"])&& ($_SESSION["loggedIn"] === true) && ($_SESSION["id"] || $_SESSION["email"])) {
    header("Location: index.php");
    exit();
}
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FOOD_SERVICE";

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed: " . $conn->connect_error]));
}

$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? '';


// Handle file upload if a file is submitted
$targetDir = "uploads/";
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true); // Create directory if it doesn't exist
}   
$banner_image = "";
if (isset($_FILES['banner_image']) && $_FILES['banner_image']['error'] === UPLOAD_ERR_OK) {
    $targetDir = "uploads/";
    $banner_image = $targetDir . basename($_FILES["banner_image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $banner_image);
}

// Generate a unique post ID
$postID = random_int(202, 302);

// Insert the new post into the blog table
$sql = "INSERT INTO blog(, Postid, price, PostTitle, Description, banner_image) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iissss", $id, $postID, $price, $title, $description, $banner_image);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Post created successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to create post: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
