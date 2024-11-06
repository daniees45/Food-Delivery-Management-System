<?php
// config.php
$servername = 'localhost';
$dbname = 'Delivery_Service';
$username = 'root';
$password = '';


    $conn = new mysqli($servername, $username, $password);
    if (mysqli_connect_error()) {
        # code...
        die('Connection failed'. mysqli_connect_error());
    }

?>
