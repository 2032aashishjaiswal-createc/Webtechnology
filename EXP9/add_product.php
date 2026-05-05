<!DOCTYPE html>
<html>
<head>
    <title>MyShop - Add Product</title>
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
            max-width: 600px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .success {
            color: green;
            padding: 10px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .error {
            color: red;
            padding: 10px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            margin-bottom: 20px;
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
    <h1>Add New Product</h1>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="products.php">View Products</a>
    <a href="add_product.php">Add Product</a>
    <a href="search.php">Search Products</a>
</nav>

<div class="container">
    <?php
    include 'config.php';
    
    $successMsg = "";
    $errorMsg = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $stock = $_POST['stock'];
        $image_url = $_POST['image_url'];
        
        // Validate inputs
        if (empty($name) || empty($price) || empty($category)) {
            $errorMsg = "Name, Price, and Category are required fields!";
        } else {
            $sql = "INSERT INTO products (name, description, price, category, stock, image_url) 
                    VALUES ('$name', '$description', '$price', '$category', '$stock', '$image_url')";
            
            if ($conn->query($sql) === TRUE) {
                $successMsg = "Product added successfully!";
                // Clear form
                $_POST = array();
            } else {
                $errorMsg = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    
    $conn->close();
    ?>
    
    <?php if ($successMsg): ?>
        <div class="success"><?php echo $successMsg; ?></div>
    <?php endif; ?>
    
    <?php if ($errorMsg): ?>
        <div class="error"><?php echo $errorMsg; ?></div>
    <?php endif; ?>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4"></textarea>
        </div>
        
        <div class="form-group">
            <label for="price">Price ($):</label>
            <input type="number" id="price" name="price" step="0.01" min="0" required>
        </div>
        
        <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required>
        </div>
        
        <div class="form-group">
            <label for="stock">Stock Quantity:</label>
            <input type="number" id="stock" name="stock" min="0" value="0">
        </div>
        
        <div class="form-group">
            <label for="image_url">Image URL:</label>
            <input type="text" id="image_url" name="image_url" value="https://via.placeholder.com/200">
        </div>
        
        <button type="submit">Add Product</button>
    </form>
</div>

<footer>
    <p>&copy; 2026 MyShop. All Rights Reserved.</p>
</footer>

</body>
</html>
