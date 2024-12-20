<?php
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAJ Food Service | Registration</title>

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/regist.css">
    <!-- <script src="js/register.js" defer></script> -->
<style>
    #banner{
        border: 1px dashed #ddd;
    padding: 20px;
    margin-bottom: 20px;
    width: 100%;
    box-sizing: border-box;
    border-radius: 4px;
    }
    body{
        font-size: 24px;
    }
</style>
    
</head>
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
                            
                            <li><select id="loginselect">
                                <option value="" disabled selected>Registration Options</option>
                                <option value="user">Customer</option>
                                <option value="restaurant" >Restaurant</option>
                                <option value="rider">Rider</option>
                            </select></li> 
                            <li ><a href="resgistration.php" hidden>Register</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </header>
    <section>
       <div class="container" >
        <div class="form" id="form1">
            <form name="registration" id="userForm" action="submit_user.php" method="POST" enctype="multipart/form-data" >
                <h1>User Registration</h1>
                <div class="input_1">
                    <label for="surname">Surname</label>
                    <input type="text" id="surname" name="surname" placeholder="Enter your surname" required>
                </div>
                <div class="input_2">
                    <label for="firstname">First name</label>
                    <input type="text" id="firstname" name="firstname" placeholder="Enter your first name" required> 
                </div> 
                <div class="boxes">
                    <div class="gender">
                        <label>Gender</label>
                        <div>
                            <input type="radio" id="female" name="gender" value="female" required>
                            <label for="female">Female</label>
        
                            <input type="radio" id="male" name="gender" value="male" required>
                            <label for="male">Male</label>
        
                        </div>
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Type your email here" required>
                    </div>
                    <div>
                        <label for="phone">Phone number</label>
                        <input type="tel" id="phone" name="phone" placeholder="+233" required>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Password" required>
                    </div>
                </div>
                <div class="submition">
                    <div class="submit">
                        <p style="font-size: 14px">Have an Account?,<a href="login.php" style="text-decoration: none; font-size: 14px; color:black; font-style: italic">Click here to login</a></p>
                        <button type="submit" name="action" value="customer">Submit</button>
                    </div>
                    
                </div>
        
            </form>
        </div>
        <!-- RESTAURANTS REGISTRATION FORM -->
        <div class="form" id="restaurantRegistration" hidden>
            <form action="submit_user.php" method="POST" enctype="multipart/form-data">
                <h1>Restaurant Registration </h1>
                <label for="resName">Restaurant Name</label>
                <input type="text" id="resName" name="resName" placeholder="Enter restaurant name" required>

                <label for="resBanner">Banner</label>
                <input type="file" name="image" id="banner" accept="image/*" required>

                <label for="resEmail">Email</label>
                <input type="email" id="resEmail" name="resEmail" placeholder="Enter restaurant email" required>

                <label for="resPassword">Password</label>
                <input type="password" name="resPassword" id="resPassword" required>

                <label for="contact">Contact</label>
                <input type="tel" id="resPhone" name="contact" placeholder="+233" required>

                <label for="service">Type of Service</label>
                <select id="TOS" name="service" required>
                    <option value="allservice">All Service</option>
                    <option value="Dine-in">Dine-in</option>
                    <option value="Takeaway">Takeaway</option>
                    <option value="Delivery">Delivery</option>
                </select>

                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="Enter address" required> 

                
                <div class="submition">
                    <div class="submit">
                        <p style="font-size: 14px">Have an Account?,<a href="login.php" style="text-decoration: none; font-size: 14px; color:black; font-style: italic">Click here to login</a></p>
                        <button type="submit" name="action" value="restaurant">Submit</button>
                    </div>
                    
                </div>
            </form>
        </div>

        <!-- Delivery REGISTRATION FORM -->
        <div class="form" id="deliveryRegistration" hidden>
            <form action="submit_user.php" method="POST">
                <h1 style="font-size:20px">Rider Registration</h1>
                <p>
                <label for="Name">Name</label>
                <input type="text" id="resName" name="riderName" placeholder="rider name" required>
                </p>

                <p>
                <label for="Email">Email</label>
                <input type="email" id="resEmail" name="riderEmail" placeholder="rider email" required>

                </p>
                
                <p>
                <label for="resPassword">Password</label>
                <input type="password" name="riderPassword" id="riderPassword" placeholder="enter password"required>
                </p>

                <p>
                <label for="contact">Contact</label>
                <input type="tel" id="resPhone" name="contact" placeholder="+233" required>

                </p>
                <p>
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="Enter address" required> 

                </p>
                <button type="submit" name="action" value="rider">Register</button>
            </form>
        </div>
       </div>
