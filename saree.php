<?php
// Start session to access stored product data
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Textile Sarees</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            justify-content: center;
        }
        .product-card {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            border-radius: 8px;
        }
        .product-card img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .product-card h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
        .product-card p {
            font-size: 1rem;
            color: #666666;
        }
        .product-card .buttons {
            margin-top: 15px;
            display: flex;
            justify-content: space-around;
        }
        .product-card .buttons a {
            text-decoration: none;
            color: #333;
            padding: 10px 20px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .product-card .buttons a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
<?php
// Database connection (replace with your own database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "textile_app"; // Assuming your database is named 'textile_app'

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the dress type from the URL
if (isset($_GET['dress'])) {
    $dress_type = $_GET['dress'];

    // Select the product data based on the dress type
    $select_query = "SELECT * FROM products WHERE dress_type='$dress_type'";
    $result = $conn->query($select_query);

    // Display the product data
    if ($result->num_rows > 0) {
        echo "<h2>Products in the $dress_type category:</h2>";
        echo "<div class='container'>"; // Container for the grid

        while ($row = $result->fetch_assoc()) {
?>
            <div class="product-card">
                <img src="<?php echo $row['image']; ?>" alt="Product Image">
                <h3>PRODUCT-ID: <?php echo $row['id']; ?></h3>
                <h3><?php echo $row['name']; ?></h3>
                <p>PRICE: <?php echo $row['price']; ?></p>
                <div class="buttons">
                    <a href="saree1.php?id=<?php echo $row['id']; ?>" class="buy-now">Buy Now</a>
                    <a href="add_to_cart.php" class="see-more">Add to cart</a>
                </div>
            </div>
<?php
        }

        echo "</div>"; // Close container
    } else {
        echo "No products found in the $dress_type category.";
    }
} else {
    echo "No dress type selected.";
}

$conn->close();
?>
</body>
</html>
