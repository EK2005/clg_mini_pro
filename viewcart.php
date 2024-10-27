<?php
$servername = "localhost";
$username = "root";
$password = ""; // Your MySQL root password
$dbname = "textile_app";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the remove request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove_item'])) {
    $cart_id = $_POST['cart_id']; // Cart item ID

    // Delete the cart item
    $sql_delete = "DELETE FROM cart WHERE product_id = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("i", $cart_id);
    if ($stmt_delete->execute()) {
        echo "Item removed from the cart.";
    } else {
        echo "Failed to remove item.";
    }
}

// When form is submitted or phone number is passed via GET request
if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_GET['phone'])) {
    $phone = isset($_POST['phone']) ? $_POST['phone'] : $_GET['phone'];


    // Get the user details based on the phone number
    $sql = "SELECT customer_id, name FROM users WHERE phone = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($customer_id, $name);
        $stmt->fetch();

        echo "<h2>Cart for $name (Phone: $phone)</h2>";

        // Fetch the user's cart items
        $sql_cart = "SELECT cart.product_id, cart.product_id, cart.quantity, products.name, products.price, products.image
                     FROM cart 
                     JOIN products ON cart.product_id = products.id 
                     WHERE cart.customer_id = ?";
        $stmt_cart = $conn->prepare($sql_cart);
        $stmt_cart->bind_param("i", $customer_id);
        $stmt_cart->execute();
        $result_cart = $stmt_cart->get_result();

        if ($result_cart->num_rows > 0) {
            echo "<table border='1' style='width:100%; text-align:left;'>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                    </tr>";
            while ($row = $result_cart->fetch_assoc()) {
                $total_price = $row['price'] * $row['quantity'];
                echo "<tr>
                        <td><img src='" . $row['image'] . "' alt='" . $row['name'] . "' style='width:100px; height:100px;'></td>
                        <td>" . $row['name'] . "</td>
                        <td>$" . $row['price'] . "</td>
                        <td>" . $row['quantity'] . "</td>
                        <td>$" . $total_price . "</td>
                        <td>
                            <form method='POST' action='viewcart.php' style='margin:0;'>
                                <input type='hidden' name='cart_id' value='" . $row['product_id'] . "'>
                                <button type='submit' name='remove_item'>Remove</button>
                            </form>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "Your cart is empty.";
        }
    } else {
       

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
  background-color:deeppink;
        }
 .btn {
            background-color: midnightBlue;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 10px;
   text-decoration: none; /* Ensure no underline */
        }


    </style>
</head>
<body>

<!-- HTML form to enter phone number and view the cart -->
<form method="POST" action="viewcart.php">
<center>

    <label for="phone">Enter Phone Number to View Cart:</label>
    <input type="text" id="phone" name="phone" required>
    <button type="submit" class="btn">View Cart</button>
</center>
</form>
</body>