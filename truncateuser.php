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

$sql = "drop table orders";

if ($conn->query($sql) === TRUE) {
    echo "Table has been ALTERED successfully.";
} else {
    echo "Error truncating table: " . $conn->error;
}

$conn->close();
?>
