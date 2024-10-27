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

// Function to calculate revenue
function calculate_revenue($conn, $interval) {
    $stmt = $conn->prepare("
        SELECT SUM(total_amount) as revenue 
        FROM orders 
        WHERE DATE(order_date) = CURDATE()
        OR (DATE(order_date) BETWEEN DATE_SUB(CURDATE(), INTERVAL ? DAY) AND CURDATE())");

    $stmt->bind_param("i", $interval);
    $stmt->execute();
    $stmt->bind_result($revenue);
    $stmt->fetch();
    $stmt->close();

    return $revenue ? $revenue : 0;
}

// Today's Revenue
$today_revenue = calculate_revenue($conn, 0);

// Weekly Revenue (last 7 days)
$weekly_revenue = calculate_revenue($conn, 7);

// Monthly Revenue (last 30 days)
$monthly_revenue = calculate_revenue($conn, 30);

// Annual Revenue (last 365 days)
$annual_revenue = calculate_revenue($conn, 365);

// Close connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revenue Report</title>
    <style>
        @media print {
            .report {
                width: 21cm; /* A4 width */
                height: 29.7cm; /* A4 height */
                margin: 0 auto;
            }
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .report {
            width: 100%;
            max-width: 21cm; /* A4 width */
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }
        .header, .footer {
            text-align: center;
            color: #495057;
        }
        .header h1 {
            font-size: 32px;
            margin: 0;
            color: #212529;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #868e96;
        }
        .report h2 {
            font-size: 26px;
            font-weight: bold;
            color: #212529;
            margin-bottom: 20px;
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 10px;
        }
        .report .revenue {
            font-size: 18px;
            color: #343a40;
            margin-bottom: 20px;
        }
        .report .revenue p {
            margin: 10px 0;
        }
        .report .revenue span {
            font-weight: bold;
            color: #000;
        }
        .button-container {
            margin-top: 20px;
            text-align: center;
        }
        .button-container button {
            padding: 12px 24px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .button-container button:hover {
            background-color: #0056b3;
        }
        /* Address and contact information */
        .address {
            margin: 10px 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="report">
        <div class="header">
            <h1>DREAMWORLD TEXTILES</h1>
            <div class="address">
                <p>No 14, Natesan Street, Vandalur, 600048</p>
                <p>Email: Dreamworldtexile@gmail.com | Phone: 6379206939</p>
            </div>
        </div>
        <h2>Revenue Report</h2>
        <div class="revenue">
            <p><span>Today's Revenue:</span> ₹<?php echo number_format($today_revenue, 2); ?></p>
            <p><span>This Week's Revenue:</span> ₹<?php echo number_format($weekly_revenue, 2); ?></p>
            <p><span>This Month's Revenue:</span> ₹<?php echo number_format($monthly_revenue, 2); ?></p>
            <p><span>This Year's Revenue:</span> ₹<?php echo number_format($annual_revenue, 2); ?></p>
        </div>
        <div class="footer">
            <p>Report generated on <?php echo date('d M Y'); ?></p>
        </div>
        <div class="button-container">
            <button onclick="window.location.href='selectorder.php'">View Order Details</button>
        </div>
    </div>
</body>
</html>

