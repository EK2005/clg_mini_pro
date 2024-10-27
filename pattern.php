<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pattern Customization and Order Form</title>
 <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            margin: 0;
            background-image: url('images/Screenshot (267).png');
            background-size: cover;
        }
        .container {
            width: 100%;
            max-width: 650px; /* Reduced max-width */
            display: flex;
            justify-content: center; /* Centering forms */
            margin: 20px;
        }
        .customize, .order {
            width: 45%; /* Adjusted width */
            background-color: #ffffff;
            padding: 20px; /* Further reduced padding */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 10px;
        }
        .pattern-preview {
            width: 100%;
            height: 100px; /* Reduced height */
            border: 1px solid #ccc;
            margin-bottom: 15px; /* Reduced margin */
            background-color: #ffffff;
            background-repeat: repeat;
            background-position: center center;
        }
        label {
            font-weight: bold;
            margin-top: 8px; /* Reduced margin */
            display: block;
        }
        select, input[type="color"], input[type="number"], input[type="radio"] {
            padding: 5px; /* Reduced padding */
            margin-bottom: 8px; /* Reduced margin */
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button, .submit-btn {
            padding: 8px 16px; /* Adjusted padding */
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover, .submit-btn:hover {
            background-color: #45a049;
        }
        .pattern-selector {
            display: flex;
            flex-wrap: wrap;
        }
        .pattern-option {
            margin-right: 15px; /* Reduced margin */
        }
        .selected-color {
            display: inline-block;
            width: 18px; /* Reduced size */
            height: 18px; /* Reduced size */
            margin-left: 8px; /* Reduced margin */
            border: 1px solid #ccc;
            vertical-align: middle;
        }
        .size-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px; /* Reduced margin */
        }
        .size-group label {
            flex: 1;
            display: flex;
            align-items: center;
            font-weight: normal;
            cursor: pointer;
        }
        .size-group input[type="radio"] {
            margin-right: 8px; /* Reduced margin */
        }
        .total {
            font-weight: bold;
            font-size: 1.1rem; /* Reduced font size */
        }
    </style>
</head>
<body>

    <form method="post" action="patterninsert.php">
        <div class="container">
            <div class="customize">
                <h2>Customize Your Pattern</h2>

                <label for="color1">Select Color 1:</label>
                <input type="color" id="color1" name="color1" value="#ff0000" onchange="displaySelectedColor('color1')">
                <div id="selectedColor1" class="selected-color" style="background-color: #ff0000;"></div><br>

                <label for="color2">Select Color 2:</label>
                <input type="color" id="color2" name="color2" value="#00ff00" onchange="displaySelectedColor('color2')">
                <div id="selectedColor2" class="selected-color" style="background-color: #00ff00;"></div><br>

                <fieldset class="pattern-selector">
                    <legend>Select Pattern:</legend>
                    <label class="pattern-option">
                        <input type="radio" name="pattern" value="stripes"> Stripes
                    </label>
                    <label class="pattern-option">
                        <input type="radio" name="pattern" value="polka-dots"> Polka Dots
                    </label>
                    <label class="pattern-option">
                        <input type="radio" name="pattern" value="chevron"> Chevron
                    </label>
                    <label class="pattern-option">
                        <input type="radio" name="pattern" value="grid"> Grid
                    </label>
                    <label class="pattern-option">
                        <input type="radio" name="pattern" value="waves"> Waves
                    </label>
                    <label class="pattern-option">
                        <input type="radio" name="pattern" value="checkerboard"> Checkerboard
                    </label>
                    <label class="pattern-option">
                        <input type="radio" name="pattern" value="zigzag"> Zigzag
                    </label>
                    <label class="pattern-option">
                        <input type="radio" name="pattern" value="circles"> Circles
                    </label>
                    <label class="pattern-option">
                        <input type="radio" name="pattern" value="crosshatch"> Crosshatch
                    </label>
                    <label class="pattern-option">
                        <input type="radio" name="pattern" value="herringbone"> Herringbone
                    </label>
                </fieldset><br>

                <input type="button" value="Apply Pattern" onclick="applyPattern()">

                <div class="pattern-preview" id="preview"></div>
            </div>

            <div class="order">
                <h2>Order Form</h2>

                <div class="form-group">
                    <label for="cloth">Cloth:</label>
                    <select id="cloth" name="cloth" onchange="updatePrice()">
                        <option value="kurti">Kurti</option>
                        <option value="saree">Saree</option>
                        <option value="tshirt">T-Shirt</option>
                        <option value="top">Top</option>
                        <option value="pant">Pant</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <span id="price">Rs. 500.00</span>
                </div>

                <div class="form-group">
                    <label>Size:</label>
                    <div class="size-group">
                        <label for="size_s"><input type="radio" id="size_s" name="size" value="S"> S</label>
                        <label for="size_m"><input type="radio" id="size_m" name="size" value="M"> M</label>
                        <label for="size_l"><input type="radio" id="size_l" name="size" value="L"> L</label>
                        <label for="size_xl"><input type="radio" id="size_xl" name="size" value="XL"> XL</label>
                        <label for="size_xxl"><input type="radio" id="size_xxl" name="size" value="XXL"> XXL</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" max="10" onchange="calculateTotal()">
                </div>

                <div class="form-group">
                    <label for="total">Total:</label>
                    <span id="total" class="total">Rs. 500.00</span>
                </div>

                <div class="form-group">
                    <label for="payment_method">Select Payment Method:</label>
                    <select id="payment_method" name="payment_method" onchange="updateHiddenInput()">
                        <option value="credit_card">Credit Card</option>
                        <option value="debit_card">Debit Card</option>
                        <option value="paypal">PayPal</option>
                        <option value="cash_on_delivery">Cash on Delivery</option>
                    </select>
                </div>

                <input type="hidden" id="hidden_payment_method" name="hidden_payment_method">

                <button type="submit" class="submit-btn">Place Order</button>
            </div>
        </div>
    </form>

    <script>
        function displaySelectedColor(colorId) {
            var color = document.getElementById(colorId).value;
            document.getElementById('selected' + colorId.charAt(colorId.length - 1)).style.backgroundColor = color;
        }

        function applyPattern() {
            var color1 = document.getElementById('color1').value;
            var color2 = document.getElementById('color2').value;
            var selectedPattern = document.querySelector('input[name="pattern"]:checked');

            if (!selectedPattern) {
                alert('Please select a pattern.');
                return;
            }

            var pattern = selectedPattern.value;
            var preview = document.getElementById('preview');
            preview.style.background = `linear-gradient(to right, ${color1}, ${color2})`;

            switch (pattern) {
                case 'stripes':
                  
                    preview.style.backgroundSize = '10px 100%';
                    break;
                case 'polka-dots':
                    preview.style.backgroundSize = '10px 10px';
                    preview.style.backgroundImage = `radial-gradient(circle, ${color1} 30%, transparent 30%)`;
                    break;
                case 'chevron':
                    preview.style.backgroundSize = '20px 20px';
                    preview.style.backgroundImage = `linear-gradient(45deg, ${color1} 25%, transparent 25%)`;
                    break;
                case 'grid':
                    preview.style.backgroundSize = '20px 20px';
                    preview.style.backgroundImage = `linear-gradient(to right, ${color1} 1px, transparent 1px), linear-gradient(to bottom, ${color1} 1px, transparent 1px)`;
                    break;
                case 'waves':
                    preview.style.backgroundSize = '20px 20px';
                    preview.style.backgroundImage = `radial-gradient(circle, ${color1} 50%, transparent 50%)`;
                    break;
                case 'checkerboard':
                    preview.style.backgroundSize = '40px 40px';
                    preview.style.backgroundImage = `linear-gradient(45deg, ${color1} 25%, transparent 25%)`;
                    break;
                case 'zigzag':
                    preview.style.backgroundSize = '40px 40px';
                    preview.style.backgroundImage = `linear-gradient(135deg, ${color1} 50%, transparent 50%)`;
                    break;
                case 'circles':
                    preview.style.backgroundSize = '10px 10px';
                    preview.style.backgroundImage = `radial-gradient(circle, ${color1} 50%, transparent 50%)`;
                    break;
                case 'crosshatch':
                    preview.style.backgroundSize = '20px 20px';
                    preview.style.backgroundImage = `linear-gradient(45deg, ${color1} 10%, transparent 10%)`;
                    break;
                case 'herringbone':
                    preview.style.backgroundSize = '20px 40px';
                    preview.style.backgroundImage = `linear-gradient(60deg, ${color1} 25%, transparent 25%), linear-gradient(-60deg, ${color1} 25%, transparent 25%)`;
                    break;
                default:
                    preview.style.background = `linear-gradient(to right, ${color1}, ${color2})`;
                    break;
            }
        }

        function updatePrice() {
            var cloth = document.getElementById('cloth').value;
            var price = 500;
            if (cloth === 'saree') price = 700;
            else if (cloth === 'tshirt') price = 300;
            document.getElementById('price').textContent = 'Rs. ' + price.toFixed(2);
            calculateTotal();
        }

        function calculateTotal() {
            var price = parseFloat(document.getElementById('price').textContent.replace('Rs. ', ''));
            var quantity = parseInt(document.getElementById('quantity').value);
            var total = price * quantity;
            document.getElementById('total').textContent = 'Rs. ' + total.toFixed(2);
        }

        function updateHiddenInput() {
            var selectedPayment = document.getElementById('payment_method').value;
            document.getElementById('hidden_payment_method').value = selectedPayment;
        }
    </script>

</body>
</html>
