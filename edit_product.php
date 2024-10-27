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

// Get product ID from the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch the product details from the database
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Product not found.";
        exit;
    }
}

// Handle form submission to update product
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $size = $_POST['size'];
    $image = $_POST['image'];

    // SQL query to update the product details
    $sql = "UPDATE products SET 
            name = '$name', 
            price = '$price', 
            quantity = '$quantity', 
            size = '$size',
            image = '$image' 
            WHERE id = $product_id";

    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully.";
        // Redirect to the view products page
        header('Location: productselect.php');
        exit;
    } else {
        echo "Error updating product: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="number"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h2>Edit Product</h2>

<form action="edit_product.php?id=<?php echo $product_id; ?>" method="post">
    <label for="name">Product Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" step="0.01" value="<?php echo $row['price']; ?>" required>

    <label for="quantity">Stock Quantity:</label>
    <input type="number" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>" required>

    <label for="size">Size:</label>
    <input type="text" id="size" name="size" value="<?php echo $row['size']; ?>" required>

    <label for="image">Image URL:</label>
    <input type="text" id="image" name="image" value="<?php echo $row['image']; ?>" required>

    <button type="submit">Update Product</button>
</form>

</body>
</html>
