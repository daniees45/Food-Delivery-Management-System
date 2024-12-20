
   

const showAlert = (message) => {
    const alertBox = document.getElementById('alertBox');
    
    // Set the alert message
    alertBox.textContent = message;
    
    // Show the alert
    alertBox.classList.remove('hidden');
    
    // Hide the alert after 10 seconds
    setTimeout(() => {
        alertBox.classList.add('hidden');
    }, 10000); // 10 seconds
};



const cart = [];

function isLoggedIn() {

return localStorage.getItem('loggedIn') === 'true';  // Modify according to your session logic
}
function addToCart(id) {
    const product = document.querySelector(`.product[data-id="${id}"]`);
    if (!product) {
        console.error('Product not found');
        return;
    }

    const productName = product.getAttribute('data-name');
    const productPrice = parseFloat(product.getAttribute('data-price'));
    const imageEL = product.querySelector('img');
    const image1 = imageEL.getAttribute('src');
    
    const cartItem = cart.find(item => item.id === id);
    if (cartItem) {
        cartItem.quantity += 1;
    } else {
        cart.push({ 
            id: id,
            name: productName, 
            price: productPrice, 
            quantity: 1, 
            image : image1
        });
    }
    updateCart();
    saveCart();
}

function removeFromCart(id) {
    const itemIndex = cart.findIndex(item => item.id === id);
    if (itemIndex > -1) {
        if (cart[itemIndex].quantity > 1) {
            cart[itemIndex].quantity -= 1;
        } else {
            cart.splice(itemIndex, 1);
        }
        updateCart();
        saveCart();
    }
}

function updateQuantity(id, change) {
    const cartItem = cart.find(item => item.id === id);
    if (cartItem) {
        const newQuantity = cartItem.quantity + change;
        if (newQuantity > 0) {
            cartItem.quantity = newQuantity;
        } else {
            const itemIndex = cart.findIndex(item => item.id === id);
            cart.splice(itemIndex, 1);
        }
        updateCart();
        saveCart();
    }
}

function updateCart() {
    const cartItems = document.getElementById('cart-items');
    const totalPrice = document.getElementById('total-price');
    cartItems.innerHTML = '';
    let total = 0;

    if (cart.length === 0) {
        cartItems.innerHTML = '<div class="empty-cart">Your cart is empty</div>';
        totalPrice.innerText = '$0.00';
        return;
    }

    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;
        cartItems.innerHTML += `
            <div class="cart-item" data-id="${item.id}">
                <img src="${item.image}" alt="${item.name}">
                <div class="cart-item-details">
                    <h3>${item.name}</h3>
                    <p>Price: ₵${item.price.toFixed(2)}</p>
                    <p>Subtotal: ₵${itemTotal.toFixed(2)}</p>
                </div>
                <div class="cart-item-actions">
                    <div class="quantity-controls">
                        <button class="quantity-btn" onclick="updateQuantity(${item.id}, -1) showAlert('one item removed from your cart!!')">-</button>
                        <span>${item.quantity}</span>
                        <button class="quantity-btn" onclick="updateQuantity(${item.id}, 1)" showAlert('one item added from your cart!!')>+</button>
                    </div>
                    <button class="remove-item" onclick="removeFromCart(${item.id})">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        `;
    });

    totalPrice.innerText = `$${total.toFixed(2)}`;
}

function checkout() {
    if (cart.length === 0) {
        alert('Your cart is empty!');
        return;
    }
    // You can implement your checkout logic here
    alert('Proceeding to checkout...');
}
const box = document.getElementById('alertBox');
function saveCart() {
    if (!isLoggedIn()) {
        alert('Please log in first!');
        box.hidden = true;
        return;
    }
    if (!cart || cart.length === 0) {
        console.error('Cart is empty. Cannot save.');
        return;
    }

    try {
        // Save cart to localStorage for persistence
        localStorage.setItem('cart', JSON.stringify(cart));

        // Calculate total price
        const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);

        // Get or generate cart_id
        let cartId = localStorage.getItem('cartid');
        if (!cartId) {
            cartId = randomInt(1, 10000); // Generate a random cart ID if not available
            localStorage.setItem('cartid', cartId); // Store the cart ID
        }

        // Prepare data for the POST request
        const cartData = {
            cart: cart, // Send the raw array for JSON encoding in the backend
            totalPrice: totalPrice,
            userId: sessionStorage.getItem('id'),
            cart_id: cartId
        };

        if (!cartData.userId) {
            console.error('User ID is missing. Cannot save cart.');
            return;
        }

        // Send the data to the backend
        fetch('CartUpload.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json', // Match PHP expectations
            },
            body: JSON.stringify(cartData), // Send as JSON
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Network response was not ok: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.status === 'success') {
                console.log('Cart saved successfully! Order ID:', data.cartid);
                localStorage.setItem('cartid', data.cartid); // Update cart ID in localStorage if necessary
            } else {
                console.error(`Error saving cart: ${data.message}`);
            }
        })
        .catch(error => {
            console.error('Error saving cart:', error);
        });
    } catch (error) {
        console.error('Error saving cart:', error);
    }
}

