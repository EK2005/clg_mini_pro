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
        .details-card input[type="radio"] {
            margin-right: 10px;
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
        function calculateTotal(price, quantity, totalElementId) {
            var total = price * quantity;
            document.getElementById(totalElementId).innerText = total.toFixed(2);
        }

        function updateHiddenInput(selectId, hiddenInputId) {
            var selectElement = document.getElementById(selectId);
            var hiddenInputElement = document.getElementById(hiddenInputId);
            hiddenInputElement.value = selectElement.value;
        }
    </script>
</head>
<body> 
<div class="confirmation-card">
    <div class="image-card">
        <img src="images/wedding/w2.jpg" alt="Wedding 2">
    </div>
    <div class="details-card">
        <div class="title-price-card">
            <h3>Wedding Wear 2</h3>
            <p>Price: Rs.2500</p>
        </div>
        <div class="description-card">
            <p>Product Details:
                <br>Name: Wedding Wear
                <br>Fabric: Silk
                <br>Sleeve Length: Long Sleeve
                <br>Pattern: Embroidered
                <br>Combo of: Single
                <br>Sizes: S, M, L, XL, XXL
                <br>Country of Origin: India
            </p>
        </div>
        <div class="order-card">
            <form action="place_order.php" method="POST" onsubmit="updateHiddenInput('payment_method_w2', 'hidden_payment_method_w2')">
                <input type="hidden" name="product_name" value="Wedding Wear 2">
                <input type="hidden" name="product_price" value="2500">
                <input type="hidden" name="product_image" value="images/wedding/w2.jpg">
                <div class="size-card">
                    <label for="size">Size:</label>
                    <input type="radio" id="size_s" name="size" value="S"> S
                    <input type="radio" id="size_m" name="size" value="M"> M
                    <input type="radio" id="size_l" name="size" value="L"> L
                    <input type="radio" id="size_xl" name="size" value="XL"> XL
                    <input type="radio" id="size_xxl" name="size" value="XXL"> XXL
                </div>
                <label for="quantity_w2">Quantity:</label>
                <input type="number" id="quantity_w2" name="quantity" value="1" min="1" max="10" class="quantity" onchange="calculateTotal(2500, this.value, 'total_w2')">
                <br>
                <span>Total: Rs. <span id="total_w2" class="total">2500.00</span></span>
                <div class="payment-method">
                    <label for="payment_method_w2">Select Payment Method:</label>
                    <select id="payment_method_w2" name="payment_method" onchange="updateHiddenInput('payment_method_w2', 'hidden_payment_method_w2')">
                        <option value="credit_card">Credit Card</option>
                        <option value="debit_card">Debit Card</option>
                        <option value="paypal">PayPal</option>
                        <option value="cash_on_delivery">Cash on Delivery</option>
                    </select>
                </div>
                <input type="hidden" id="hidden_payment_method_w2" name="hidden_payment_method">
                <button type="submit" class="submit-btn">Place Order</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>