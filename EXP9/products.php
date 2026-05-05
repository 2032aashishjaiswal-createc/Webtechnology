<!DOCTYPE html>
<html>
<head>
    <title>MyShop - Products</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin: 2px;
        }
        .btn-edit {
            background-color: #2196F3;
            color: white;
        }
        .btn-delete {
            background-color: #f44336;
            color: white;
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
    <h1>All Products</h1>
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
    
    // Handle delete request
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $sql = "DELETE FROM products WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo '<div class="success">Product deleted successfully!</div>';
        } else {
            echo '<div class="error">Error: ' . $conn->error . '</div>';
        }
    }
    
    // Fetch all products
    $sql = "SELECT * FROM products ORDER BY id DESC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Name</th><th>Description</th><th>Price</th><th>Category</th><th>Stock</th><th>Actions</th></tr>';
        
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . htmlspecialchars($row['name']) . '</td>';
            echo '<td>' . htmlspecialchars($row['description']) . '</td>';
            echo '<td>$' . number_format($row['price'], 2) . '</td>';
            echo '<td>' . htmlspecialchars($row['category']) . '</td>';
            echo '<td>' . $row['stock'] . '</td>';
            echo '<td>';
            echo '<a href="edit_product.php?id=' . $row['id'] . '" class="btn btn-edit">Edit</a>';
            echo '<a href="products.php?delete=' . $row['id'] . '" class="btn btn-delete" onclick="return confirm(\'Are you sure?\')">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        echo '<p>No products found.</p>';
    }
    
    $conn->close();
    ?>
</div>

<footer>
    <p>&copy; 2026 MyShop. All Rights Reserved.</p>
</footer>

</body>
</html>
