
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Your Website Name</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/regist.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="login.js"></script>
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
<div class="container-1">
    <h2 id="texth">Login to Your Account</h2>
    <form id="login-form" action="login_Authenticate.php" method="POST" enctype="multipart/form-data">
        <label for="email-phone">Email or Phone</label>
        <input type="text" id="emailPhone" name="email-phone" placeholder="Enter your email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>

        <div class="forgotpassword">
            <a href="#">Forgot password?</a>
        </div>

        <button type="submit" class="login">Login</button>
    </form>

    <div class="register">
        <p>Or sign up</p>
        <button class="register-btn"><a href="resgistration.php">Register</a></button>
    </div>
</div>

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
                            <li><p><a href="http://">Policy</a></p></li>
                        </ul>
                    </div>
                </div>
                
                    <nav class="foot1-nav">
                        
                            <div class="foot1-div2">
                                <div class="foot1-div3">
                                    <h3 class="foot1-h3">Legal</h3>
                                    <ul class="foot1-ul">
                                        <li><p><a href="http://">Terms and Conditions</a></p></li>
                                        <li><p><a href="http://">Privacy</a></p></li>
                                       
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
     
        
    </footer>
   </div>

</body>
</html>