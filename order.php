<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FOOD_SERVICE";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode([
        'status' => 'error',
        'message' => 'Connection failed: ' . $conn->connect_error
    ]));
}

// Set headers for JSON response
header('Content-Type: application/json');

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Decode the cart data
        $data = json_decode($_POST['cartItem'], true);
        
        if (!$data) {
            throw new Exception('Invalid order data');
        }

        // Start transaction
        $conn->begin_transaction();

        // Get current timestamp
        $timestamp = date('Y-m-d H:i:s');
        
        // Generate a unique cart ID for this save operation
        
        // Assume user_id is stored in session, adjust as needed
        $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1; // Default to 1 if no session
        
        // Prepare the insert statement
        $stmt = $conn->prepare("INSERT INTO order (user_id, cartid, quantity, totalPrice, Postid, created_at) VALUES (?, ?, ?, ?, ?, ?)");
        
        if (!$stmt) {
            throw new Exception('Prepare statement failed: ' . $conn->error);
        }

        // Insert each cart item
        foreach ($cartItems as $item) {
            $totalPrice = $item['price'] * $item['quantity'];
            
            $stmt->bind_param(
                "isidis",
                $userId,
                $cartId,
                $item['quantity'],
                $totalPrice,
                $item['id'],
                $timestamp
            );
            
            if (!$stmt->execute()) {
                throw new Exception('Execute failed: ' . $stmt->error);
            }
        }

        // Commit transaction
        $conn->commit();
        
        // Close statement
        $stmt->close();
        
        // Return success response
        echo json_encode([
            'status' => 'success',
            'message' => 'Cart saved successfully',
            'cartId' => $cartId
        ]);

    } catch (Exception $e) {
        // Rollback transaction on error
        if ($conn->connect_error === null) {
            $conn->rollback();
        }
        
        echo json_encode([
            'status' => 'error',
            'message' => $e->getMessage()
        ]);
    }
} else {
    // Invalid request
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request'
    ]);
}

// Close connection
$conn->close();
?>
