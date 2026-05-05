<!DOCTYPE html>
<html>
<head>
    <title>MyShop - Edit Product</title>
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
    <h1>Edit Product</h1>
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
    $id = $_GET['id'];
    
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $stock = $_POST['stock'];
        $image_url = $_POST['image_url'];
        
        $sql = "UPDATE products SET 
                name='$name', 
                description='$description', 
                price='$price', 
                category='$category', 
                stock='$stock', 
                image_url='$image_url' 
                WHERE id=$id";
        
        if ($conn->query($sql) === TRUE) {
            $successMsg = "Product updated successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    
    // Fetch product details
    $sql = "SELECT * FROM products WHERE id=$id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
    
    $conn->close();
    ?>
    
    <?php if ($successMsg): ?>
        <div class="success"><?php echo $successMsg; ?></div>
    <?php endif; ?>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>">
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4"><?php echo htmlspecialchars($product['description']); ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="price">Price ($):</label>
            <input type="number" id="price" name="price" step="0.01" min="0" value="<?php echo $product['price']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($product['category']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="stock">Stock Quantity:</label>
            <input type="number" id="stock" name="stock" min="0" value="<?php echo $product['stock']; ?>">
        </div>
        
        <div class="form-group">
            <label for="image_url">Image URL:</label>
            <input type="text" id="image_url" name="image_url" value="<?php echo htmlspecialchars($product['image_url']); ?>">
        </div>
        
        <button type="submit">Update Product</button>
    </form>
</div>

<footer>
    <p>&copy; 2026 MyShop. All Rights Reserved.</p>
</footer>

</body>
</html>