</section>
<div id="page-footer">
    <footer class="foot1">
     <div class="foot1-div">
        <nav class="foot1-nav">
            <div class="foot1-div1">
                <div class="foot1-div2">
                    <div class="foot1-div3">
                        <h3 class="foot1-h3">Discover PAJ</h3>
                        <ul class="foot1-ul">
                            <li><p><a href="http://">Delivery</a></p></li>
                            <li><p><a href="http://">About</a></p></li>
                            <li><p><a href="policy.html">Policy</a></p></li>
                        </ul>
                    </div>
                </div>
                
                    <nav class="foot1-nav">
                        
                            <div class="foot1-div2">
                                <div class="foot1-div3">
                                    <h3 class="foot1-h3">Legal</h3>
                                    <ul class="foot1-ul">
                                        <li><p><a href="http://">Terms and Conditions</a></p></li>
                                        <li><p><a href="policy.html">Privacy</a></p></li>
                                       
                                    </ul>
                                </div>
                            </div>
                        
                    </nav>
                    <nav class="foot1-nav">
                        
                        <div class="foot1-div2">
                            <div class="foot1-div3">
                                <h3 class="foot1-h3">Legal</h3>
                                <ul class="foot1-ul">
                                    <li><p><a href="">Terms and Conditions</a></p></li>
                                    <li><p><a href="policy.html">Privacy</a></p></li>
                                   
                                </ul>
                            </div>
                        </div>
                    
                </nav>
                <nav class="foot1-nav">
                        
                    <div class="foot1-div2">
                        <div class="foot1-div3">
                            <h3 class="foot1-h3">Help</h3>
                            <ul class="foot1-ul">
                                <li><p><a href="contact.html">Contact</a></p></li>
                                <li><p><a href="">FAQs</a></p></li>
                               
                            </ul>
                        </div>
                    </div>
                
            </nav>
                 </div> 
           
        </nav>
        
     </div> 
     
        
     <p>&copy; 2024 PAJ Delivery Service</p>
    </footer>
   
   </div>
   <script>
    document.getElementById('loginselect').addEventListener('change', function(){
        const Value = this.value;
        const User = document.getElementById('form1');
        const Restaurant =document.getElementById('restaurantRegistration');
        const rider =document.getElementById('deliveryRegistration');

        if (Value === 'user') {
            User.hidden = false;
            Restaurant.hidden = true;
            rider.hidden = true;
        } else if ( Value === 'restaurant'){
            User.hidden = true;
            Restaurant.hidden = false;
            rider.hidden =true;
        }else if(Value === 'rider'){
            User.hidden = true;
            Restaurant.hidden = true;
            rider.hidden = false;
        }
    });
    //check if email exist in database
    document.getElementById('email').addEventListener("blur", function(event){
        event.preventDefault();

        const email = this.value;

        if (email) {
            fetch("checkExists.php",{
                method: "POST",
                headers : {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({email : email})
            })
            .then(response => response.json())
            .then(data => {
                if(data.exists){
                    alert("Email already exists");
                    alert('Input another Email');
                }
            })
            .catch(error => console.error("Error:", error));
        }
    });
   
    //check if password length is less than 8
    document.getElementById('password').addEventListener("submit", function(event){
        event.preventDefault();
        let password = document.forms["registration"]["age"].value;
        if (password.length < 8) {
            alert("Minimum password must be 8");
            return false;
        }
    })



   
   </script>
</body>
</html>
