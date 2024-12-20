<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cart.css">
    <script src="cart.js" defer></script>
</head>
<body>
        <!-- Product/Food Menu (Dynamic Content) -->
        <section id="menu">
        <h2>Our Menu</h2>
        <div class="product" data-id="1" data-name="Pizza" data-price="10.99">
            <h3>Pizza</h3>
            <p>Price: $10.99</p>
            <button onclick="addToCart(1)">Add to Cart</button>
        </div>
        <div class="product" data-id="2" data-name="Burger" data-price="8.99">
            <h3>Burger</h3>
            <p>Price: $8.99</p>
            <button onclick="addToCart(2)">Add to Cart</button>
        </div>
        <!-- Add more products as needed -->
         <div class="product" data-id="3" data-name="Wakkye" data-price="9.99">
            <h3 id="food">Wakkye</h3>
            <img src="" alt="wakkye">
            <p>Delicious Food</p>
            <p>Price: $9.99</p>
            <button onclick="addToCart(3)">Add to Cart</button>
         </div>
    </section>
</body>
</html>