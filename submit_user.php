<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the user is already logged in
if (isset($_SESSION["loggedIn"])&& ($_SESSION["loggedIn"] === true) && ($_SESSION["id"] || $_SESSION["email"])) {
    header("Location: index.php");
    exit();
}

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FOOD_SERVICE";

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    

    // if (!preg_match('/^\d{2}-\d{2}-\d{4}$/', $age)) {
    //     die("Invalid date format. Please enter date in YYYY-MM-DD format.");
    // }

    // Generate a unique random number for the ID
   if (isset($_POST['action'])) {
        if ($_POST['action'] == 'customer') {
            $surname = $_POST['surname'];
            $firstname = $_POST['firstname'];
            
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $email = $_POST['email'];
            $phone_number = $_POST['phone'];
            $gender = $_POST['gender'];
            do {
                $randomnum = random_int(1, 10000);
                $sl = "SELECT COUNT(*) as count FROM users WHERE id = ?";
                $stmt = $conn->prepare($sl);
                $stmt->bind_param("i", $randomnum);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
            } while ($row["count"] > 0);
        
            // Check if the email already exists
            $sl = "SELECT COUNT(*) as count FROM users WHERE email = ?";
            $stmt = $conn->prepare($sl);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
        
            
        
            if ($row["count"] == 0) {
                // Insert user data if email doesn't exist
                $sql = "INSERT INTO users (id, surname, firstname, password, email, gender, phone_number)
                        VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("issssss", $randomnum, $surname, $firstname, $password, $email, $gender, $phone_number);
                
                if ($stmt->execute()) {
                    header("Location: login.php");
                    exit();
                } else {
                    echo "Error: " . $stmt->error;
                }
            } else {
                echo "<script type='text/javascript'>alert('Email already exists: $email');</script>";
                header("Location: redirect.php");
                exit();
            }

        } else if ($_POST['action'] == 'restaurant') {
            $resName = $_POST['resName'];
            $resPhone = $_POST['contact'];
            $resEmail = $_POST['resEmail'];
            $resTOS = $_POST['service'];
            $resAddress = $_POST['address'];
            $banner_image = $_POST['image'];
        
                     if (isset($_FILES['image'])) {
                    if ( $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                         $targetDir = "uploads/";
                         if (!is_dir($targetDir)) {
                             mkdir($targetDir, 0777, true); // Create the directory if it doesn't exist
                         }
                         $fileName = uniqid() . "_" . basename($_FILES['image']['name']);
                         $banner_image = $targetDir . $fileName;
                     
                         move_uploaded_file($_FILES["image"]["tmp_name"], $banner_image);
                        }
                         
                     }
                    $resPassword = password_hash($_POST['resPassword'], PASSWORD_BCRYPT);
                    do {
                        $randomnum = random_int(1, 10000);
                        $sl = "SELECT COUNT(*) as count FROM restaurants WHERE R_id = ?";
                        $stmt = $conn->prepare($sl);
                        $stmt->bind_param("i", $randomnum);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();
                    } while ($row["count"] > 0);
                
                    // Check if the email already exists
                    $sl = "SELECT COUNT(*) as count FROM restaurants WHERE R_email = ?";
                    $stmt = $conn->prepare($sl);
                    $stmt->bind_param("s", $resEmail);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                
                    
                
                    if ($row["count"] == 0) {
                        // Insert user data if email doesn't exist
                        $sql = "INSERT INTO restaurants (R_id, R_name,R_email, R_password, R_contact, TOS, ADDRESS, Banner)
                                VALUES (?, ?, ?, ?, ?, ?, ?,?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("isssisss", $randomnum, $resName, $resEmail, $resPassword, $resPhone, $resTOS, $resAddress, $banner_image);
                        
                        if ($stmt->execute()) {
                            header("Location: login.php");
                            exit();
                        } else {
                            echo "Error: " . $stmt->error;
                        }
                    } else {
                        echo "<script type='text/javascript'>alert('Email already exists: $email');</script>";
                        header("Location: redirect.php");
                        exit();
                    }
        }elseif ($_POST['action'] == 'rider') {
            $riderName = $_POST['riderName'];
            $riderEmail = $_POST['riderEmail'];
            $riderPassword = password_hash($_POST['riderPassword'], PASSWORD_BCRYPT);
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            do {
                $randomnum = random_int(1, 10000);
                $sl = "SELECT COUNT(*) as count FROM riders WHERE riderID = ?";
                $stmt = $conn->prepare($sl);
                $stmt->bind_param("i", $randomnum);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
            } while ($row["count"] > 0);
        
            // Check if the email already exists
            $sl = "SELECT COUNT(*) as count FROM riders WHERE riderEmail = ?";
            $stmt = $conn->prepare($sl);
            $stmt->bind_param("s", $riderEmail);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
        
            
        
            if ($row["count"] == 0) {
                // Insert user data if email doesn't exist
                $sql = "INSERT INTO riders (riderID, riderName,riderEmail, riderPassword, riderContact, address)
                        VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("isssss", $randomnum, $riderName, $riderEmail, $riderPassword, $contact, $address);
                
                if ($stmt->execute()) {
                    header("Location: login.php");
                    exit();
                } else {
                    echo "Error: " . $stmt->error;
                }
            } else {
                echo "<script type='text/javascript'>alert('Email already exists: $email');</script>";
                header("Location: redirect.php");
                exit();
            }
        }
   }
    $stmt->close();
}

$conn->close();


//echo "Selcted Gender: " .htmlspecialchars($gender);

    // Handle the profile image upload
   /*
     $profile_image = "";
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        $targetDir = "uploads/";
        $profile_image = $targetDir . basename($_FILES["profile_image"]["name"]);
        move_uploaded_file($_FILES["profile_image"]["tmp_name"], $profile_image);
    }
   */
?>
