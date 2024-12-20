<?php
// ini_set('display_errors', 1);
//   ini_set('display_startup_errors', 1);
//  error_reporting(E_ALL);

// Database connection settings
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FOOD_SERVICE";

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed: " . $conn->connect_error]));
}


if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? '';
$id = $_SESSION['id'];
$category = $_POST['category'];

// Handle file upload if a file is submitted
$banner_image = "";
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

// Generate a unique post ID
$postID = random_int(202, 302);

// Insert the new post into the blog table
$sql = "INSERT INTO blog(restaurantID,Postid, price, PostTitle, Description, banner_image, category) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiissss",$id, $postID, $price, $title, $description, $banner_image, $category);

if ($stmt->execute()) {
    $message = "Post created successfully";
    header("Location: RestaurantPosting.php");
    
} else {
    $message = "Failed Posting";
    echo json_encode(["status" => "error", "message" => "Failed to create post: " . $stmt->error]);
}

$stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Upload</title>
</head>
<style>
    /* Modern form styling */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
   
 
    background-color: #f5f5f5;
}

h1, h2 {
    color: #333;
    border-bottom: 2px solid #e0e0e0;
    padding-top: 30px;
    margin-bottom: 30px;
}

#uploadForm {
    background: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
    color: #555;
    font-weight: 500;
}

input[type="text"],
input[type="number"],
textarea,
select {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
}

textarea {
    min-height: 120px;
    resize: vertical;
}

select {
    background-color: white;
    cursor: pointer;
}

input[type="file"] {
    border: 1px dashed #ddd;
    padding: 20px;
    margin-bottom: 20px;
    width: 100%;
    box-sizing: border-box;
    border-radius: 4px;
}

button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 14px 28px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 500;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

/* Preview section styling */
#preview {
    margin-top: 40px;
    background: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

#preview p {
    margin-bottom: 15px;
    line-height: 1.6;
}

#preview strong {
    color: #555;
    width: 120px;
    display: inline-block;
}

#previewImage {
    max-width: 200px;
    height: auto;
    border-radius: 4px;
    margin-top: 15px;
    border: 1px solid #ddd;
}

/* Message styling */
#message {
    margin-top: 20px;
    padding: 15px;
    border-radius: 4px;
    text-align: center;
}

#message:not(:empty) {
    background-color: #dff0d8;
    border: 1px solid #d6e9c6;
    color: #3c763d;
}

/* Responsive adjustments */
@media (max-width: 600px) {
    body {
        padding: 10px;
    }
    
    #uploadForm,
    #preview {
        padding: 20px;
    }
    
    button[type="submit"] {
        width: 100%;
    }
}
</style>
<link rel="stylesheet" href="css/index.css">
<body>
<header>
        <div class="homepage">
            <div>
                
                <div class="header-content">
                    <img src="images/PAJ.webp" alt="logo">
                        <a href="" class="headerlink"><p>PAJ</p></a>
                </div>
                <div class="header2">
                    <nav>
                        <ul id="menulink">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="menu.php">Menu</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </header>
<h2>post food</h2>
<button onclick="goback()" style="position: absolute; right : 50px">Back</button>

<form id="uploadForm" action="RestaurantPosting.php" method="POST" enctype="multipart/form-data">
    <label>Title:</label>
    <input type="text" id="Title" name="title" required>
    
    <label>Description:</label>
    <textarea id="description" name="description" required></textarea>

    <label for=""> Category</label>
    <select name="category" id="cat-menu">
        <option value="local">Local</option>
        <option value="desert">Desert</option>
        <option value="intercontinental">Intercontinental</option>
        <option value="snacks">snacks</option>
        <option value="fastFood">Fast Food</option>
        <option value="Beverages">Beverages</option>
        <option value="Breakfast">Breakfast</option>
        <option value="Cocktail">Cocktail</option>
        <option value="Appetizer">Appetizer</option>
       <option value="seafood">seafood</option>
    </select>
    <label>Price:</label>
    <input type="number" id="price" name="price" required>

    <label>Image:</label>
    <input type="file" id="banner_image" name="image" accept="image/*" required>

    <button type="submit" name="submit" id="upload">Upload Item</button>
</form>

<h2>Preview:</h2>
<div id="preview">
    <p><strong>Title:</strong> <span id="previewTitle"></span></p>
    <p><strong>Description:</strong> <span id="previewDescription"></span></p>
    <p><strong>Price:</strong> ₵<span id="previewPrice"></span></p>
    <img id="previewImage" src="" alt="Item Preview" width="200">
</div>

<div id="message"><?php echo $message?></div>

<script>
document.getElementById('uploadForm').addEventListener('input', function() {
    const title = document.getElementById('Title').value;
    const description = document.getElementById('description').value;
    const price = document.getElementById('price').value;
    const image = document.getElementById('banner_image').files[0];

    if (title && description && price && image) {
        document.getElementById('previewTitle').textContent = title;
        document.getElementById('previewDescription').textContent = description;
        document.getElementById('previewPrice').textContent = price;

        const reader = new FileReader();
        reader.onload = function() {
            document.getElementById('previewImage').src = reader.result;
            document.getElementById('preview').style.display = 'block';
        }
        reader.readAsDataURL(image);
    }
});

document.getElementById('uploadForm').addEventListener('load', function(event) {
    document.getElementById('uploadForm').reset();
    document.getElementById('preview').style.display = 'none';
   

});

document.getElementById('upload').addEventListener('click', function () {
    alert('created successfully');
});

document.getElementById('account').addEventListener('click', function(){
    if (localStorage.getItem('loggedIn') === 'true') {
        window.location.href = "user_dashboard.php";
    }else if (localStorage.getItem('rider') === 'true') {
        window.location.href = "rider.php";
    }else if (localStorage.getItem('restaurant') === 'true') {
        window.location.href = 'RestaurantDB.php';
    }else{
        alert('please log in to access this feature');
        window.location.href = "login.php";
    }
})

function goback(){
    history.back();
}
</script>
</body>
</html>

