<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Food Delivery";

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $surname = $_POST['surname'];
    $firstname =$_POST['firstname'];
    $age = $_POST['age'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // password_hash($_POST['password'], PASSWORD_BCRYPT) Hash the password
    $email = $_POST['email'];
    $phone_number = $_POST['phone'];
    $gender = $_POST['gender'];
    $randomnum = 30371;

    $sl = "SELECT COUNT(*) as count FROM users WHERE id= ?";
    $stmt = $conn->prepare($sl);
    $stmt->bind_param("i", $randomnum);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    

    // Insert user data into the database
   if ($row["count"] > 0) {
    $randomnum = random_int(1,10000);
    $sql = "INSERT INTO users (id,surname,firstname, password, email, age, gender, phone_number)
    VALUES ('$randomnum','$surname', '$firstname', '$password', '$email', '$age','$gender', '$phone_number')";

            if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error; 
            } else {
            header("Location: login.php");

            }
   } else {
    $sql = "INSERT INTO users (id,surname,firstname, password, email, age, gender, phone_number)
    VALUES ('$randomnum','$surname', '$firstname', '$password', '$email', '$age','$gender', '$phone_number')";

    if ($conn->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $conn->error; 
    } else {
header("Location: login.php");

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
