<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
  background-color:sandyBrown;
        }

        .container {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        header {
            background-color:midnightBlue;
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav {
            background-color: black;
            padding: 1rem;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-right: 1rem;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        main {
            flex-grow: 1;
            padding: 2rem;
            overflow-y: auto;
        }

        section {
            display: none;
        }

        section.active {
            display: block;
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
        }

   .card {
            background-color: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
 .btn {
            background-color: midnightBlue;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 10px;
   text-decoration: none; /* Ensure no underline */
        }

        .btn:hover {
            background-color:black;
        }


    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome, Admin</h1>
            <button class="btn" id="logout">Logout</button>
        </header>
        <nav>
            <ul>
                          <li><a href="#user-details"><i class="fas fa-users"></i> User Details</a></li>
                <li><a href="#order-details"><i class="fas fa-shopping-cart"></i> Order Details</a></li>
                <li><a href="#product-details"><i class="fas fa-box-open"></i> Add Product</a></li>
                <li><a href="#edit_product"><i class="fas fa-edit"></i> Edit Product</a></li>
                <li><a href="#supplier-details"><i class="fas fa-truck"></i> Supplier Details</a></li>
                <li><a href="#custom-details"><i class="fas fa-cut"></i> Tailoring Info</a></li>
                <li><a href="#report"><i class="fas fa-chart-bar"></i> Reports</a></li>
            </ul>
        </nav>
        <main>

<section id="report">
    <h2>Reports</h2>

    <button onclick="window.location.href='report_customer.php'" class="btn">Customer Report</button>
    <button onclick="window.location.href='report_sales.php'"  class="btn" >Sales Report</button>
    <button onclick="window.location.href='report_revenue.php'" class="btn">Revenue Report</button>

</section>







            <!-- User Details Section -->
            <section id="user-details">
                     <h2 class="section-heading">User Details</h2>
                <div class="card">
                    <p>Click here to view user details.</p>
                    <a href="selectuser.php" class="btn">View Users</a>
                </div>
            </section>

            <!-- Order Details Section -->
            <section id="order-details">
               <div class="card">
                    <p>Click here to view order details.</p>
                    <a href="selectorder.php" class="btn">View Orders</a>
                </div>

            </section>

            <section id="edit_product">
              <div class="card">
                    <p>Click here to edit product details.</p>
                    <a href="productselect.php" class="btn">Edit Product</a>
                </div>
            </section>

    <!-- Product Details Section -->
<section id="product-details" class="active">
   <div class="card">
    <div id="addProductForm" style="margin-top: 20px;">
<center> <h2>Add Product </h2>
        <form action="add_product.php" method="POST" enctype="multipart/form-data">
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" required><br><br>

            <label for="product_price">Product Price:</label>
            <input type="number" id="product_price" name="product_price" required><br><br>

            <label for="product_image">Product Image:</label>
            <input type="file" id="product_image" name="product_image" accept="image/*" required><br><br>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required><br><br>

            <label for="size">Enter Sizes:</label>
            <input type="text" id="size" name="size" required><br><br>

            <label for="dress-type">Select Dress Type:</label>
            <select name="dress-type" id="dress-type" required>
                <option value="">--Select Dress Type--</option>
                <option value="saree">Saree</option>
                <option value="kurti">Kurti</option>
                <option value="jeans">Jeans</option>
                <option value="tops">Tops</option>
                <option value="profession">profession wear</option>
                <option value="ethnic">Ethnic Wear</option>
                <option value="western">western Wear</option>
                <option value="sports">sports Wear</option>
            </select><br><br>


            <input type="submit" class="btn" value="Add Product">
        </form></center></div>
    </div>
</section>


            <!-- Supplier Details Section -->
            <section id="supplier-details">
                <h2>Supplier Details</h2>
         <div class="card">
                    <p>Click here to view supplier details.</p>
                    <a href="supplierselect.php" class="btn">View Suppliers</a>
                </div>

            </section>

            <!-- Custom Tailoring Section -->
            <section id="custom-details">
                <h2>Tailoring info</h2>
 <div class="card">
                    <p>Click here for tailoring customization information.</p>
                    <a href="weddingselect.php" class="btn">View Tailoring Info</a>
                </div>

            </section>

         
        </main>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const links = document.querySelectorAll("nav ul li a");
            const sections = document.querySelectorAll("section");

            links.forEach(link => {
                link.addEventListener("click", function(e) {
                    e.preventDefault();
                    const targetId = link.getAttribute("href").substring(1);
                    sections.forEach(section => {
                        if (section.id === targetId) {
                            section.classList.add("active");
                        } else {
                            section.classList.remove("active");
                        }
                    });
                });
            });

            document.getElementById("logout").addEventListener("click", function() {
                alert("Logged out successfully!");
                window.location.href = "login.php"; // Redirect to login page
            });
        });
    </script>
</body>
</html>
