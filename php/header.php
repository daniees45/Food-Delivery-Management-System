<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAJ Food Service</title>

    <link rel="stylesheet" href="css/index.css">
    <script src="index.js"></script>
    
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