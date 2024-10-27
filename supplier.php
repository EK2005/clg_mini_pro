<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Become a Supplier - Dreamworld Textiles</title>
<style>
/* Reset default styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
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

.nav-links {
    list-style-type: none;
    display: flex;
    justify-content: flex-end;
    margin-right: 20px;
}

.nav-links li {
    margin-left: 20px;
}

.nav-links li a {
    text-decoration: none;
    color: #fff;
    transition: color 0.3s ease;
}

.nav-links li a:hover {
    color: #f4f4f4;
}

.supplier-section {
    max-width: 800px;
    margin: 50px auto;
    padding: 0 20px;
}

.supplier-content {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.supplier-content h2 {
    font-size: 2.2rem;
    margin-bottom: 20px;
}

.supplier-content p {
    font-size: 1.2rem;
    margin-bottom: 20px;
}

.supplier-form label {
    display: block;
    margin-bottom: 8px;
}

.supplier-form input,
.supplier-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.supplier-form textarea {
    resize: vertical;
    min-height: 100px;
}

.supplier-form button {
    background-color: #333;
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1.1rem;
    transition: background-color 0.3s ease;
}

.supplier-form button:hover {
    background-color: #555;
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

<section class="supplier-section">
    <div class="supplier-content">
        <h2>Become a Supplier</h2>
        <p>If you are interested in becoming a supplier for Dreamworld Textiles, please fill out the form below and our team will get in touch with you.</p>

        <form   method="POST" class="supplier-form">
            <label for="company-name">Company Name</label>
            <input type="text" id="company-name" name="company-name" required>

            <label for="contact-name">Contact Person</label>
            <input type="text" id="contact-name" name="contact-name" required>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="message">Message (Optional)</label>
            <textarea id="message" name="message" rows="4"></textarea>

            <a href="member.php"><button type="submit">Submit</button></a>
        </form>
    </div>
</section>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

   
$company_name = $_POST['company-name'];
$contact_name = $_POST['contact-name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

    $isql = "INSERT INTO suppliers(company_name, contact_name, email, phone, message) VALUES ('$company_name', '$contact_name',' $email', '$phone', '$message')";

    if ($conn->query($isql) === TRUE) {
        echo "                Registration successful...";
    } else {
        echo "Error: " . $isql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


</body>
</html>
