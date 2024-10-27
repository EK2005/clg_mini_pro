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

// Function to calculate total sales for a given interval (daily, weekly, monthly)
function get_sales_report($conn, $interval) {
    $stmt = $conn->prepare("
        SELECT SUM(total_amount) as sales 
        FROM orders 
        WHERE DATE(order_date) = CURDATE()
        OR (DATE(order_date) BETWEEN DATE_SUB(CURDATE(), INTERVAL ? DAY) AND CURDATE())");

    $stmt->bind_param("i", $interval);
    $stmt->execute();
    $stmt->bind_result($sales);
    $stmt->fetch();
    $stmt->close();

    return $sales ? $sales : 0;
}

// Function to get product-wise sales report
// Function to get product-wise sales report
function get_product_sales($conn) {
    $query = "
        SELECT p.name, SUM(o.total_amount) as product_sales 
        FROM products p
        JOIN orders o ON p.name = o.product_name
        GROUP BY p.name
        ORDER BY product_sales DESC";
    $result = $conn->query($query);

    $product_sales = [];
    while ($row = $result->fetch_assoc()) {
        $product_sales[] = $row;
    }
    return $product_sales;
}



// Function to get sales by location
// Function to get sales by address
function get_sales_by_address($conn) {
    $query = "
        SELECT u.address, SUM(o.total_amount) as address_sales 
        FROM orders o
        JOIN users u ON  o.customer_id = u.customer_id 
        GROUP BY u.address
        ORDER BY address_sales DESC";
    $result = $conn->query($query);

    $address_sales = [];
    while ($row = $result->fetch_assoc()) {
        $address_sales[] = $row;
    }
    return $address_sales;
}

// Function to get sales by payment method
function get_sales_by_payment_method($conn) {
    $query = "
        SELECT o.payment_method, SUM(o.total_amount) as payment_sales 
        FROM orders o
        GROUP BY o.payment_method
        ORDER BY payment_sales DESC";
    $result = $conn->query($query);

    $payment_sales = [];
    while ($row = $result->fetch_assoc()) {
        $payment_sales[] = $row;
    }
    return $payment_sales;
}

// Get Daily, Weekly, Monthly, and Yearly Sales
$daily_sales = get_sales_report($conn, 0);
$weekly_sales = get_sales_report($conn, 7);
$monthly_sales = get_sales_report($conn, 30);
$yearly_sales = get_sales_report($conn, 365);

// Get Product-wise, Location-wise, and Payment Method-wise Sales
$product_sales = get_product_sales($conn);
$location_sales = get_sales_by_address($conn);
$payment_sales = get_sales_by_payment_method($conn);

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
            color: #333;
        }
        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        th {
            background-color: #f8f9fa;
            text-align: left;
        }
        td {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
       <center> <h2>Sales Report</h2></center>

              <!-- Product-wise Sales Report -->
        <h3><u>Product-wise Sales</u></h3>
        <table>
            <tr>
                <th>Product</th>
                <th>Sales Amount (₹)</th>
            </tr>
            <?php foreach ($product_sales as $product) { ?>
            <tr>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo number_format($product['product_sales'], 2); ?></td>
            </tr>
            <?php } ?>
        </table>

        <!-- Sales by Region -->
        <h3><u>Sales by Region</u></h3>
        <table>
            <tr>
                <th>Region/Location</th>
                <th>Sales Amount (₹)</th>
            </tr>
            <?php foreach ($location_sales as $location) { ?>
            <tr>
                <td><?php echo $location['address']; ?></td>
                <td><?php echo number_format($location['address_sales'], 2); ?></td>
            </tr>
            <?php } ?>
        </table>

        <!-- Sales by Payment Method -->
        <h3><u>Sales by Payment Method</u></h3>
        <table>
            <tr>
                <th>Payment Method</th>
                <th>Sales Amount (₹)</th>
            </tr>
            <?php foreach ($payment_sales as $payment) { ?>
            <tr>
                <td><?php echo $payment['payment_method']; ?></td>
                <td><?php echo number_format($payment['payment_sales'], 2); ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
