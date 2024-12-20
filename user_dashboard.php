
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAJ | User Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
   
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/dashboard.css">
    
    <script src="js/user_dashboard.js"></script>
<style>
    .hidden{
        display : none;
    }
    #order-history-container {
    margin-top: 2rem;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 1rem;
    background-color: #f9f9f9;
}

#order-history-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1rem;
}

#order-history-table th, #order-history-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

#order-history-table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

#order-history-table img {
    border-radius: 4px;
}

</style>
    <script>
        // Redirect if not logged in
    
       
    </script>


</head>
<body  id="bodyV">
    <!-- Header -->
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
                            <li><a href="displayRestaurant.php">Restaurants</a></li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <ul>
                <li><a href="profile.html">Profile</a></li>
                <li><a href="cart.html">Cart</a></li>
                <li><a href="payments.html">Payment Methods</a></li>
                <li><a href="help.html">Help</a></li>
                <li><a href="settingupdate.php">Settings</a></li>
                <li><a href="logout.php" id="logout">Log Out</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
    <!-- Welcome Section -->
    <section class="welcome-section">
        <h2 id="userEl">Welcome, User!</h2>
        <h3 id="usermail">user@example.com</h3>
        <p id="id">User ID: 123456</p>
        <p class="credit-balance">Credit Balance: <span id="creditBalance">GH₵ 0.00</span></p>
        
        <input type="number" id="amount" name="amount" placeholder="Enter amount" value="0" class="hidden"/><br>
        <button id="addCredit" class="add-credit-btn" >Add Credit</button>

    </section>

    <!-- Order History Section -->
    <section class="order-history">
    <div id="order-history-container">
    <h2>Order History</h2>
    <table id="order-history-table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <!-- Order history rows will be added here -->
        </tbody>
    </table>
</div>

    </section>

    <div>
        
    </div>

    <!-- Current Orders Section -->
    <section class="current-orders">
        <h3>Current Orders</h3>
        <div class="current-order">
            <p class="order-status">Order Status: <span class="status in-progress">In Progress</span></p>
            <p>Estimated Delivery: <span id="deliveryTime">20 mins</span></p>
            <button class="track-order-btn">Track Order</button>
        </div>
    </section>
</main>

    </div>
    

    <!-- Footer -->
    <div id="page-footer">
        <footer class="foot1">
            <div class="foot1-div">
                <nav class="foot1-nav">
                    <div class="foot1-div1">
                        <div class="foot1-div2">
                            <h3 class="foot1-h3">Discover PAJ</h3>
                            <ul class="foot1-ul">
                                <li><a href="http://">Delivery</a></li>
                                <li><a href="http://">About</a></li>
                                <li><a href="http://">Policy</a></li>
                            </ul>
                        </div>
                        <div class="foot1-div2">
                            <h3 class="foot1-h3">Legal</h3>
                            <ul class="foot1-ul">
                                <li><a href="http://">Terms and Conditions</a></li>
                                <li><a href="policy.html">Privacy</a></li>
                            </ul>
                        </div>
                        <div class="foot1-div2">
                            <h3 class="foot1-h3">Help</h3>
                            <ul class="foot1-ul">
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </footer>
    </div>

    <script>
     window.addEventListener("load", (event) =>{
            
            if (localStorage.getItem('loggedIn') !== 'true') {
                
              window.location.href = "login.php";
              
            }
        });
     
        // Fetch session values from PHP and display them
        // const surname = sessionStorage.getItem('surname');
        // const firstname = sessionStorage.getItem('firstname');
        // const email = sessionStorage.getItem('email');
        // const id =sessionStorage.getItem('id');
        

        // document.getElementById('userEl').textContent = surname+" "+ firstname  ;
        // document.getElementById('usermail').textContent = email;
        // document.getElementById('id').textContent = id;

        // Select elements for interactivity
const userEl = document.getElementById('userEl');
const usermail = document.getElementById('usermail');
const userId = document.getElementById('id');
const creditBalanceEl = document.getElementById('creditBalance');
const addCreditBtn = document.getElementById('addCredit');
const deliveryTimeEl = document.getElementById('deliveryTime');
const trackOrderBtns = document.querySelectorAll('.track-order-btn');
const detailsBtns = document.querySelectorAll('.details-btn');
const amount = document.getElementById('amount');
// Example user data
const userData = {
    name: sessionStorage.getItem('surname') || "Guest",
    firstname :sessionStorage.getItem('firstname') || "",
    email: sessionStorage.getItem('email') || "unknown",
    id: sessionStorage.getItem('id') || "N/A",
    credit: sessionStorage.getItem('amount') || "0.00",
};

