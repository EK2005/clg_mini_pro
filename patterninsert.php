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

// Retrieve form data
$cloth = $_POST['cloth'];
$size = $_POST['size'];
$color1 = $_POST['color1'];
$color2 = $_POST['color2'];
$pattern = $_POST['pattern'];
$quantity = $_POST['quantity'];
$payment_method = $_POST['payment_method'];

// Determine price based on selected cloth
switch ($cloth) {
    case 'kurti':
        $price = 500.00;
        break;
    case 'saree':
        $price = 1000.00;
        break;
    case 'tshirt':
        $price = 300.00;
        break;
    case 'top':
        $price = 400.00;
        break;
    case 'pant':
        $price = 600.00;
        break;
    default:
        $price = 500.00; // Default price if cloth is not recognized
        break;
}

// Calculate total price
$total_price = $quantity * $price;

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO pattern (cloth, size, color1, color2, pattern, quantity, payment_method, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssis", $cloth, $size, $color1, $color2, $pattern, $quantity, $payment_method, $total_price);

// Execute the statement
if ($stmt->execute()) {
    echo "your order processed successfully.";
    echo"<br>";
    echo"NOTE:For custom design amount will be collected during delivery.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
