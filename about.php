<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAJ Food Service - About Us</title>
    
    <link rel="stylesheet" href="regist.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="login.css">
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
                            
                            <li><select onchange="window.location.href=this.value;" id="loginselect">
                                <option value="" disabled selected>Login Options</option>
                                <option value="login.php" target="_blank">Customer</option>
                                <option value="" target="_blank">Delivery</option>
                            </select></li>
                            <li><a href="resgistration.php">Register</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </header>

    <main>
        <h1>About Us</h1>
        <p>We are a leading food delivery service dedicated to providing the best dining experience at home.</p>
        <p>Our mission is to connect you with your favorite restaurants and deliver delicious meals to your doorstep.</p>
    </main>

    <footer>

        <a href="about.html">About</a> |
        <a href="#">FAQs</a> |
        <a href="policy.html">Privacy Policy</a> |
        <a href="#">Terms & Conditions</a>

<p>&copy; 2024 PAJ Delivery Service</p>
</footer>
</body>
</html>
