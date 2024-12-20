<?php
session_start();

// Ensure user is logged in
if (!isset($_SESSION['id'])) {
    echo json_encode(['success' => false, 'error' => 'User not logged in']);
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FOOD_SERVICE";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Database Connection failed']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_SESSION['id'];
    $name = $_POST['card_name'];
    $number = $_POST['card_number'];
    $month = $_POST['expiryMonth'];
    $year = $_POST['expiryYear'];
    $cvv = $_POST['cvv'];
    $type = $_POST['type'];
    $id = random_int(1, 99999);

    // Validate inputs
    if (!preg_match('/^\d{16}$/', $number)) {
        echo json_encode(['success' => false, 'error' => 'Invalid card number']);
        exit();
    }

    if (!preg_match('/^\d{3}$/', $cvv)) {
        echo json_encode(['success' => false, 'error' => 'Invalid CVV']);
        exit();
    }

    if (empty($name) || strlen($name) > 50) {
        echo json_encode(['success' => false, 'error' => 'Invalid cardholder name']);
        exit();
    }

    $sql = "INSERT INTO payment_methods (id, user_id, card_number, cvv, card_holder, expiry_month, expiry_year, card_type) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('iisssiis', $id, $user, $number, $cvv, $name, $month, $year, $type);
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Payment method added successfully']);
        } else {
            echo json_encode(['success' => false, 'error' => $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAJ | Payment</title>
</head>
<body>
<div class="container-setting">
        <aside class="setting-bar">
            <p id="name">Hello, Username</p>
            <p id="Useremail" style="margin-top: -3px; font-size : 10px"></p>
        
                <ul>
                    <li><a href="user_dashboard.php"><i class="fas fa-user"></i>
                    <span>Profile</span></a></li><br>

                    <li><a href="payments.html"><i class="fas fa-credit-card"></i>
                    <span>Payment Methods</span></a></li><br>

                    <li><a href="faq.php"><i class="fas fa-question-circle"></i>
                    <span>Help & Support</span></a></li><br>

                    <li><a href=""><i class="fas fa-lock"></i>
                    <span>Change Password</span></a></li><br>
                    <li><a href="" id="delete"><i class="fas fa-trash"></i>
                    <span>Delete Account</span></a> </li><br>

                    <li><a href="settingupdate.php"><i class="fas fa-cog"></i>
                    <span>Settings</span></a></li><br>

                    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a></li>
                </ul>
         
        </aside>

        <main>
            <h2>Payment Details</h2>
            <form action="amount.php" method="post">
               <p>
               <label for="card_number">Card Number</label>
                <input type="number" name="card_number" id="card_number" required>
               </p>

               <p>
                <label for="card_name">Card Holder Name</label>
                <input type="number" name="card_name" id="card_name" required>
               </p>
               <p>
                <label for="month">
                Expiry Date
                </label>
                <select id="expiryMonth" name="expiryMonth" required>
                            <option value="">Month</option>
                            <?php for($i = 1; $i <= 12; $i++): ?>
                                <option value="<?= $i ?>"><?= str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
                            <?php endfor; ?>
                        </select>
                        <select id="expiryYear" name="expiryYear" required>
                            <option value="">Year</option>
                            <?php 
                            $currentYear = date('Y');
                            for($i = $currentYear; $i <= $currentYear + 20; $i++): 
                            ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
               </p>
               <p>
                <label for="cvv">CVV</label>
                <input type="text" name="cvv" id="cvv" maxlength="3" required>
               </p>

               <p>
                <select name="type" id="type">
                    <option value="" disabled>__Card type__</option>
                    <option value="Saving">Savings</option>
                    <option value="credit">Credit</option>
                </select>
               </p>

               <button type="submit" class="submit-btn">Add Payment</button>
            </form>
        </main>
</div>
</body>
</html>