<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "textile_app";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to create the orders table
$sql = "CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock_quantity INT NOT NULL,
    size VARCHAR(255) NOT NULL,
    image_url VARCHAR(255) NOT NULL
)";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Table product created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the connection
$conn->close();
?>
