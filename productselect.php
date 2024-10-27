<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
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
            max-width: 100px;
            height: auto;
            border-radius: 4px;
        }
        .action-buttons button {
            padding: 5px 10px;
            margin: 0 5px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }
        .action-buttons button.delete {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <h2>View Products</h2>
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

    // SQL query to select all products
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock Quantity</th>
                    <th>Size</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>$" . $row["price"] . "</td>
                    <td>" . $row["quantity"] . "</td>
                    <td>" . $row["size"] . "</td>
                    <td><img src='" . $row["image"] . "' alt='Product Image'></td>
                    <td class='action-buttons'>
                        <button onclick=\"window.location.href='edit_product.php?id=" . $row["id"] . "'\">Edit</button>
                    </td>
                    <td class='action-buttons'>
                        <button class='delete' onclick=\"if(confirm('Are you sure to delete this product?')) window.location.href='delete_product.php?id=" . $row["id"] . "';\">Delete</button>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No products found.";
    }

    // Close the connection
    $conn->close();
    ?>
</body>
</html>
