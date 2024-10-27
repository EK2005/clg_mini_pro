<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .confirmation-card {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            width: 100%;
            max-width: 1000px;
            margin: 20px auto;
            text-align: left;
        }
        .image-card {
            flex: 1;
            margin-right: 20px;
        }
        .image-card img {
            width: 100%;
            max-width: 450px;
            border: 2px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .details-card {
            flex: 2;
        }
        .title-price-card {
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .title-price-card h3 {
            font-size: 24px;
            margin: 10px 0;
        }
        .title-price-card p {
            font-size: 18px;
            color: #333;
            margin: 10px 0;
        }
        .description-card {
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .description-card p {
            font-size: 18px;
            color: #333;
            margin: 10px 0;
        }
        .size-card {
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .size-card label {
            font-size: 16px;
            display: block;
            margin-bottom: 10px;
        }
        .order-card {
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .details-card label {
            font-size: 16px;
            margin-top: 10px;
            display: block;
        }
        .details-card input[type="number"], .details-card select {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .submit-btn {
            background-color: #6f42c1;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 20px auto 0;
        }
        .submit-btn:hover {
            background-color: #5a34a6;
        }
    </style>
    <script>
   function calculateTotal(basePrice, size, quantity, totalElementId) {
            basePrice = parseFloat(basePrice);
            quantity = parseInt(quantity);
            
            if (isNaN(basePrice) || isNaN(quantity) || quantity < 1) {
                document.getElementById(totalElementId).innerText = '0.00';
                return;
            }

            let sizeMultiplier = 1; 
            switch (size) {
                case 'M':
                    sizeMultiplier = 1;
                    break;
                case 'L':
                    sizeMultiplier = 1.1;
                    break;
                case 'XL':
                    sizeMultiplier = 1.2;
                    break;
                case 'XXL':
                    sizeMultiplier = 1.3;
                    break;
                default:
                    sizeMultiplier = 1;
            }

            let adjustedPrice = basePrice * sizeMultiplier;
            let total = adjustedPrice * quantity;
            document.getElementById(totalElementId).innerText = total.toFixed(2);
        }

        function updateSize(size) {
            const basePrice = document.getElementById('price').textContent;
            const quantity = document.getElementById('quantity1').value;
            calculateTotal(basePrice, size, quantity, 'total1');
        }

        function updateQuantity(quantity) {
            const size = document.getElementById('product_size').value;
            const basePrice = document.getElementById('price').textContent;
            calculateTotal(basePrice, size, quantity, 'total1');
        }
        function updateHiddenInput(selectId, hiddenInputId) {
            var selectElement = document.getElementById(selectId);
            var hiddenInputElement = document.getElementById(hiddenInputId);
            hiddenInputElement.value = selectElement.value;
        }
    </script>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "textile_app";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select_query = "SELECT * FROM products WHERE id='$id'";
    $result = $conn->query($select_query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="confirmation-card">
                <div class="image-card">
                    <img src="<?php echo $row['image']; ?>" alt="Product Image">
                </div>
                <div class="details-card">
                    <div class="title-price-card">
                        <h3><?php echo $row['name']; ?></h3>
                        <p>PRICE: $<span id="price"><?php echo $row['price']; ?></span></p>
                    </div>
                    <div class="description-card">
                        <p>Product Details:
                            <br>Material: High-quality material
                            <br>Pattern: Stylish pattern
                            <br>Available Sizes: Multiple sizes
                        </p>
                    </div>
                    <div class="order-card">
                        <form action="place_order.php" method="POST">
                            <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">

                           
<div class="size-card">
                                <label for="product_size">Size:</label>
                                <select id="product_size" name="product_size" onchange="updateSize(this.value)">
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </div>

                            <label for="quantity1">Quantity:</label>
                            <input type="number" id="quantity1" name="quantity" value="1" min="1" 
                                   oninput="updateQuantity(this.value)">
                            <p>Total Price: $<span id="total1">0.00</span></p>

                            
                                <label for="payment_method1">Select Payment Method:</label>
                                <select id="payment_method1" name="payment_method" onchange="updateHiddenInput('payment_method1', 'hidden_payment_method1')">
                                    <option value="credit_card">Credit Card</option>
                                    <option value="debit_card">Debit Card</option>
                                    <option value="paypal">PayPal</option>
                                    <option value="cash_on_delivery">Cash on Delivery</option>
                                </select>
                            
                            <input type="hidden" id="hidden_payment_method1" name="hidden_payment_method">

                            <button type="submit" class="submit-btn">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p>Product not found.</p>";
    }
}

$conn->close();
?>
</body>
</html>
