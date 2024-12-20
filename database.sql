CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    surname VARCHAR(50) NOT NULL,
    firstname VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,      -- Ensure to hash the password
    email VARCHAR(100) NOT NULL UNIQUE,
    age INT,
    gender VARCHAR(50),
    phone_number VARCHAR(20),
    location VARCHAR(100),
    amount DECIMAL(10, 2) DEFAULT 0.00,  -- Amount could represent wallet balance or total spending
    address TEXT,
    profile_image VARCHAR(255),          -- Stores path to image file
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);