<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAJ Food Service | Food, Drinks</title>

    <link rel="stylesheet" href="css/index.css">
    <script src="index.js"></script>
  
<style>
    /* Search Results Container */
#results {
    list-style-type: none;
    padding: 0;
    margin: 10px 0;
    max-height: 400px;
    overflow-y: auto;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Individual Search Result Item */
#results li {
    display: flex;
    align-items: center;
    padding: 15px;
    border-bottom: 1px solid #f0f0f0;
    transition: all 0.3s ease;
    cursor: pointer;
    position: relative;
}

#results li:last-child {
    border-bottom: none;
}

#results li:hover {
    background-color: #f5f5f5;
    transform: translateX(5px);
}

#results li::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background-color: transparent;
    transition: background-color 0.3s ease;
}

#results li:hover::before {
    background-color: #007bff;
}

/* Result Item Content Styling */
.result-content {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.result-title {
    font-weight: 600;
    color: #333;
    font-size: 16px;
    margin-bottom: 5px;
}

.result-details {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.result-category {
    margin-left: 10px;
    font-size: 14px;
    color: #666;
    margin-right: 10px;
}

.result-price {
    font-weight: bold;
    color: #28a745;
    font-size: 15px;
}

/* Icons or Indicators */
.result-icon {
    margin-right: 15px;
    color: #007bff;
    font-size: 24px;
}

/* No Results Styling */
#results .no-results {
    text-align: center;
    padding: 20px;
    color: #888;
    font-style: italic;
}

/* Responsive Adjustments */
@media (max-width: 600px) {
    #results li {
        flex-direction: column;
        align-items: flex-start;
    }

    .result-details {
        width: 100%;
        margin-top: 10px;
    }
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

#results li {
    animation: fadeIn 0.3s ease forwards;
    opacity: 0;
    animation-delay: calc(var(--i) * 0.05s);
}
.hidden{
    display: none;
}
</style>
    
    
    
</head>
<body class="body">
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
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </header>

   
    <main>
        <div class="food_banner" style="background-image : url('images/delivery.jpg')"> 
            <h1>Welcome to PAJ Delivery</h1>
            <p>Your best food delivery service at your door.</p>
            <div class="search-dish">
                <div class="searchposition">
                    <div>
                        Restaurant,Shops and Market
                    
                    <input type="text" placeholder="Search dishes" name="Search"class="searchinput" id="searchInput">
                   
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2 style="color: cadetblue;
    font-size: 33px;
    text-align: center;
    text-decoration: underline;" id="h2" hidden>Search</h2>
            <ul id="results"></ul>
        </div>
        <h2 id="rest-h2">Featured Restaurants</h2>
        <div class="animation">
            <section class="restaurants" onload="display()">
                <div class="oyibi-scroll">
                <div class="oyibi-restaurant"><img src="images/for background.avif" alt="Oyibi1"> <p>Oyibi Restaurant</p> </div>
                <div class="oyibi-restaurant"><img src="images/foodforbackground.jpg" alt="adenta"><p>Adenta Restaurant</p></div>
                <div class="oyibi-restaurant"><img src="images/photo.jpg" alt="madina"><p>Madina Restaurant</p></div>
                <div class="oyibi-restaurant"><img src="images/cheesecake.jpg" alt="adenta"><p>Adenta Restaurant</p></div>
                <div class="oyibi-restaurant"><img src="images/poke-wide.jpg" alt="madina"><p>Madina Restaurant</p></div>
                <div class="oyibi-restaurant"><img src="images/strawberries.jpg" alt="adenta"><p>Adenta Restaurant</p></div>
                <div class="oyibi-restaurant"><img src="images/fries-wide.jpg" alt="madina"><p>Madina Restaurant</p></div>
                </div>
                <div id="buttonId"><button type="button" ><a href="menu.php" style="text-decoration:none; color:white">Order Now</a></button></div><br>
                <h2 style="text-align : center; margin-bottom: -5px">MENU</h2>
                <iframe id="iframe" src="menu.php" width="100%" height="500px" frameborder="0"></iframe>
                
                <div class="track">
                    <div class="track1">
                        <div class="track2">
                            <h2>Track your Orders to your door </h2>
                            <p>Get your favourite food delivered in a flash. You’ll see when your rider’s picked up your order, and be able to follow them along the way. You’ll get a notification when they’re nearby, too.</p>
                        </div>
                        <div class="track-image">
                            <img src="images/tracking.webp" alt="map" class="track-img">
                            <img src="images/fries-wide.jpg" alt="Rider notification" class="track-not">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

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
                                            <li><p><a href="policy.php">Privacy</a></p></li>
                                           
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
                                        <li><p><a href="policy.php">Privacy</a></p></li>
                                       
                                    </ul>
                                </div>
                            </div>
                        
                    </nav>
                    <nav class="foot1-nav">
                            
                        <div class="foot1-div2">
                            <div class="foot1-div3">
                                <h3 class="foot1-h3">Help</h3>
                                <ul class="foot1-ul">
                                    <li><p><a href="contact.php">Contact</a></p></li>
                                    <li><p><a href="faq.php">FAQs</a></p></li>
                                   
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
       <script src="Search.js"></script>
       <script>
     window.addEventListener("DOMContentLoaded", (event) => {
    if (localStorage.getItem('loggedIn') == 'true') {
        document.getElementById('loginselect').style.display ='none';
        document.getElementById('reg').style.display ='none';
        
    }
})



const iframe = document.getElementById('iframe');
iframe.onload = () =>{
    const iframedoc = iframe.contentDocument || iframe.contentWindow.document;
    const header = iframedoc.querySelector('header') || iframedoc.querySelector('#header');
    const links =iframedoc.querySelectorAll('a');
    
    if(header){ header.style.display = 'none'};
    links.forEach(link => {
        link.addEventListener('click', (e)=>{
            e.preventDefault();
            window.open(link.href, '_blank');
        });
    });
};

document.getElementById('searchInput').addEventListener('input', function(){
    document.getElementById('h2').hidden =false;
})

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

       </script>
</body>
</html>