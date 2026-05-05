<!DOCTYPE html>
<html>
<head>
    <title>MyShop - Product Management</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
        }
        nav {
            background-color: #333;
            padding: 10px;
            margin-bottom: 20px;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            margin-right: 5px;
        }
        nav a:hover {
            background-color: #555;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin: 10px 0;
        }
        .btn:hover {
            background-color: #45a049;
        }
        footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>

<header>
    <h1>MyShop - Product Management System</h1>
    <p>PHP & MySQL Integration</p>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="products.php">View Products</a>
    <a href="add_product.php">Add Product</a>
    <a href="search.php">Search Products</a>
</nav>

<div class="container">
    <h2>Welcome to MyShop Product Management</h2>
    <p>This system allows you to:</p>
    <ul>
        <li>Create new products</li>
        <li>View all products</li>
        <li>Update product details</li>
        <li>Delete products</li>
        <li>Search products by name or category</li>
    </ul>
    
    <a href="products.php" class="btn">View All Products</a>
    <a href="add_product.php" class="btn">Add New Product</a>
</div>

<footer>
    <p>&copy; 2026 MyShop. All Rights Reserved.</p>
</footer>

</body>
</html>
