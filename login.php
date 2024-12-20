<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAJ Food Service</title>

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="index.js"></script>
    
    <style>
        #emailPhone2,#emailPhone3, #password2, #password3
        {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        
    </style>
</head>

<body id="bodyV">
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
                            
                            <li><select  id="loginselect">
                                <option value="" disabled>Login Options</option>
                                <option value="user" selected >Customer</option>
                                <option value="restaurant">Restaurants</option>
                                <option value="rider" >Delivery</option>
                            </select></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </header>
<div class="container-1">
    <h2 id="texth">Login to Your Account</h2>
    
    <div id="form1">
    <form id="login-form">
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
    <p style="font-size: 14px">Dont have an Account?,<a href="resgistration.php" style="text-decoration: none; font-size: 14px; color:black; font-style: italic">Click here to Register</a></p>
        <button class="register-btn"><a href="resgistration.php">Register</a></button>
    </div>
    </div>
    <!-- Rider Login -->
    <div id="riders1" hidden>
        <form id="login-form1" >
            <label for="email-phone">Email or Phone</label>
            <input type="text" id="emailPhone2" name="email-phone1" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password2" name="password1" placeholder="Enter your password" required>

            <div class="forgotpassword">
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit" class="login">Login</button>
        </form>

        <div class="register">
        <p style="font-size: 14px">Become a rider today,<a href="resgistration.php" style="text-decoration: none; font-size: 14px; color:black; font-style: italic">Click here to Register</a></p>
            <button class="register-btn"><a href="resgistration.php">Register</a></button>
        </div>
    </div>

     <!-- Restaurant Login -->
     <div id="rest" hidden>
        <form id="restaurants" >
            <label for="email-phone">Email or Phone</label>
            <input type="text" id="emailPhone3" name="email-phone1" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password3" name="password1" placeholder="Enter your password" required>

            <div class="forgotpassword">
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit" class="login">Login</button>
        </form>

        <div class="register">
        <p style="font-size: 14px">Sell with us, <a href="resgistration.php" style="text-decoration: none; font-size: 14px; color:black; font-style: italic">Click here to Register</a></p>
            <button class="register-btn"><a href="resgistration.php">Register</a></button>
        </div>
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
<script>

window.addEventListener("DOMContentLoaded", (event) =>{
        const body = document.getElementById('bodyV');
            if (localStorage.getItem('loggedIn') === 'true' || localStorage.getItem('rider') === 'true' || localStorage.getItem('restaurant') === 'true') {
              alert('User logged in');
              window.location.href = 'index.php';
                body.hidden = true;
      }else{
        body.hidden =false;
      }
        })
     
    //login script for Customers
    document.getElementById('loginselect').addEventListener('change', function(){
        const Value = this.value;
        const User = document.getElementById('form1');
        const Rider =document.getElementById('riders1');
        const restaurant = document.getElementById('rest');

        if (Value === 'user') {
            User.hidden = false;
            Rider.hidden = true;
            restaurant.hidden = true;

        

        } else if ( Value === 'rider'){
            User.hidden = true;
            Rider.hidden = false;
            restaurant.hidden =true;
            
        }else if (Value == 'restaurant') {
            User.hidden =true;
            Rider.hidden =true;
            restaurant.hidden = false;
        }

    });
    
   //login script for Rider
    document.getElementById('login-form1').addEventListener('submit', async(e) => {
        e.preventDefault();
        const email =document.getElementById('emailPhone2').value;
        const password =document.getElementById('password2').value;

        const response =await fetch('RiderLogin.php', {
            method : 'POST',
            headers :{
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({email, password})
        });

        const data = await response.json();
        if (data.success) {
            localStorage.setItem('rider','true')
            sessionStorage.setItem('r_id', data.id);

            sessionStorage.setItem('r_name', data.surname);
            sessionStorage.setItem('r_address', data.address);
            sessionStorage.setItem('r_email', data.email);
            sessionStorage.setItem('r_phone_number', data.phone_number);
            window.location.href = "rider.php";
            
        }else{
            alert(data.error);
        }

        
    });

//login for users
    document.getElementById('login-form').addEventListener('submit', async(e) => {
        e.preventDefault();
        const email =document.getElementById('emailPhone').value;
        const password =document.getElementById('password').value;

        const response =await fetch('login_Authenticate.php', {
            method : 'POST',
            headers :{
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({email, password})
        });

        const data = await response.json();
        if (data.success) {
            localStorage.setItem('loggedIn', 'true');
            sessionStorage.setItem('id', data.id);

            sessionStorage.setItem('surname', data.surname);
            sessionStorage.setItem('firstname', data.firstname);
            sessionStorage.setItem('email', data.email);
            sessionStorage.setItem('gender', data.gender);
            sessionStorage.setItem('phone_number', data.phone_number);
            sessionStorage.setItem('amount', data.amount);
            sessionStorage.setItem('address', data.addr);
            window.location.href = "index.php";
            
        }else{
            alert(data.error);
        }

        
    });

    //login for restaurants

    document.getElementById('restaurants').addEventListener('submit', async(e) => {
        e.preventDefault();
        const email =document.getElementById('emailPhone3').value;
        const password =document.getElementById('password3').value;

        const response =await fetch('restaurantLogin.php', {
            method : 'POST',
            headers :{
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({email, password})
        });

        const data = await response.json();
        if (data.success) {
            localStorage.setItem('restaurant','true')
            sessionStorage.setItem('id', data.id);

            sessionStorage.setItem('surname', data.surname);
            sessionStorage.setItem('address', data.address);
            sessionStorage.setItem('email', data.email);
            sessionStorage.setItem('phone_number', data.phone_number);
            window.location.href = "RestaurantDB.php";
            
        }else{
            alert(data.error);
        }

        
    });

</script>
</body>
</html>