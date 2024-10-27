<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "textile_app");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch the user details based on the ID
    $sql = "SELECT * FROM users WHERE customer_id='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "User not found!";
        exit;
    }
} else {
    echo "Invalid request!";
    exit;
}

// Update user details after form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $company = $_POST["company"];

    // SQL query to update the user details
    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone', address='$address', company='$company' WHERE customer_id='$user_id'";

    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully!";
        header("Location: selectuser.php"); // Redirect back to the user details page
        exit;
    } else {
        echo "Error updating user: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form action="" method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required><br><br>
        <label>Address:</label>
        <input type="text" name="address" value="<?php echo $row['address']; ?>" required><br><br>
        <label>Company:</label>
        <input type="text" name="company" value="<?php echo $row['company']; ?>" required><br><br>
        <button type="submit">Update User</button>
    </form>
</body>
</html>
