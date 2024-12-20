<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FOOD_SERVICE";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode([
        'success' => false,
        'message' => 'Database connection failed',
        'error' => $conn->connect_error
    ]);
    exit();
}

try {
    // Prepare SQL query to fetch restaurant data
    $sql = "SELECT R_name, R_contact, ADDRESS, R_email FROM restaurants";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        throw new Exception("Failed to prepare statement: " . $conn->error);
    }

    // Execute the query
    if (!$stmt->execute()) {
        throw new Exception("Failed to execute query: " . $stmt->error);
    }

    // Get the result
    $result = $stmt->get_result();

    // Fetch all restaurants
    $restaurants = [];
    while ($row = $result->fetch_assoc()) {
        $restaurants[] = [
            'name' => htmlspecialchars($row['R_name']),
            'ADDRESS' => htmlspecialchars($row['ADDRESS']),
            'email' => htmlspecialchars($row['R_email']),
            'contact' => htmlspecialchars($row['R_contact'])
        ];
    }

    // Check if any restaurants were found
    if (empty($restaurants)) {
        echo json_encode([
            'success' => true,
            'message' => 'No restaurants found',
            'data' => []
        ]);
    } else {
        echo json_encode([
            'success' => true,
            'message' => 'Restaurants retrieved successfully',
            'data' => $restaurants
        ]);
    }

} catch (Exception $e) {
    error_log("Error in display.php: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'An error occurred while fetching restaurants',
        'error' => $e->getMessage()
    ]);
} finally {
    // Close statement and connection
    if (isset($stmt)) {
        $stmt->close();
    }
    $conn->close();
}
?>