// Populate user information dynamically
function loadUserData() {
    userEl.textContent = `Welcome, ${userData.name} ${userData.firstname}!`;
    usermail.textContent = userData.email;
    userId.textContent = `User ID: ${userData.id}`;
    creditBalanceEl.textContent = `GH₵ ${sessionStorage.getItem('amount')}`;
}

addCreditBtn.addEventListener('click', () => {
    // Toggle visibility of amount input
    const amountInput = document.getElementById('amount');
    
    if (amountInput.classList.contains('hidden')) {
        // If hidden, show the input
        amountInput.classList.remove('hidden');
        amountInput.focus(); // Optional: automatically focus on the input
    } else {
        // If already visible, process the credit addition
        const amount = amountInput.value;

        if (!amount || amount <= 0) {
            alert("Please enter a positive amount!");
            return;
        }

        // Send the amount to the PHP script
        fetch('amount.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ 
                amount: parseFloat(amount),
                id: userData.id
            }),
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                sessionStorage.setItem('amount', data.amount);
                creditBalanceEl.textContent = `GH₵ ${data.amount}`;
               
                alert(data.message + ". Amount: " + data.amount);
                amountInput.value = ""; // Clear input
                amountInput.classList.add('hidden'); // Hide input again
            } else {
                alert("Error: " + data.message);
            }
        })
        .catch((error) => {
            console.error("Error:", error);
        });
    }
});

// Handle track order button click
trackOrderBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        alert("Tracking feature is under development. Stay tuned!");
    });
});

// Handle view details button click
detailsBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        alert("Order details feature is under development. Stay tuned!");
    });
});

// Simulate updating delivery time (e.g., decrease every minute)
let deliveryMinutes = 20; // Example delivery time in minutes
const deliveryInterval = setInterval(() => {
    if (deliveryMinutes > 0) {
        deliveryMinutes--;
        deliveryTimeEl.textContent = `${deliveryMinutes} mins`;
    } else {
        clearInterval(deliveryInterval); // Stop the countdown when delivery is complete
        deliveryTimeEl.textContent = "Delivered";
        alert("Your order has been delivered!");
    }
}, 60000); // Decrease every 60 seconds (1 minute)

// Load user data on page load
loadUserData();

async function generateOrderHistory() {
    const usersid = userData.id;
    const orderHistoryTable = document.getElementById('order-history-table')?.querySelector('tbody');

    if (!orderHistoryTable) {
        console.error('Order history table not found.');
        return;
    }

    // Clear previous table content
    orderHistoryTable.innerHTML = '';

    if (!usersid) {
        console.error('User ID is not defined.');
        orderHistoryTable.innerHTML = `<tr><td colspan="5">User ID not found. Unable to load order history.</td></tr>`;
        return;
    }

    try {
        const response = await fetch('process_order.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ user_id: usersid }),
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const cartItems = await response.json();

        console.log('Server response:', cartItems);

        if (!Array.isArray(cartItems) || cartItems.length === 0) {
            orderHistoryTable.innerHTML = `<tr><td colspan="5">No order history available</td></tr>`;
            return;
        }

        // Render cart items with more robust rendering
        cartItems.forEach(item => {
            const productName = item.product_name || 'Unknown Product';
            const productPrice = item.product_price ? parseFloat(item.product_price).toFixed(2) : '0.00';
            const quantity = item.quantity || 0;
            const totalPrice = productPrice * quantity;
            const productImage = item.product_image || 'path/to/default/image.jpg';

            const row = `
                <tr>
                    <td>${productName}</td>
                    <td><img src="${productImage}" alt="${productName}" style="max-width: 50px; max-height: 50px;"></td>
                    <td>₵${productPrice}</td>
                    <td>${quantity}</td>
                    <td>₵${totalPrice.toFixed(2)}</td>
                </tr>
            `;
            orderHistoryTable.innerHTML += row;
        });
    } catch (error) {
        console.error('Error generating order history:', error);
        orderHistoryTable.innerHTML = `<tr><td colspan="5">Error loading order history: ${error.message}</td></tr>`;
    }
}




// Call this function on page load to display the order history
document.addEventListener('DOMContentLoaded', generateOrderHistory);


// Display no orders message

document.addEventListener('',function(){
    let email =prompt
})
    </script>
</body>
</html>
