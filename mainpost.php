<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="css/break.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/back.js"></script>
    <script src="Search.js"></script>
    

</head>
<style>
 .hidden{
        display : none;
    }
</style>
<body background="">

<header>
        <div class="homepage">
            <div>
                
                <div class="header-content">
                    <img src="images/PAJ.webp" alt="logo">
                        <a href="" class="headerlink"><p>PAJ</p></a>
                </div>
                <div class="search-container">
            <input type="text" placeholder="Search for food..." id="searchBar">
            
            </div>
                <div class="header2">
                    <nav>
                        <ul id="menulink">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="" id="account">Account</a></li>
                            <li><a href="menu.php">Menu</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li> <a href="cart.html" class="view-cart">
                <i class="fas fa-shopping-cart"></i> Cart
            </a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

</header>

    <div class="container">
        <!-- Optional sort controls -->
       
        <div class="sort-controls">
        <button type="button" onclick="goback()" class="sort-btn" style="left : 120px; position:absolute;">Previous</button>
            <button onclick="loadPosts('DESC')" class="sort-btn">
                <i class="fas fa-sort-amount-down"></i> Newest First
            </button>
            <button onclick="loadPosts('ASC')" class="sort-btn">
                <i class="fas fa-sort-amount-up"></i> Oldest First
            </button>
            <button type="button" onclick="goforward()" class="sort-btn" style="right : 120px; position:absolute; ">Next</button>
        </div>

        <!-- Products container -->
        <div id="products-container">
            <!-- Products will be loaded hee -->
        </div>

        <!-- Cart container (remains the same as before) -->
        <div class="cart-container" hidden>
        <header>
            <h1>Your Cart</h1>
            <a href="menu.html" class="back-to-menu">
                <i class="fas fa-arrow-left"></i> Back to Menu
            </a>
        </header>
        <div id="cart-items" class="cart-items">
            <!-- Cart items will be dynamically added here -->
        </div>
        <div class="cart-summary">
            <h3>Total: <span id="total-price">$0.00</span></h3>
            <button onclick="checkout()" class="checkout-btn">
                <i class="fas fa-shopping-cart"></i> Proceed to Checkout
            </button>
        </div>
    </div>
    </div>
 <div id="alertBox" class="alert hidden"></div>
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

 <script src="js/mainpost.js"  defer></script>
</body>
</html>