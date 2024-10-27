<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        td img {
            display: block;
            margin: 0 auto;
            max-width: 50px;
            height: auto;
            border-radius: 4px;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        .action-buttons a {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            border-radius: 3px;
        }
        .edit-btn {
            background-color: #4CAF50;
        }
        .delete-btn {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <h2>View Orders</h2>
    <?php
    // Database connection
    $conn = new mysqli("localhost", "root", "", "textile_app");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to fetch order details
    $sql = "SELECT *, 
    CASE 
        WHEN DATE(order_date) = CURDATE() THEN CURDATE()
        ELSE order_date
    END AS displayed_order_date 
    FROM orders o
    JOIN users c ON o.customer_id = c.customer_id
    ORDER BY o.order_id;";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Order ID</th>
                    <th>Customer ID</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                    <th>Payment Method</th>
                    <th>Order Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["order_id"] . "</td>
                    <td>" . $row["customer_id"] . "</td>
                    <td>" . $row["product_name"] . "</td>
                    <td>$" . $row["product_price"] . "</td>
                    <td><img src='" . $row["product_image"] . "' alt='Product Image'></td>
                    <td>" . $row["quantity"] . "</td>
                    <td>$" . $row["total_amount"] . "</td>
                    <td>" . $row["payment_method"] . "</td>
                    <td>" . $row["displayed_order_date"] . "</td>
                    <td>
                        <div class='action-buttons'>
                            <a href='edit_order.php?id=" . $row["order_id"] . "' class='edit-btn'>Edit</a>
                        </div>
                    </td>
                    <td>
                        <div class='action-buttons'>
                            <a href='delete_order.php?id=" . $row["order_id"] . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this order?\");'>Delete</a>
                        </div>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }

    $conn->close();
    ?>
</body>
</html>
