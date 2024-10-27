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

// Get product ID from the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // SQL query to delete the product
    $sql = "DELETE FROM products WHERE id = $product_id";

    if ($conn->query($sql) === TRUE) {
        echo "Product deleted successfully.";
        // Redirect to the view products page
        header('Location: productselect.php');
        exit;
    } else {
        echo "Error deleting product: " . $conn->error;
    }
} else {
    echo "Product ID not provided.";
}

// Close the connection
$conn->close();
?>
