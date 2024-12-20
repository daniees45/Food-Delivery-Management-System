<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/checkout.js"></script>
    <style>
        .hidden{
            display: none;
        }
    </style>
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
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </header>

    <div class="container">
        <h1>Checkout</h1>

        <!-- Order Summary Section -->
        <section class="order-summary">
            <h2>Order Summary</h2>
            <div id="order-items">
                <!-- Cart items will be dynamically added here -->
            </div>
            <div class="order-total">
                <strong>Total:</strong> <span id="order-total-price">₵0.00</span>
            </div>
        </section>

        <!-- Billing Details Section -->
        <section class="billing-details">
        <label for="payment-method">Payment Method:</label>
                <select id="payment-method" name="payment-method" required>
                    <option value="credit-card">Credit Card</option>
                    <option value="mobile-money">Mobile Money</option>
                    <option value="cash-on-delivery">Cash on Delivery</option>
                </select>
            <h2>Billing Details</h2>
            <form id="billing-form1" >
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required style="width: 250px"><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required style="width: 280px"><br><br>

                <label for="address">Address:</label>
                <textarea id="address" name="address" placeholder="Enter your address" required style="width: 250px"></textarea><br><br>

                <button type="submit" class="place-order-btn">Place Order</button>
            </form>

            <form action="" id="momo" hidden>
                <label for="number">Phone:</label>
                <input type="number" name="number" id="number" required><br>

                <button type="submit" class="place-order-btn">Place Order</button>
            </form>
            
        </section>
        
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    // Load cart from localStorage
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const orderItemsContainer = document.getElementById('order-items');
    const orderTotalPrice = document.getElementById('order-total-price');

    // Populate order summary
    let total = 0;

    if (cart.length === 0) {
        orderItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
        return;
    }

    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;

        // Create order item element
        const orderItem = document.createElement('div');
        orderItem.className = 'order-item';
        orderItem.innerHTML = `
            <div>
                <img src="${item.image}" alt="${item.name}">
                <strong>${item.name}</strong> x ${item.quantity}
            </div>
            <div>₵${itemTotal.toFixed(2)}</div>
        `;
        orderItemsContainer.appendChild(orderItem);

        document.getElementById('name').value = sessionStorage.getItem('surname')+ " "+sessionStorage.getItem('firstname');
        document.getElementById('email').value = sessionStorage.getItem('email');
        if (sessionStorage.getItem('address') === 'null') {
            document.getElementById('address').innerHTML = " ";
        }else{
            document.getElementById('address').innerHTML = sessionStorage.getItem('address');
        }
        
        document.getElementById('number').value = sessionStorage.getItem('phone_number');
    });

    // Update total price
    orderTotalPrice.innerText = `₵${total.toFixed(2)}`;

    // Handle form submission
    const billingForm = document.getElementById('billing-form');
    billingForm.addEventListener('submit', function (event) {
        event.preventDefault();

        // Collect billing details
        const formData = new FormData(billingForm);
        const orderDetails = {
            cart: cart,
            name: formData.get('name'),
            email: formData.get('email'),
            address: formData.get('address'),
            paymentMethod: formData.get('payment-method'),
            totalPrice: total,
        };

        console.log('Order Details:', orderDetails);

        // Simulate sending data to server
        fetch('', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(orderDetails),
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Order placed successfully!');
                    localStorage.removeItem('cart'); // Clear cart after order
                    window.location.href = 'thank_you.html'; // Redirect to thank you page
                } else {
                    alert(`Order failed: ${data.message}`);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Something went wrong. Please try again.');
            });
    });
});

document.getElementById('billing-form1').addEventListener('submit', function(e) {
    const button = this.querySelector('.place-order-btn');
    button.classList.add('loading');
    button.textContent = 'Processing...';
});

document.getElementById('payment-method').addEventListener('change', function(){
    const Value = this.value;
    const billform =document.getElementById('billing-form1');
    const momo = document.getElementById('momo');

    if (Value === 'credit-card') {
        billform.hidden = false;
        momo.hidden =true;
    } else if(Value === 'mobile-money'){
        billform.hidden = true;
        momo.hidden =false;
    }
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
