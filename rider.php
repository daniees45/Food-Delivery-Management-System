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
    <title>Delivery Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="delivery_dashboard.js"></script>

    <script>
        // Redirect if not logged in
        if (localStorage.getItem('rider') !== 'true') { 
            alert("You are not logged in");
            window.location.href = "login.php";
        }
    </script> 
 
   
</head>
<body>

    <header>
        <h1>Rider Dashboard</h1>

        <p id="deliveryUser"></p>

        <nav class="header-nav">
                <ul id="lead">
                    <li><a href="">Orders</a></li>
                    <li><a href="">Earnings</a></li>
                    <li><a href="settingupdate.php">Settings</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div id="orders-list">
        <h2>Pending Orders</h2>
        <ul id="order-items">
            <!-- Orders will be dynamically inserted here -->
        </ul>
    </div>

    <!-- Order Details Modal -->
    <div id="order-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Order Details</h3>
            <div id="order-details"></div>
            <div id="order-actions">
                <button id="pickup-btn">Picked up</button>
                <button id="delivery-btn">Delivered</button>
            </div>
        </div>
    </div>

    <script src="rider.js"></script>



    <!-- Footer -->
    <footer>
        <p>© 2024 Delivery Dashboard | All rights reserved.</p>
    </footer>

  <script>
    // Constants
const STORAGE_KEY = 'delivery_user';
const API_ENDPOINT = '/api/orders'; // Replace with your actual API endpoint

// State management
let currentUser = null;

// DOM Elements
const elements = {
    ordersList: document.getElementById('order-items'),
    modal: document.getElementById('order-modal'),
    orderDetails: document.getElementById('order-details'),
    closeModal: document.querySelector('.close'),
    pickupBtn: document.getElementById('pickup-btn'),
    deliveryBtn: document.getElementById('delivery-btn'),
    deliveryUser: document.getElementById('deliveryUser')
};

// Helper Functions
const formatTimestamp = (timestamp) => {
    return new Date(timestamp).toLocaleString();
};

const createStatusBadge = (status) => {
    const statusClasses = {
        'Pending': 'status-pending',
        'Picked up': 'status-pickup',
        'Delivered': 'status-delivered'
    };
    
    return `<span class="status-badge ${statusClasses[status] || 'status-pending'}">${status}</span>`;
};

// Order Rendering
const renderOrders = () => {
    if (!elements.ordersList) return;
    
    elements.ordersList.innerHTML = orders
        .filter(order => order.status !== 'Delivered')
        .map(order => `
            <li class="order-item" data-order-id="${order.id}">
                <h3>Order #${order.id}</h3>
                <div class="order-info">
                    <p><strong>Customer:</strong> ${order.customer}</p>
                    <p><strong>Items:</strong> ${order.items.join(', ')}</p>
                    <p><strong>Status:</strong> ${createStatusBadge(order.status)}</p>
                    <p><strong>Time:</strong> ${formatTimestamp(order.timestamp)}</p>
                </div>
            </li>
        `)
        .join('');

    attachOrderListeners();
};

// Event Handlers
const attachOrderListeners = () => {
    const orderItems = document.querySelectorAll('.order-item');
    orderItems.forEach(item => {
        item.addEventListener('click', handleOrderClick);
    });
};

const handleOrderClick = (event) => {
    const orderId = parseInt(event.currentTarget.dataset.orderId);
    showOrderDetails(orderId);
};

const showOrderDetails = (orderId) => {
    const order = orders.find(order => order.id === orderId);
    if (!order) return;

    elements.orderDetails.innerHTML = `
        <div class="order-detail-content">
            <h4>Order #${order.id} Details</h4>
            <div class="order-info">
                <p><strong>Customer:</strong> ${order.customer}</p>
                <p><strong>Items:</strong> ${order.items.join(', ')}</p>
                <p><strong>Address:</strong> ${order.address}</p>
                <p><strong>Status:</strong> ${createStatusBadge(order.status)}</p>
                <p><strong>Time:</strong> ${formatTimestamp(order.timestamp)}</p>
            </div>
        </div>
    `;

    updateActionButtons(order);
    showModal();
};

const updateActionButtons = (order) => {
    const { pickupBtn, deliveryBtn } = elements;
    
    pickupBtn.style.display = order.status === 'Pending' ? 'block' : 'none';
    deliveryBtn.style.display = order.status === 'Picked up' ? 'block' : 'none';
    
    pickupBtn.onclick = () => updateOrderStatus(order.id, 'Picked up');
    deliveryBtn.onclick = () => updateOrderStatus(order.id, 'Delivered');
};

const updateOrderStatus = async (orderId, newStatus) => {
    try {
        // In a real application, you would make an API call here
        // await fetch(`${API_ENDPOINT}/${orderId}`, {
        //     method: 'PATCH',
        //     body: JSON.stringify({ status: newStatus })
        // });

        // For demo, update local state
        orders = orders.map(order => 
            order.id === orderId 
                ? { ...order, status: newStatus } 
                : order
        );

        hideModal();
        renderOrders();
        
        showNotification(`Order #${orderId} ${newStatus}`);
    } catch (error) {
        console.error('Error updating order:', error);
        showNotification('Failed to update order status', 'error');
    }
};

// Modal Management
const showModal = () => {
    elements.modal.classList.add('show');
    document.body.style.overflow = 'hidden';
};

const hideModal = () => {
    elements.modal.classList.remove('show');
    document.body.style.overflow = '';
};

// Notifications
const showNotification = (message, type = 'success') => {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
};

// Event Listeners
const initializeEventListeners = () => {
    elements.closeModal.addEventListener('click', hideModal);
    
    window.addEventListener('click', (event) => {
        if (event.target === elements.modal) {
            hideModal();
        }
    });

    // Keyboard navigation
    window.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && elements.modal.classList.contains('show')) {
            hideModal();
        }
    });
};

// Initialize Application
const initializeApp = () => {
    renderOrders();
    initializeEventListeners();
    
    // Set user info if available
    const userName = localStorage.getItem(STORAGE_KEY);
    if (userName && elements.deliveryUser) {
        elements.deliveryUser.textContent = `Welcome, ${userName}`;
    }
};

// Start the application
document.addEventListener('DOMContentLoaded', initializeApp);
  </script>
</body>
</html>
