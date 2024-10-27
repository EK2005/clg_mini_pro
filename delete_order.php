<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "textile_app");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' parameter is present in URL
if (isset($_GET["id"])) {
    $order_id = $_GET["id"];

    // SQL query to delete the order
    $sql = "DELETE FROM orders WHERE order_id='$order_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Order deleted successfully!";
        header("Location: selectorder.php"); // Redirect back to the view orders page after deleting
        exit;
    } else {
        echo "Error deleting order: " . $conn->error;
    }
} else {
    echo "Invalid request.";
    exit;
}

$conn->close();
?>
