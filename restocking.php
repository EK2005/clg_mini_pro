<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restocking Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 150px;
        }
        .notification-form {
            margin-top: 200px;
            max-width: 500px;
            margin: auto;
            padding: 50px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .notification-form h2 {
            text-align: center;
        }
        .notification-form label {
            display: block;
            margin-bottom: 20px;
        }
        .notification-form input[type="text"],
        .notification-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            
        }
        .notification-form input[type="submit"]:hover
{
border-color:green;
background-color:pink;
}
    </style>
</head>
<body>
    <div class="notification-form">
        <h2>Restocking Notification</h2>
        <form id="notification-form">
            <label for="product-code">Enter Product Code:</label>
            <input type="text" id="product-code" name="product_code" placeholder="Enter Product Code" required><br><br>
            <input type="submit" value="Notify Me">
        </form>
    </div>

    <script>
        document.getElementById('notification-form').addEventListener('submit', function(event) {
            event.preventDefault();
            var productCode = document.getElementById('product-code').value;
            alert('You will be notified when product ' + productCode + ' is back in stock.');
        });
    </script>
</body>
</html>
