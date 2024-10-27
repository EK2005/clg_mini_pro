<?php
$servername = "localhost";
$username = "root";
$password = ""; // Your MySQL root password
$dbname = "textile_app";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    $company_name = $_POST["company_name"];
    $contact_name = $_POST["contact_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Update supplier details
    $sql = "UPDATE suppliers SET company_name='$company_name', contact_name='$contact_name', email='$email', phone='$phone', message='$message' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    header("Location: supplierselect.php"); // Redirect after updating
    exit();
}

// Fetch the supplier details
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM suppliers WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "No supplier found";
        exit();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>
</head>
<body>

<h2>Edit Supplier</h2>

<form method="post" action="editsupplier.php">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="company_name">Company Name:</label><br>
    <input type="text" id="company_name" name="company_name" value="<?php echo $row['company_name']; ?>"><br>

    <label for="contact_name">Contact Person:</label><br>
    <input type="text" id="contact_name" name="contact_name" value="<?php echo $row['contact_name']; ?>"><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br>

    <label for="phone">Phone:</label><br>
    <input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>"><br>

    <label for="message">Message:</label><br>
    <textarea id="message" name="message"><?php echo $row['message']; ?></textarea><br><br>

    <input type="submit" value="Update Supplier">
</form>

</body>
</html>
