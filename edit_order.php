<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "textile_app");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted to update the order
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST["order_id"];
    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $quantity = $_POST["quantity"];
    $total_amount = $product_price * $quantity;
    $payment_method = $_POST["payment_method"];

    // SQL query to update the order
    $sql = "UPDATE orders SET 
            product_name='$product_name',
            product_price='$product_price',
            quantity='$quantity',
            total_amount='$total_amount',
            payment_method='$payment_method'
            WHERE order_id='$order_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Order updated successfully!";
        header("Location: selectorder.php"); // Redirect back to the view orders page after updating
        exit;
    } else {
        echo "Error updating order: " . $conn->error;
    }
}

// Fetch the order details to edit
if (isset($_GET["id"])) {
    $order_id = $_GET["id"];
    
    // SQL query to get order details
    $sql = "SELECT * FROM orders WHERE order_id='$order_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Order not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
</head>
<body>
    <h2>Edit Order</h2>
    <form action="edit_order.php" method="POST">
        <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" value="<?php echo $row['product_name']; ?>" required><br><br>

        <label for="product_price">Product Price:</label>
        <input type="number" step="0.01" name="product_price" value="<?php echo $row['product_price']; ?>" required><br><br>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" required><br><br>

        <label for="payment_method">Payment Method:</label>
        <input type="text" name="payment_method" value="<?php echo $row['payment_method']; ?>" required><br><br>

        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
