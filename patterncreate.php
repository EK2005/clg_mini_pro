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
$sql = "CREATE TABLE pattern (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cloth VARCHAR(50) NOT NULL,
    size VARCHAR(5) NOT NULL,
    color1 VARCHAR(7) NOT NULL,
    color2 VARCHAR(7) NOT NULL,
    pattern VARCHAR(50) NOT NULL,
    quantity INT NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Table 'pattern' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the connection
$conn->close();
?>
