<?php
session_start();
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FOOD_SERVICE";

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Database Connection failed']);
    exit();
}

// Check if the request method is POST
$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'] ?? '';
$password = $data['password'] ?? '';

if (!$email || !$password) {
    echo json_encode(['success' => false, 'error' => 'Email or password not provided']);
    exit();
}

// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT riderID, riderName, riderEmail, riderPassword, riderContact, address FROM riders WHERE riderEmail = ?");
if (!$stmt) {
    echo json_encode(['success' => false, 'error' => 'Prepare statement failed: ' . $conn->error]);
    exit();
}

// Bind the parameter and execute the statement
$stmt->bind_param("s", $email); // "s" denotes that the parameter is a string
$stmt->execute();
// Get the result and fetch user data
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verify the password
    if ($user && password_verify($password, $user['riderPassword'])) {
        // Set session variables
        $_SESSION['loggedIn'] = true;
        $_SESSION['id'] = $user['riderID'];
        $_SESSION['email'] = $user['riderEmail'];
        $_SESSION['riderName'] = $user['riderName'];
        $_SESSION['address'] = $user['address'];

        // Return success response
        echo json_encode([
            "success" => true,
            "id" => $user["riderID"],
            "email" => $user["riderEmail"],
            "surname" => $user["riderName"],
            "address" => $user["address"],
            "phone_number" => $user["riderContact"]
        ]);
    } else {
        // Invalid login details
        echo json_encode(['success' => false, 'error' => 'Invalid email or password']);
    }
} else {
    // No user found
    echo json_encode(['success' => false, 'error' => 'User not found']);
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>
