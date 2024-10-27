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

// When user clicks "Add to Cart"
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = $_POST['phone'];
    $product_id = $_POST['product_id'];

    // Check if phone number exists in the users table
    $sql = "SELECT customer_id FROM users WHERE phone = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($customer_id);
        $stmt->fetch();

        // Debugging: Output customer_id to check
        echo "Customer ID: " . $customer_id . "<br>";

        // Check if the product is already in the user's cart
        $sql_cart = "SELECT * FROM cart WHERE customer_id = ? AND product_id = ?";
        $stmt_cart = $conn->prepare($sql_cart);
        $stmt_cart->bind_param("ii", $customer_id, $product_id);
        $stmt_cart->execute();
        $stmt_cart->store_result();

        if ($stmt_cart->num_rows > 0) {
            // Update product quantity in the cart
            $sql_update = "UPDATE cart SET quantity = quantity + 1 WHERE customer_id = ? AND product_id = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("ii", $customer_id, $product_id);
            $stmt_update->execute();
            echo "Product quantity updated in the cart for phone number: $phone";
        } else {
            // Insert new product in the cart
            $sql_insert = "INSERT INTO cart (customer_id, product_id, quantity) VALUES (?, ?, 1)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("ii", $customer_id, $product_id);
            $stmt_insert->execute();
            echo "Product added to the cart for phone number: $phone";
        }

    } else {
        echo "Phone number not found. Please log in or register.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        .form-container h2 {
            text-align: center;
            color: #333;
        }

        .form-container label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        .form-container input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        .form-container h3 {
            text-align: center;
            margin-top: 20px;
        }

        .form-container img {
            width: 40px;
            height: auto;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add to Cart</h2>
        <!-- HTML form for phone number input -->
        <form method="POST" action="add_to_cart.php">
            <h3>if you are not loggined please<a href="login.php">login</a></h3><br>

            <h3>(or)</h3><br>

            <label for="phone">Enter Phone Number:</label>
            <input type="text" id="phone" name="phone" required>
            
            <label for="product_id">Product Code:</label>
            <input type="text" id="product_id" name="product_id" required>

            <button type="submit">Add to Cart</button>
            
            <h3>To view cart click image :</h3>
            
            <a href="viewcart.php">
                <center>
                <img src="images/cart.webp" alt="Cart">
    </center>
            </a>
        </form>
    </div>
</body>
</html>

