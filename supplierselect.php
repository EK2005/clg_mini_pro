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

// Select data from suppliers table
$sql = "SELECT * FROM suppliers";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Suppliers List - Dreamworld Textiles</title>
<style>
/* CSS styles (same as your current style) */
body {
    font-family: Arial, sans-serif;
    background-color: Lightgrey;
    color: #333;
}

header {
    background: #333;
    color: #fff;
    padding: 10px 0;
}

.logo {
    margin-left: 20px;
}

.logo h1 {
    font-size: 1.8rem;
}

.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 0 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ccc;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #333;
    color: #fff;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

button {
    padding: 5px 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}

button.delete {
    background-color: #f44336;
}

button:hover {
    opacity: 0.8;
}
</style>
</head>
<body>

<header>
    <nav>
        <div class="logo">
            <h1>Dreamworld Textiles</h1>
        </div>
    </nav>
</header>

<div class="container">
    <h2>Suppliers List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Company Name</th>
                <th>Contact Person</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Created At</th>
                <th>Actions</th> <!-- New column for edit/delete buttons -->
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["company_name"] . "</td>";
                    echo "<td>" . $row["contact_name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["message"] . "</td>";
                    echo "<td>" . $row["created_at"] . "</td>";
                    echo "<td>";
                    echo "<a href='editsupplier.php?id=" . $row['id'] . "'><button>Edit</button></a>";
                    echo " <a href='deletesupplier.php?id=" . $row['id'] . "'><button class='delete'>Delete</button></a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No suppliers found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
$conn->close();
?>
