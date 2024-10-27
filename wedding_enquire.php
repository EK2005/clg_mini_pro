<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $event_date = $_POST['event_date'];
  $message = $_POST['message'];
  $file_upload = $_POST['file_upload'];


    // Use prepared statements to insert data
    $stmt = $conn->prepare("INSERT INTO wedding (name, email, phone,event_date, message, file_upload) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email,$phone, $event_date, $message,  $file_upload);

    if ($stmt->execute() === TRUE) {
                echo "your details sent.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, textarea, select {
            width: calc(100% - 20px); /* Adjust width here */
            padding: 8px; /* Adjust padding */
            margin: 5px 0 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        input[type="file"] {
            width: 100%;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #5b9dd9;
            box-shadow: 0 0 5px rgba(91, 157, 217, 0.5);
        }
        .form-group.radio-group {
            display: flex;
            justify-content: space-between;
        }
        .form-group.radio-group label {
            flex: 1;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        
<H2><U>Enquiry Form</U></h2>
        <form method="POST">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="event_date">Event Date:</label>
                <input type="date" id="event_date" name="event_date" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" placeholder="write regarding what purpose you are using like Custom Tailoring,Wedding Tailoring,Altering,etc,..."></textarea>
            </div>
            <div class="form-group">
                <label for="file_upload">Upload File:</label>
                <input type="file" id="file_upload" name="file_upload">
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>