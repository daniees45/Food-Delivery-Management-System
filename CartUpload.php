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
if (!isset($data['userId']) || !isset($data['cart'])) {
    echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
    exit;
}

$userId = $data['userId'];
$cart = $data['cart'];
$cart_id = $data['cart_id'];

foreach ($cart as $item) {
    // Validate each cart item
    if (!isset($item['id'], $item['name'], $item['price'], $item['quantity'], $item['image'])) {
        echo json_encode(['status' => 'error', 'message' => 'Missing cart item fields']);
        exit;
    }

    $productId = $item['id'];
    $productName = $item['name'];
    $productPrice = $item['price'];
    $quantity = $item['quantity'];
    $productImage = $item['image'];


    // Check if the cart item exists
    $checkCart = $conn->prepare('SELECT cartid, quantity, product_price FROM cart WHERE cartid = ? AND user_id = ? AND product_id = ?');
    $checkCart->bind_param('iii', $cart_id, $userId, $productId);
    $checkCart->execute();
    $result = $checkCart->get_result(); 
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
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

    } else {
            // Insert new item into the cart
    $stmt = $conn->prepare("INSERT INTO cart (cartid, user_id, product_id, product_name, product_price, quantity, product_image)
    VALUES (?, ?, ?, ?, ?, ?, ?)");
if (!$stmt) {
echo json_encode(['status' => 'error', 'message' => 'Failed to prepare insert statement']);
exit;
}
$stmt->bind_param("iiisdis", $cart_id, $userId, $productId, $productName, $productPrice, $quantity, $productImage);

// Execute the statement
if (!$stmt->execute()) {
echo json_encode(['status' => 'error', 'message' => 'Failed to save cart item: ' . $stmt->error]);
exit;
}
    }



    // Close statement
    $stmt->close();
}

// Response with generated cart ID
echo json_encode(['status' => 'success', 'message' => 'Cart created successfully', 'cartid' => $cart_id]);
$conn->close();
?>
