<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myshop_db";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    // Database created or already exists
} else {
    echo "Error creating database: " . $conn->error;
}

// Select database
$conn->select_db($dbname);

// Create products table if not exists
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(50),
    stock INT(6) DEFAULT 0,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert sample products if table is empty
$result = $conn->query("SELECT COUNT(*) as count FROM products");
$row = $result->fetch_assoc();

if ($row['count'] == 0) {
    $sql = "INSERT INTO products (name, description, price, category, stock, image_url) VALUES
    ('Wireless Headphones', 'High-quality sound and long battery life', 50.00, 'Electronics', 25, 'https://via.placeholder.com/200'),
    ('Smart Watch', 'Track your fitness and notifications easily', 80.00, 'Electronics', 15, 'https://via.placeholder.com/200'),
    ('Bluetooth Speaker', 'Portable speaker with amazing sound quality', 35.00, 'Electronics', 30, 'https://via.placeholder.com/200'),
    ('Laptop Stand', 'Ergonomic stand for better posture', 25.00, 'Accessories', 40, 'https://via.placeholder.com/200'),
    ('USB-C Cable', 'Fast charging and data transfer', 12.00, 'Accessories', 100, 'https://via.placeholder.com/200'),
    ('Wireless Mouse', 'Comfortable and precise wireless mouse', 28.00, 'Electronics', 50, 'https://via.placeholder.com/200')";
    
    if ($conn->multi_query($sql) === TRUE) {
        // Sample data inserted
    }
}

?>
