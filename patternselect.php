<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        td img {
            display: block;
            margin: 0 auto;
            max-width: 50px;
            height: auto;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<h2><CENTER>CUSTOMIZE PATTERN DETAILS</CENTER></h2></body></html>
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

// SQL query to select all records from the pattern table
$sql = "SELECT * FROM pattern";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Cloth</th><th>Size</th><th>Color 1</th><th>Color 2</th><th>Pattern</th><th>Quantity</th>
<th>Total Price</th><th>Order Date</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["cloth"] . "</td>";
        echo "<td>" . $row["size"] . "</td>";
        echo "<td>" . $row["color1"] . "</td>";
        echo "<td>" . $row["color2"] . "</td>";
        echo "<td>" . $row["pattern"] . "</td>";
        echo "<td>" . $row["quantity"] . "</td>";
       
        echo "<td>" . $row["total_price"] . "</td>";
        echo "<td>" . $row["order_date"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close the connection
$conn->close();
?>
