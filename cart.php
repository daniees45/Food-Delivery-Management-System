<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAJ Food Service - Cart</title>
    <link rel="stylesheet" href="cart.css">

</head>
<body>
    <header>
      <section>
        <div class="section-div1">
            <div class="section-div2">
                <input type="checkbox" name="" id="cart-menu" hidden>
                <label for="cart-menu">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                          </svg>
                    </span>
                </label>
                    
                        <div class="dropdown">
                            <a href="index.php">Home</a>
                            <a href="contact.html"><span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-rolodex" viewBox="0 0 16 16">
                                    <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                    <path d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1z"/>
                                  </svg> Contact
                            </span></a>
                            <a href="login.php"><span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/>
                                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                                  </svg> Login
                            </span></a>
                        </div>
    
            </div>
            
        </div>
        
      </section>

      <div class="searchContainer">
        <input type="text" placeholder="Search dishes" id="search_dishes">
        <button id="search-button">Search</button>
    </div>
       
    </header>

    <main>
        <h1>Your Cart</h1>
        <div class="cart-item">
            <h2>Restaurant Name</h2>
            <p>Food Item 1 - $10.00</p>
            <button>Remove</button>
        </div>
        <div class="cart-item">
            <h2>Restaurant Name</h2>
            <p>Food Item 2 - $15.00</p>
            <button>Remove</button>
        </div>
        <h2>Total: $25.00</h2>
        <button>Proceed to Checkout</button>
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
