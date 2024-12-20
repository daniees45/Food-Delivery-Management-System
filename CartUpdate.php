<?php
session_start();
header("Content-Type: application/json");

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FOOD_SERVICE";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit;
}

// Get JSON input
$inputData = file_get_contents("php://input");
$data = json_decode($inputData, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid JSON input']);
    exit;
}

// Validate required fields
if (!isset($data['cartid']) || !isset($data['userId']) || !isset($data['cart'])) {
    echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
    exit;
}

$cart_id = $data['cartid'];
$userId = $data['userId'];
$cart = $data['cart'];

foreach ($cart as $item) {
    // Validate each cart item
    if (!isset($item['id'], $item['quantity'])) {
        echo json_encode(['status' => 'error', 'message' => 'Missing cart item fields']);
        exit;
    }

    $productId = $item['id'];
    $quantity = $item['quantity'];

    // Update the cart item
    $stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE cartid = ? AND user_id = ? AND product_id = ?");
    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to prepare update statement']);
        exit;
    }
    $stmt->bind_param("iiii", $quantity, $cart_id, $userId, $productId);

    // Execute the statement
    if (!$stmt->execute()) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update cart item: ' . $stmt->error]);
        exit;
    }

    // Close statement
    $stmt->close();
}

// Response on success
echo json_encode(['status' => 'success', 'message' => 'Cart updated successfully']);
$conn->close();
?>
