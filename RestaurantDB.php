<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restaurant Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>/* Basic Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: dodgerblue;
    color: white;
}

.dashboard {
    display: block;
}

/* Simple Sidebar */
.sidebar {
    background-color: #333;
    color: white;
    padding: 10px;
    width: 200px;
    float: left;
    height: 100vh;
}

.sidebar h2 {
    font-size: 24px;
    text-align: center;
    border-bottom: 2px solid dodgerblue;
    padding-bottom: 10px;
}

.sidebar-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar-menu li {
    margin: 10px 0;
    border-bottom: 1px solid #555;
}

.sidebar-menu a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 5px;
}

.sidebar-menu a:hover {
    background-color: dodgerblue;
}

/* Main Content Area */
.main-content {
    margin-left: 210px;
    padding: 15px;
    background-color: white;
    color: black;
    min-height: 100vh;
}

.dashboard-card {
    background-color: #f0f0f0;
    border: 2px solid dodgerblue;
    margin: 10px 0;
    padding: 15px;
}

.dashboard-card:hover {
    background-color: #e0e0e0;
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    border: 2px solid dodgerblue;
}

table th {
    background-color: dodgerblue;
    color: white;
    padding: 10px;
    text-align: left;
}

table td {
    padding: 10px;
    border: 1px solid #ccc;
}

table tr:nth-child(even) {
    background-color: #f0f0f0;
}

/* Button Styles */
button {
    background-color: dodgerblue;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
}

button:hover {
    background-color: #1873CC;
}

/* Simple Modal */
.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
}

.modal-content {
    background-color: white;
    margin: 100px auto;
    padding: 20px;
    width: 300px;
    border: 3px solid dodgerblue;
}

.modal-content input,
.modal-content select {
    width: 100%;
    padding: 5px;
    margin: 5px 0;
    border: 1px solid dodgerblue;
}</style>
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <h2>Restaurant Dashboard</h2>
            <ul class="sidebar-menu">
                <li><a href="#" onclick="showSection('overview')">
                    <i class="fas fa-home"></i> Overview
                </a></li>
                <li><a href="index.php"><i class="fas fa-home">Home</i></a></li>
                <li><a href="RestaurantPosting.php" onclick="showSection('menu')">
                    <i class="fas fa-utensils"></i> Menu Management
                </a></li>
                <li><a href="#" onclick="showSection('orders')">
                    <i class="fas fa-shopping-cart"></i> Orders
                </a></li>
                <li><a href="#" onclick="showSection('inventory')">
                    <i class="fas fa-box"></i> Inventory
                </a></li>
                <li><a href="#" onclick="showSection('reports')">
                    <i class="fas fa-chart-line"></i> Reports
                </a></li>
                <li><a href="#" onclick="showSection('settings')">
                    <i class="fas fa-cog"></i> Settings
                </a></li>
                <li><a href="logout.php" id="logout">Log Out</a></li>
            </ul>
        </div>
        <div class="main-content" id="mainContent">
            <div id="overview" class="dashboard-section">
                <h1>Dashboard Overview</h1>
                <div class="dashboard-card">
               
                    <h3>Today's Performance</h3>
                    <div style="display: flex; justify-content: space-between;">
                        <div>Total Sales: $2,345</div>
                        <div>Orders: 87</div>
                        <div>Average Order Value: $27</div>
                    </div>
                </div>
                <div class="dashboard-card">
                    <h3>Quick Stats</h3>
                    <div style="display: flex; justify-content: space-between;">
                        <div>Pending Orders: 12</div>
                        <div>In Preparation: 5</div>
                        <div>Ready for Pickup: 3</div>
                    </div>
                </div>
            </div>
            <div id="menu" class="dashboard-section" style="display:none;">
                <h1>Menu Management</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="menuItemsBody">
                        <!-- Dynamic menu items will be inserted here -->
                    </tbody>
                </table>
                <button onclick="openAddItemModal()">Add New Item</button>
            </div>
        </div>
    </div>

    <script>
        // function showSection(sectionId) {
        //     const sections = document.querySelectorAll('.dashboard-section');
        //     sections.forEach(section => section.style.display = 'none');
        //     document.getElementById(sectionId).style.display = 'block';
        // }

        // function openAddItemModal() {
        //     const modal = document.createElement('div');
        //     modal.classList.add('modal');
        //     modal.innerHTML = `
        //         <div class="modal-content">
  
    </script>
</body>
</html>
