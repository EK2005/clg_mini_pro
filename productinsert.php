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

// Prepare SQL statement with placeholders
$stmt = $conn->prepare("INSERT INTO products (name, description, price, stock_quantity, size, image_url) VALUES (?, ?, ?, ?, ?, ?)");

// Check if the statement was prepared successfully
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Define product data to insert
$products = [
    ['Kurti1', 'Elegant cotton kurti', 500, 50, 's.l.m,xl,xxl', 'images/kurtis/kurti1.jpg'],
        ['Kurti2', 'Elegant cotton kurti', 800, 60, 's.l.m,xl,xxl', 'images/kurtis/kurti.jpg'],
    ['Kurti3', 'Elegant cotton kurti', 300, 50, 's.l.m,xl,xxl', 'images/kurtis/kurti3.jpg'],
    ['Kurti4', 'Elegant cotton kurti', 800, 50, 's.l.m,xl,xxl', 'images/kurtis/kurti4.jpg'],
    ['Kurti5', 'Elegant cotton kurti', 600, 50, 's.l.m,xl,xxl', 'images/kurtis/kurti5.jpg'],
    ['Kurti6', 'Elegant cotton kurti', 700, 50, 's.l.m,xl,xxl', 'images/kurtis/kurtii.jpg'],

['saree1', 'Elegant  saree', 500, 100, 'free', 'images/sarees/sareei.jpg'],
['saree2', 'Elegant  saree', 800, 650, 'free', 'images/sarees/saree8.jpeg'],
['saree3', 'Elegant  saree', 750, 350, 'free', 'images/sarees/sareesami.jpg'],
['saree4', 'Elegant saree', 300, 150, 'free', 'images/sarees/teacheriii.jpg'],
['saree5', 'Elegant  saree', 500, 450, 'free', 'images/sarees/saree6.jpg'],
['saree6', 'Elegant saree', 800, 150, 'free', 'images/sarees/sareeii.jpg'],
['saree7', 'Elegant saree', 800, 150, 'free', 'images/sarees/sareesamiijpg.jpg'],
['saree8', 'Elegant saree', 300, 150, 'free', 'images/sarees/saree7.webp'],
['saree9', 'Elegant saree', 200, 150, 'free', 'images/sarees/teacher4.webp'],

    ['jean1', 'jeans', 500, 50, 'free', 'images/jeans/jeani.jpg'],
    ['jean2', 'jeans', 300, 50, 'free', 'images/jeans/pantooo.webp'],
    ['jean3', 'jeans', 600, 50, 'free', 'images/jeans/jeaniii.jpg'],
    ['jean4', 'jeans', 800, 50, 'free', 'images/jeans/jeanii.jpg'],
    ['jean5', 'jeans', 400, 50, 'free', 'images/jeans/OIP (1).jpg'],
    ['jean6', 'jeans', 600, 50, 'free', 'images/jeans/OIP.jpg'],

    ['tshirt1', 'tshirt', 100, 50, 'free', 'images/tshirt/yellow.jpg'],
    ['tshirt2', 'tshirt', 300, 50, 'free', 'images/tshirt/tshirt6ii.jpg'],
    ['tshirt3', 'tshirt', 350, 50, 'free', 'images/tshirt/puma1.jpeg'],
    ['tshirt4', 'tshirt', 150, 50, 'free', 'images/tshirt/red.jpeg'],
    ['tshirt5', 'tshirt', 200, 50, 'free', 'images/tshirt/tshirt1.jpg'],
    ['tshirt6', 'tshirt', 150, 50, 'free', 'images/tshirt/tshirt4.jpg'],
    ['tshirt7', 'tshirt', 400, 50, 'free', 'images/tshirt/tshirt3.webp'],
    ['tshirt8', 'tshirt', 100, 50, 'free', 'images/tshirt/yellowdesigned.jpg'],
    ['tshirt9', 'tshirt', 300, 50, 'free', 'images/tshirt/tshirt2.jpeg'],


    ['corporate1', 'corporate wear', 1000,50, 'free', 'images/corporate/c1.jpg'],
    ['corporate2', 'corporate wear', 1200,50, 'free', 'images/corporate/c2.jpg'],
    ['corporate3', 'corporate wear', 1300,50, 'free', 'images/corporate/c3.jpg'],
    ['corporate4', 'corporate wear', 1400,50, 'free','images/corporate/c4.jpg'],
    ['teacher1', 'teacher wear', 800,50, 'free', 'images/teacher/t1.jpg'],
    ['teacher2', 'teacher wear', 1000,50, 'free', 'images/teacher/t2.jpg'],
    ['teacher3', 'teacher wear', 500,50, 'free', 'images/teacher/t2.webp'],
    ['teacher4', 'teacher wear', 800,50, 'free', 'images/teacher/t4.jpg'],
    ['fashion1', 'fashion design', 1000,50, 'free', 'images/artist/a1.jpg'],
    ['fashion2', 'fashion design', 1500,50, 'free', 'images/artist/a2.jpg'],
    ['fashion3', 'fashion design', 2000,50, 'free', 'images/artist/a3.jpg'],
    ['fashion4', 'fashion design', 1000,50, 'free', 'images/artist/a4.webp'],
    ['gym1', 'gym wear', 1500,50, 'free', 'images/gym/g1.jpg'],
    ['gym2', 'gym wear', 1000,50, 'free', 'images/gym/g2.jpg'],
    ['gym3', 'gym wear', 1800,50, 'free', 'images/gym/g3.jpg'],
    ['gym4', 'gym wear', 2000,50, 'free', 'images/gym/g4.jpg'],
    ['health1', 'healthcare wear',50, 'free', 300, 'images/health/h1.jpg'],
    ['health2', 'healthcare wear',50, 'free', 500, 'images/health/h2.jpg'],
    ['health3', 'healthcare wear',50, 'free', 500, 'images/health/h3.jpg'],
    ['health4', 'healthcare wear',50, 'free', 350, 'images/health/h4.jpg'],

    ['ethnic1', 'ethnic wear', 1000,50, 'free', 'images/ethnic/e4.jpg', '51'],
    ['ethnic2', 'ethnic wear', 2000,50, 'free', 'images/ethnic/e5.jpg', '52'],
    ['ethnic3', 'ethnic wear', 800,50, 'free', 'images/ethnic/e2.jpg', '53'],
    ['ethnic4', 'ethnic wear', 700, 50, 'free','images/ethnic/e1.jpg', '54'],
    ['ethnic5', 'ethnic wear', 1200, 50, 'free','images/ethnic/e6.jpg', '55'],
    ['ethnic6', 'ethnic wear', 1000,50, 'free', 'images/ethnic/e3.jpg', '56'],


    ['wedding1', 'wedding outfit', 3000, 50, 'free','images/wedding/w1.jpg', '57'],
    ['wedding2', 'wedding outfit', 2500, 50, 'free','images/wedding/w2.jpg', '58'],
    ['wedding3', 'wedding outfit', 3500,50, 'free', 'images/wedding/w3.jpg', '59'],
    ['wedding4', 'wedding outfit', 2500, 50, 'free','images/wedding/w4.webp', '60'],
    ['wedding5', 'wedding outfit', 3500, 50, 'free','images/wedding/w5.jpg', '61'],
    ['wedding6', 'wedding outfit', 3500, 50, 'free','images/wedding/w6.jpg', '62'],
    ['wedding7', 'wedding outfit', 3500, 50, 'free','images/wedding/w7.jpg', '63'],
    ['wedding8', 'wedding outfit', 4500, 50, 'free','images/wedding/w5.jpg', '64'],
    ['wedding9', 'wedding outfit', 3000, 50, 'free','images/wedding/w8.jpg', '65']

];

// Bind parameters and execute the statement for each product
foreach ($products as $product) {
    $stmt->bind_param("ssdiss", $product[0], $product[1], $product[2], $product[3], $product[4], $product[5]);
    
    if ($stmt->execute()) {
        echo "Product '" . $product[0] . "' added successfully!<br>";
    } else {
        echo "Error adding product '" . $product[0] . "': " . $stmt->error . "<br>";
    }
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
