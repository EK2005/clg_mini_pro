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

// Function to get customer purchase history
function get_customer_purchase_history($conn, $user_id) {
    $query = "
        SELECT o.order_id, o.total_amount, o.order_date 
        FROM orders o 
        WHERE o.customer_id = ?"; // Use customer_id
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $purchase_history = [];
    while ($row = $result->fetch_assoc()) {
        $purchase_history[] = $row;
    }
    $stmt->close();
    return $purchase_history;
}

// Function to get top customers
function get_top_customers($conn, $limit = 10) {
    $query = "
        SELECT u.customer_id, u.name, COUNT(o.order_id) as purchase_count, SUM(o.total_amount) as total_spent 
        FROM users u
        JOIN orders o ON u.customer_id = o.customer_id 
        GROUP BY u.customer_id, u.name
        ORDER BY total_spent DESC
        LIMIT ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $limit);
    $stmt->execute();
    $result = $stmt->get_result();

    $top_customers = [];
    while ($row = $result->fetch_assoc()) {
        $top_customers[] = $row;
    }
    $stmt->close();
    return $top_customers;
}

// Handle form submission for purchase history
$purchase_history = [];
if (isset($_POST['user_id'])) {
    $purchase_history = get_customer_purchase_history($conn, $_POST['user_id']);
}

// Get top customers
$top_customers = get_top_customers($conn);

// Close connection only after fetching necessary data
// $conn->close(); // Leave this open for now to use in the dropdown
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Reports</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #212529;
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            border: 1px solid #dee2e6;
            text-align: left;
        }
        th {
            background-color: #f1f1f1;
        }
        .button-container {
            margin: 20px 0;
        }
        .button-container button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .button-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Top Customers</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Purchase Count</th>
                <th>Total Spent</th>
            </tr>
            <?php foreach ($top_customers as $customer): ?>
                <tr>
                    <td><?php echo $customer['name']; ?></td>
                    <td><?php echo $customer['purchase_count']; ?></td>
                    <td>₹<?php echo number_format($customer['total_spent'], 2); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>Customer Purchase History</h2>
        <form method="POST">
            <select name="user_id" required>
                <option value="">Select Customer</option>
                <?php
                // Populate dropdown with users
                $user_result = $conn->query("SELECT customer_id, name FROM users");
                while ($user = $user_result->fetch_assoc()) {
                    echo "<option value='{$user['customer_id']}'>{$user['name']}</option>"; // Fixed this line
                }
                ?>
            </select>
            <button type="submit">Get Purchase History</button>
        </form>
        <?php if (!empty($purchase_history)): ?>
            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Total Amount</th>
                    <th>Order Date</th>
                </tr>
                <?php foreach ($purchase_history as $purchase): ?>
                    <tr>
                        <td><?php echo $purchase['order_id']; ?></td> <!-- Fixed field name -->
                        <td>₹<?php echo number_format($purchase['total_amount'], 2); ?></td>
                        <td><?php echo $purchase['order_date']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
