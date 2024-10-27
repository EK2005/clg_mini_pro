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

session_start();
if (!isset($_SESSION['email'])) {
    die("Error: You must be logged in to place an order.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = htmlspecialchars($_POST['product_name']);
    $product_price = $_POST['product_price'];
    $product_image = htmlspecialchars($_POST['product_image']);
    $quantity = $_POST['quantity'];
    $payment_method = htmlspecialchars($_POST['hidden_payment_method']);
    $total_amount = $product_price * $quantity;


    $product_size = htmlspecialchars($_POST['product_size']);
    $email = $_SESSION['email'];

    // Check if customer_id exists in users table
    $check_customer_stmt = $conn->prepare("SELECT customer_id FROM users WHERE email=?");
    $check_customer_stmt->bind_param("s", $email);
    $check_customer_stmt->execute();
    $check_customer_stmt->bind_result($customer_id);
    $check_customer_stmt->fetch();
    $check_customer_stmt->close();

    if (!$customer_id) {
        die("NOTE: Please go to webpage and sign in your details & place order.");
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO orders (customer_id, product_name, product_price, product_image, product_size, quantity, total_amount, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isdsisds", $customer_id, $product_name, $product_price, $product_image, $product_size, $quantity, $total_amount, $payment_method);
    
    // Execute SQL statement
    if ($stmt->execute()) {
        $message = "Order placed successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .confirmation {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .confirmation h2 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .confirmation video {
            max-width: 100%;
            margin-bottom: 20px;
            border-radius: 8px;
        }
        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        .button-container button {
            padding: 1rem 2rem;
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .button-container button:hover {
            background-color: #45a049;
        }
        .chat-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: blue;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 50%;
            font-size: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .chat-button:hover {
            background-color: green;
        }
    </style>
</head>
<body>
    <div class="confirmation">
        <h2>Order Confirmation</h2>
            <video width="320" height="240" autoplay loop muted>
            <source src="gif.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="button-container">
            <button onclick="viewOrder()">View Order</button>
            <button onclick="shopAgain()">Shop Again</button>
        </div><br>

<label for="deliveryDate">Delivery Date:</label>
  <input type="date" id="deliveryDate" name="deliveryDate" required>
  <span id="dateError" style="color:red;display:none;">Please select a future date.</span>
  <input type="submit" value="submit">
<script>
  document.getElementById('deliveryDate').addEventListener('change', function() {
    var selectedDate = new Date(this.value);
    var today = new Date();
    today.setHours(0, 0, 0, 0);

    if (selectedDate < today) {
      document.getElementById('dateError').style.display = 'inline';
    } else {
      document.getElementById('dateError').style.display = 'none';
    }
  });
</script>



    </div>
    <a href="customersupport.php"><button class="chat-button">Chat</button></a>

    <script>
        function viewOrder() {
            window.location.href = 'orderdetails.php';
        }

        function shopAgain() {
            window.location.href = 'frame.php';
        }
    </script>
</body>
</html>
