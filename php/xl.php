<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Delivery_service";

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT email, password FROM users WHERE email = $email");
    if (!$stmt) {
        die("Prepare statement failed: " . $conn->error);
    }
    
    // Bind the parameter and execute the statement
    $stmt->bind_param("s", $email); // "s" denotes that the parameter is a string
    $stmt->execute();
    
    // Get the result and fetch user data
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verify if the user exists and password matches
    if ($user && password_verify($password, $user['password'])) {
        // Set session and redirect on successful login
        echo'Success';
        $_SESSION['email'] = $email;
        header("Location: index.php");
        exit;
    } else {
        // Invalid login details
        echo "Invalid login details";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
