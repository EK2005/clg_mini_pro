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

// Retrieve user details
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            background-color: #007bff;
            border-radius: 4px;
        }
        a.delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <h2>User Details</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Company</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["customer_id"] . "</td>
                    <td>" . htmlspecialchars($row["name"]) . "</td>
                    <td>" . htmlspecialchars($row["email"]) . "</td>
                    <td>" . htmlspecialchars($row["phone"]) . "</td>
                    <td>" . htmlspecialchars($row["address"]) . "</td>
                    <td>" . htmlspecialchars($row["company"]) . "</td>
                    <td><a href='edit_user.php?id=" . $row["customer_id"] . "'>Edit</a></td>
                    <td><a class='delete' href='delete_user.php?id=" . $row["customer_id"] . "' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a></td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No users found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
