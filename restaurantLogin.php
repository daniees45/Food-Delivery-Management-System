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
$stmt = $conn->prepare("SELECT R_id, R_name,R_email, R_password, R_contact, TOS, ADDRESS FROM restaurants WHERE R_email = ?");
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
    if ($user && password_verify($password, $user['R_password'])) {
        // Set session variables
        $_SESSION['loggedIn'] = true;
        $_SESSION['id'] = $user['R_id'];
        $_SESSION['email'] = $user['R_email'];
        $_SESSION['riderName'] = $user['R_name'];
        $_SESSION['address'] = $user['ADDRESS'];

        // Return success response
        echo json_encode([
            "success" => true,
            "id" => $user['R_id'],
            "email" => $user['R_email'],
            "surname" => $user['R_name'],
            "address" => $user['ADDRESS'],
            "phone_number" => $user["R_contact"]
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
