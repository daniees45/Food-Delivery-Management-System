

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Restaurants</title>
    <link rel="stylesheet" href="css/index.css">
  
    <style>
     /* Reset and base styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f7fa;
    color: #333;
    line-height: 1.6;
}

.homepage{
    left : 0;
}
/* Header styles */
header {
    background: linear-gradient(135deg, #007BFF, #0056b3);
    color: white;
    padding: 2rem 1rem;
    text-align: center;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
}

header h1 {
    font-size: 2.5rem;
    font-weight: 600;
    margin: 0;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}

/* Container styles */
.container {
    max-width: 1200px;
    margin: 2rem auto;
    padding: 0 20px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

/* Restaurant card styles */
.restaurant {
    background-color: white;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    display: flex;
    flex-direction: column;
    gap: 0.8rem;
}

.restaurant:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.restaurant h3 {
    color: #2d3748;
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    border-bottom: 2px solid #007BFF;
    padding-bottom: 0.5rem;
}

.restaurant p {
    margin: 0.5rem 0;
    color: #4a5568;
    font-size: 1rem;
}

.restaurant span {
    font-weight: 600;
    color: #2d3748;
}

/* Loading state */
.container > p {
    grid-column: 1 / -1;
    text-align: center;
    padding: 2rem;
    font-size: 1.1rem;
    color: #666;
}

/* Error message */
.error-message {
    background-color: #fff5f5;
    color: #c53030;
    padding: 1rem;
    border-radius: 8px;
    text-align: center;
    grid-column: 1 / -1;
}

/* Responsive adjustments */
@media screen and (max-width: 768px) {
    header h1 {
        font-size: 2rem;
    }

    .container {
        grid-template-columns: 1fr;
        padding: 0 15px;
    }

    .restaurant {
        padding: 1.2rem;
    }
}

/* Animation for loading state */
@keyframes pulse {
    0% { opacity: 0.6; }
    50% { opacity: 1; }
    100% { opacity: 0.6; }
}

.container > p:first-child {
    animation: pulse 1.5s infinite ease-in-out;
}

/* Additional visual enhancements */
.restaurant p:last-child {
    color: #007BFF;
    font-size: 0.95rem;
}

/* Optional: Add icons */
.restaurant p span::before {
    content: '📍';
    margin-right: 5px;
}

/* Optional: Add hover effect for email */
.restaurant p:last-child:hover {
    color: #0056b3;
    cursor: pointer;
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
                            <li><a href="displayRestaurant.php">Restaurants</a></li>
                            <li><a href="cart.html">Cart</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <h1>Available Restaurants</h1>

    </header>
    <div class="container" id="restaurantContainer">
        <p>Loading restaurants...</p>
    </div>

    <script>
        // Fetch restaurant data
        fetch('display.php')
            .then((response) => response.json())
            .then((data) => {
                const container = document.getElementById('restaurantContainer');
                container.innerHTML = ""; // Clear loading message

                if (data.success) {
                    data.data.forEach((restaurants) => {
                        const div = document.createElement('div');
                        div.className = 'restaurant';
                        div.innerHTML = `
                            <h3>${restaurants.name}</h3>
                            <p><span>Location:</span> ${restaurants.ADDRESS}</p>
                            <p>${restaurants.email}</p>
                        `;
                        container.appendChild(div);
                    });
                } else {
                    container.innerHTML = `<p>${data.message}</p>`;
                }
            })
            .catch((error) => {
                console.error("Error fetching restaurants:", error);
                document.getElementById('restaurantContainer').innerHTML = "<p>An error occurred while loading restaurants.</p>";
            });
    </script>
</body>
</html>
