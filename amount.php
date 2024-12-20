<?php
session_start();
header('Content-Type: application/json');
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FOOD_SERVICE";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Database connection failed']);
    exit();
}

// Check if request is POST and contains JSON data
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($data['amount'])) {
    // Validate input
    if (!is_numeric($data['amount']) || $data['amount'] < 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid amount value']);
        exit();
    }

    $new_amount = floatval($data['amount']);
    $user_id = $data["id"];

    // First get the current amount
    $get_current = "SELECT amount FROM users WHERE id = ?";
    $stmt = $conn->prepare($get_current);
    
    if (!$stmt) {
        error_log("SQL Error: " . $conn->error);
        echo json_encode(['success' => false, 'message' => 'Failed to prepare statement']);
        exit();
    }

    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $current_amount = floatval($row['amount']);
    
    // Calculate total amount
    $total_amount = $current_amount + $new_amount;

    // Update the amount
    $sql = "UPDATE users SET amount = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        error_log("SQL Error: " . $conn->error);
        echo json_encode(['success' => false, 'message' => 'Failed to prepare update statement']);
        exit();
    }

    $stmt->bind_param("di", $total_amount, $user_id);

    if ($stmt->execute()) {
        echo json_encode([
            "success" => true, 
            "message" => "Amount updated successfully",
            "amount" => $total_amount
        ]);
    } else {
        error_log("Execution Error: " . $stmt->error);
        echo json_encode(["success" => false, "message" => "Failed to update amount"]);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method or missing amount']);
}

$conn->close();
?>