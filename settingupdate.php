<?php
session_start();
$_SESSION['id'] = $user['id'];
$_SESSION['email'] = $user['email'];
$_SESSION['surname'] = $user['surname'];
$_SESSION['firstname'] = $user['firstname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Account Settings | User Profile</title>
    <link rel="stylesheet" href="setting.css">
    <link rel="stylesheet" href="css/index.css">
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
                            <li><a id="account">Account</a></li>
                            <li><a href="displayRestaurant.php">Restaurant</a></li>
                            <li><a href="menu.php">Menu</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li> <a href="cart.html" class="view-cart">
                
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </header><br><br>
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

                     <li><a id="change"><i class="fas fa-lock"></i>
                    <span>Change Password</span></a></li><br>
                    <li><a id="delete"><i class="fas fa-trash"></i>
                    <span>Delete Account</span></a> </li><br>


                    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a></li>
                </ul>
         
        </aside>

        <main>
            <h2 class="main-p">Profile Details</h2>
            <form action="setting.php" method="POST" enctype="multipart/form-data" id="settingform">
                 <label for="">ID</label><br><br>
                <input type="text" name="id" id="id" readonly >
                <hr> 
                <label for="" id="usernam">Surname</label><br id="2"><br id="2">
                <input type="text" name="surname" id="surname">
                <hr>
                <label for="" id="firstn">First Name</label><br><br>
                <input type="text" name="firstname" id="firstname">
                <hr id="l">
                <label for="">Phone Number</label><br><br>
                <input type="number" name="phone_number" id="phone_number">
                <hr>
                <!-- <label for="">Gender</label><br><br>
                <input type="radio" name="gender" id="male" value="Male">Male
                <input type="radio" name="gender" id="female" value="Female">Female
                <hr> -->
                <label for="">Email</label><br><br>
                <input type="email" name="email" id="email">
                <hr>
                <label for="">Address</label><br>
                <textarea name="address" id="address" cols="50" rows="10"></textarea>

                <div><button>Save</button></div>
            </form>
            <div id="result"></div>
        </main>
    </div>
    <script>
       
        // Fetch user data and populate form
        window.addEventListener('DOMContentLoaded', function() {
            const user = {
                //id : sessionStorage.getItem('id'),
                surname: sessionStorage.getItem('surname'),
                firstname: sessionStorage.getItem('firstname'),
                email: sessionStorage.getItem('email'),
                phone_number: sessionStorage.getItem('phone_number'),
                gender: sessionStorage.getItem('gender'),
                address :sessionStorage.getItem('address'),
            };
            document.getElementById('id').value = sessionStorage.getItem('id');
            document.getElementById('name').innerHTML = "Hello, "+sessionStorage.getItem('firstname');
            document.getElementById('surname').value = sessionStorage.getItem('surname');
            document.getElementById('firstname').value = sessionStorage.getItem('firstname');
            document.getElementById('email').value = sessionStorage.getItem('email');
            document.getElementById('phone_number').value = sessionStorage.getItem('phone_number');
            document.getElementById('Useremail').innerHTML =sessionStorage.getItem('email');
            document.getElementById('address').innerHTML = user.address;

            // if (user.gender === 'Male') {
            //     document.getElementById('male').checked = true;
            // } else if (user.gender === 'Female') {
            //     document.getElementById('female').checked = true;
            // }

            if (localStorage.getItem('rider') === 'true') {
            document.getElementById('usernam').hidden =true;
            document.getElementById('firstn').hidden =true;
            document.getElementById('firstname').hidden =true;
            document.getElementById('ridername').hidden =false;
            document.getElementById('l').hidden = true;
            document.getElementById('2').hidden = true;
            } 
        });

        //const userId = sessionStorage.getItem("userId");
const surname = sessionStorage.getItem("surname");
const firstname = sessionStorage.getItem("firstname");
const email = sessionStorage.getItem("email");
const gender = sessionStorage.getItem("gender");
const phoneNumber = sessionStorage.getItem("phone_number");

        // Handle form submission
        document.getElementById('settingform').addEventListener('submit', function(event) {
        event.preventDefault();
     const formData = new FormData(this);

    fetch("setting.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())  // Parse response as JSON
    .then(data => {
        if (data.status === 'success') {
            // Store the updated data into sessionStorage using the values from `data`
            sessionStorage.setItem('surname', data.surname);
            sessionStorage.setItem('firstname', data.firstname);
            sessionStorage.setItem('email', data.email);
            sessionStorage.setItem('phone_number', data.phone_number);
            sessionStorage.setItem('address', data.address);

            document.getElementById('result').textContent = 'Profile updated successfully!';
           
        } else {
            document.getElementById('result').textContent = 'Error: ' + data.message;
        }
    })
    .catch(error => {
        alert("Error updating data: " + error);
    });
});


document.getElementById('delete').addEventListener('click', async(e) =>{
    const email1 = prompt("Enter your email");
    const password1 =prompt("Enter your Password");

    const response =await fetch('deleteAccount.php', {
            method : 'POST',
            headers :{
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({email1, password1})
        });

        const data = await response.json();
        if (data.success) {
            alert("successfully deleted");
            window.location.href = 'logout.php';
            
        }else{
            alert(data.error);
        }
})

document.getElementById('change').addEventListener('click', async(e) => {
    try {
        const email2 = sessionStorage.getItem("email");
        
        // Add password validation
        const Oldpass = prompt("Enter Old Password");
        const Newpass = prompt("Enter new Password");
        
        // Basic password strength check
        if (Newpass.length < 8) {
            alert("Password must be at least 8 characters long");
            return;
        }

        const res = await fetch('password.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ email2, Oldpass, Newpass })
        });

        const data = await res.json();
        alert(data.message);
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    }
});


    

    </script>
</body>
</html>