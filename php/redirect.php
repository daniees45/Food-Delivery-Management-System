<?php
// dashboard.php (protected page)
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

// Display content for logged-in users
echo "Welcome, " . htmlspecialchars($_SESSION['email']) . "!";
?>
