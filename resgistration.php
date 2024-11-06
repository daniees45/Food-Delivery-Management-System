<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAJ Register</title>
    <link rel="stylesheet" href="css/regist.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/register.js"></script>
</head>
<body>
    <header>
        <div class="homepage">
            <div>
                <div class="header-content">
                        <a href="index.php" class="headerlink"><p>PAJ</p></a>
                </div>
                <div class="header2">
                    <nav>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="resgistration.php">Register</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </header>
    <section>
       <div class="container">
        <div class="form">
            <form name="registration" id="userForm" action="submit_user.php" method="POST" enctype="multipart/form-data" onsubmit="return verification(), checkPassword()">
                <h1>Registration Form</h1>
                <div class="input_1">
                    <label for="surname">Surname</label>
                    <input type="text" id="surname" name="surname" placeholder="Enter your surname">
                </div>
                <div class="input_2">
                    <label for="firstname">First name</label>
                    <input type="text" id="firstname" name="firstname" placeholder="Enter your first name"> 
                </div> 
                <div>
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" placeholder="Please enter your age">
                </div>
                <div class="boxes">
                    <div class="gender">
                        <label>Gender</label>
                        <div>
                            <input type="radio" id="female" name="gender" value="female">
                            <label for="female">Female</label>
        
                            <input type="radio" id="male" name="gender" value="male">
                            <label for="male">Male</label>
        
                            <input type="radio" id="other" name="gender" value="other">
                            <label for="other">Others</label>
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
                    
                        <input type="submit" id="submit">
                    </div>
                    
                </div>
        
        
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
</body>
</html>
