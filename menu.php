<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Menu</title>
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<style>
    .homepage{display: block;}
    body.no-header .homepage{display: none;}

    .hidden{
        display: none;
    }
    .animated-text a {
        text-decoration : none;
        color : black;
    }
</style>

<body>
    <!-- Header with Search Bar -->
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
                            <li> <a href="cart.html" class="view-cart">
                <i class="fas fa-shopping-cart"></i> Cart
            </a></li>
                            <li><a href="contact.php">Contact</a></li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </header>
   
    
   

    <!-- Menu Categories -->
    <div class="menu-container">
        <div class="menu-category">
            <a href="local.php">
                <img src="images/local.jpeg" alt="Local Cuisine">
                <h3>Local</h3>
            </a>
        </div>
        <div class="menu-category">
            <a href="dessert.php">
                <img src="images/dessert.jpeg" alt="Dessert">
                <h3>Dessert</h3>
            </a>
        </div>
        <div class="menu-category">
            <a href="intercontinental.php">
                <img src="images/intercontinental.jpeg" alt="Intercontinental">
                <h3>Intercontinental</h3>
            </a>
        </div>
        <div class="menu-category">
            <a href="">
                <img src="images/snacks.jpeg" alt="Snacks">
                <h3>Snacks</h3>
            </a>
        </div>

        <div class="menu-category">
            <a href="">
                <img src="images/fast.jpeg" alt="Fast foods">
                <h3>Fast foods</h3>
            </a>
        </div>

        <div class="menu-category">
            <a href="beverages.php">
                <img src="images/beverages.jpeg" alt="beverages">
                <h3>Beverages</h3>
            </a>
        </div>

        <div class="menu-category">
            <a href="breakfast.php">
                <img src="images/breakfast.jpeg" alt="breakfast">
                <h3>Breakfast</h3>
            </a>
        </div>

        <div class="menu-category">
            <a href="">
                <img src="images/Cocktail.jpeg" alt="Cocktail">
                <h3>Cocktail</h3>
            </a>
        </div>

        <div class="menu-category">
            <a href="">
                <img src="images/Appetizer.jpeg" alt="Appetizer">
                <h3>Appetizer</h3>
            </a>
        </div>

        <div class="menu-category">
            <a href="">
                <img src="images/kebab.jpeg" alt="Kebab">
                <h3>Kebab</h3>
            </a>
        </div>

        <div class="menu-category">
            <a href="">
                <img src="images/soups.jpeg" alt="Soups">
                <h3>Soups</h3>
            </a>
        </div>

        <div class="menu-category">
            <a href="">
                <img src="images/entrees.jpeg" alt="Entrees">
                <h3>Entrees</h3>
            </a>
        </div>

        <div class="menu-category">
            <a href="">
                <img src="images/sea.jpeg" alt="Sea foods">
                <h3>Sea Foods</h3>
            </a>
        </div>
        <h2 class="animated-text"><a href="mainpost.php">Place Your Order</a></h2>

       
        <!-- Add more categories as needed -->
    </div>
    <script>
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
});
</script>

    <script src="scripts.js">


    </script>
</body>
</html>
