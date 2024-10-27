<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .container {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        header {
            background-color: #007bff;
            color: white;
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 1.8rem;
        }

        header button {
            padding: 0.5rem 1rem;
            background-color: #ff6b6b;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 1rem;
        }

        nav {
            background-color: #343a40;
            padding: 1rem;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-around;
        }

        nav ul li {
            margin-right: 1rem;
        }

        nav ul li a {
            color: white;
            font-size: 1rem;
            text-decoration: none;
            padding: 0.7rem 1rem;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #495057;
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
            background-color: white;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #f1f1f1;
            color: #333;
        }

        .btn {
            background-color: #28a745;
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
            background-color: #218838;
        }

        .section-heading {
            font-size: 1.6rem;
            margin-bottom: 20px;
            color: #007bff;
        }

        .card {
            background-color: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .btn-logout {
            background-color: #dc3545;
        }

        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                text-align: center;
            }

            header, nav, main {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .form-control {
                font-size: 1rem;
            }

            header h1 {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Admin Dashboard</h1>
            <button id="logout" class="btn-logout">Logout</button>
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
            <!-- Report Section -->
            <section id="report">
                <h2 class="section-heading">Reports</h2>
                 <button onclick="window.location.href='report_customer.php'">Customer Report</button>
    <button onclick="window.location.href='report_sales.php'">Sales Report</button>
    <button onclick="window.location.href='report_revenue.php'">Revenue Report</button>

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
                <h2 class="section-heading">Order Details</h2>
                <div class="card">
                    <p>Click here to view order details.</p>
                    <a href="selectorder.php" class="btn">View Orders</a>
                </div>
            </section>

            <!-- Edit Product Section -->
            <section id="edit_product">
                <h2 class="section-heading">Edit Product</h2>
                <div class="card">
                    <p>Click here to edit product details.</p>
                    <a href="productselect.php" class="btn">Edit Product</a>
                </div>
            </section>

            <!-- Product Details Section -->
            <section id="product-details">
                <h2 class="section-heading">Add Product</h2>
                <div class="card">
                    <form id="addProductForm" style="margin-top: 20px;">
                        <label for="product_name">Product Name:</label>
                        <input type="text" id="product_name" class="form-control" required>

                        <label for="product_price">Product Price:</label>
                        <input type="number" id="product_price" class="form-control" required>

                        <label for="product_image">Product Image:</label>
                        <input type="file" id="product_image" class="form-control" required>

                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" class="form-control" required>

                        <label for="size">Enter Sizes:</label>
                        <input type="text" id="size" class="form-control" required>

                        <label for="dress-type">Select Dress Type:</label>
                        <select id="dress-type" class="form-control" required>
                            <option value="">--Select Dress Type--</option>
                            <option value="saree">Saree</option>
                            <option value="kurti">Kurti</option>
                            <option value="jeans">Jeans</option>
                            <option value="tops">Tops</option>
                            <option value="profession">Professional Wear</option>
                            <option value="ethnic">Ethnic Wear</option>
                            <option value="western">Western Wear</option>
                            <option value="sports">Sports Wear</option>
                        </select>

                        <button type="submit" class="btn">Add Product</button>
                    </form>
                </div>
            </section>

            <!-- Supplier Details Section -->
            <section id="supplier-details">
                <h2 class="section-heading">Supplier Details</h2>
                <div class="card">
                    <p>Click here to view supplier details.</p>
                    <a href="supplierselect.php" class="btn">View Suppliers</a>
                </div>
            </section>

            <!-- Tailoring Info Section -->
            <section id="custom-details">
                <h2 class="section-heading">Tailoring Information</h2>
                <div class="card">
                    <p>Click here for tailoring customization information.</p>
                    <a href="weddingselect.php" class="btn">View Tailoring Info</a>
                </div>
            </section>
        </main>
    </div>
    
    <script>
        // Function to navigate through sections
        document.querySelectorAll('nav ul li a').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const targetSection = document.querySelector(this.getAttribute('href'));
                
                document.querySelectorAll('main section').forEach(section => {
                    section.classList.remove('active');
                });
                targetSection.classList.add('active');
            });
        });

        // Logout event handler
        document.getElementById('logout').addEventListener('click', function() {
            alert('Logging out...');
            window.location.href = 'login.html';
        });
    </script>
</body>
</html>
