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
    echo json_encode(['success' => false,'error'=> 'Database Connection failed']);
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
    $stmt = $conn->prepare("SELECT id, surname, firstname, email, gender, phone_number, password, amount FROM users WHERE email = ?");
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

        if ($user && password_verify($password, $user['password'])) {
            // Set session and redirect on successful login
            $_SESSION['loggedIn'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['surname'] = $user['surname'];
            $_SESSION['firstname'] = $user['firstname'];

            echo json_encode([
                "success" => true,
                "id" => $user["id"],
                "email"=> $user["email"],
                "surname"=> $user["surname"],
                "firstname"=> $user["firstname"],
                "gender"=> $user["gender"],
                "phone_number"=> $user["phone_number"],
                "amount" => $user["amount"],
                "addr" => $user['address']
            ]);
            
        } else {
            // Invalid login details
            echo json_encode(['success'=> false, 'error'=> 'Invalid email or password']);
        }
    }else {
        echo json_encode(['success'=> false,'error'=> 'User not found']);
    }

    // Verify if the user exists and password matches
    

    // Close the statement


    $stmt->close();
// Close the database connection
$conn->close();
?>
