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

// Collect form data
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_image = $_FILES['product_image']['name'];
$quantity = $_POST['quantity'];
$dress_type = $_POST['dress-type'];
$size=$_POST['size'];

// Handle image upload
$target_dir = "uploads/";
$target_file = $target_dir . basename($product_image);
move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file);

// Insert product data into the database
$insert_query = "INSERT INTO products (name, price, image, quantity, dress_type,size) 
                 VALUES ('$product_name', '$product_price', '$target_file', '$quantity', '$dress_type','$size')";

if ($conn->query($insert_query) === TRUE) {
    echo "New product added successfully";
} else {
    echo "Error: " . $insert_query . "<br>" . $conn->error;
}

// Select the product data based on the dress type
$select_query = "SELECT * FROM products WHERE dress_type='$dress_type'";
$result = $conn->query($select_query);

// Display the selected dress type details in a styled way
if ($result->num_rows > 0) {
    // Fetch the data
    $row = $result->fetch_assoc();

// Redirect based on dress type
switch ($dress_type) {
    case 'saree':
        header("Location: saree.php?dress=$dress_type");
        break;
    case 'kurti':
        header("Location: saree.php?dress=$dress_type");
        break;
    case 'jeans':
        header("Location: saree.php?dress=$dress_type");
        break;
    case 'tops':
        header("Location: saree.php?dress=$dress_type");
        break;
    case 'ethnic':
        header("Location: saree.php?dress=$dress_type");
        break;
    case 'western':
        header("Location: saree.php?dress=$dress_type");
        break;
        case 'profession':
            header("Location: saree.php?dress=$dress_type");
            break;
            case 'sports':
                header("Location: saree.php?dress=$dress_type");
                break;
    
            
    default:
        header("Location: admindashboard.php"); // Default page if something goes wrong
}
}
exit;
?>
