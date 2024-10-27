<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "textile_app");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // SQL query to delete the user
    $sql = "DELETE FROM users WHERE customer_id='$user_id'";

    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully!";
        header("Location: selectuser.php"); // Redirect back to the user details page
        exit;
    } else {
        echo "Error deleting user: " . $conn->error;
    }
} else {
    echo "Invalid request!";
    exit;
}

$conn->close();
?>