// Helper function to generate random integer for cart_id if needed
function randomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function loadCart() {
    try {
        const savedCart = localStorage.getItem('cart');
        if (savedCart) {
            cart.length = 0;
            const parsedCart = JSON.parse(savedCart);
            parsedCart.forEach(item => cart.push(item));
            updateCart();
        }
    } catch (error) {
        console.error('Error loading cart:', error);
    }
}

function clearCart() {
    if (confirm('Are you sure you want to clear your cart?')) {
        cart.length = 0;
        updateCart();
        saveCart();
        localStorage.removeItem('cart');
    }
}

// Initialize cart on page load
window.addEventListener('DOMContentLoaded', loadCart);
        // Call loadPosts when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            loadPosts('DESC'); // Load newest posts first
            loadCart(); // Load saved cart
        });

// Existing loadPosts function modified to support search
function loadPosts(order, searchTerm = '') {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'posting.php?order=' + order, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            try {
                const posts = JSON.parse(xhr.responseText);
                
                const postsContainer = document.getElementById('products-container');
                
                // Clear existing products
                postsContainer.innerHTML = '';

                // Create products grid
                const productsGrid = document.createElement('div');
                productsGrid.className = 'products-grid';

                // Filter posts based on search term
                const filteredPosts = posts.filter(post => 
                    searchTerm === '' || 
                    post.PostTitle.toLowerCase().includes(searchTerm.toLowerCase())
                );

                if (filteredPosts.length === 0) {
                    postsContainer.innerHTML = `
                        <div class="no-results">
                            <p>No products found matching your search.</p>
                        </div>
                    `;
                    return;
                }

                filteredPosts.forEach(post => {
                    // Create product card
                    const productCard = document.createElement('div');
                    productCard.className = 'product';
                    productCard.setAttribute('data-id', post.Postid);
                    productCard.setAttribute('data-name', post.PostTitle);
                    productCard.setAttribute('data-price', post.price);

                    // Format price to ensure it's a valid number with 2 decimal places
                    const formattedPrice = parseFloat(post.price).toFixed(2);

                    productCard.innerHTML = `
                        <img src="${post.banner_image || '/api/placeholder/400/320'}" 
                             alt="${post.PostTitle}"
                             onerror="this.src='/api/placeholder/400/320'">
                        <h3>${post.PostTitle}</h3>
                        <p class="price">₵${formattedPrice}</p>
                        <button class="add-to-cart" onclick="addToCart(${post.Postid}),showAlert('one item added from your cart!!')">
                            <i class="fas fa-cart-plus"></i> Add to Cart
                        </button>
                    `;

                    productsGrid.appendChild(productCard);
                });

                // Replace content
                postsContainer.appendChild(productsGrid);

            } catch (error) {
                console.error('Error processing posts:', error);
                showErrorMessage('Failed to load products. Please try again later.');
            }
        } else if (xhr.readyState === 4) {
            // Handle error states
            showErrorMessage('Failed to load products. Please try again later.');
        }
    };
    xhr.onerror = function() {
        showErrorMessage('Network error occurred. Please check your connection.');
    };
    xhr.send();
}

// Add event listener for search bar
document.addEventListener('DOMContentLoaded', function() {
    const searchBar = document.getElementById('searchBar');
    
    searchBar.addEventListener('input', function() {
        const searchTerm = this.value.trim();
        loadPosts('DESC', searchTerm);
    });

    // Initial load of posts
    loadPosts('DESC');
});

// Additional CSS for no results state
const searchStyles = `
    .no-results {
        text-align: center;
        padding: 2rem;
        color: #6c757d;
        background: #f8f9fa;
        border-radius: 8px;
        margin: 1rem 0;
    }

    #searchBar {
        width: 100%;
        padding: 0.5rem;
        margin-bottom: 1rem;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }
`;

// Add search bar to HTML structure
const updatedHtmlStructure = `
    <div class="container">
        <!-- Search input -->
        <input type="text" id="searchBar" placeholder="Search products...">
        
        <!-- Sort controls -->
        <div class="sort-controls">
            <button onclick="loadPosts('DESC')">Newest First</button>
            <button onclick="loadPosts('ASC')">Oldest First</button>
        </div>
        
        <!-- Products container -->
        <div id="products-container">
            <!-- Products will be loaded here -->
        </div>

        <!-- Cart container remains the same -->
        <div class="cart-container">
            <!-- ... existing cart HTML ... -->
        </div>
    </div>
`;