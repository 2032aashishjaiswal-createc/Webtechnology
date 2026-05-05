<!DOCTYPE html>
<html>
<head>
    <title>MyShop - Search Products</title>
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
        .search-box {
            margin: 20px 0;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 4px;
        }
        input[type="text"] {
            padding: 10px;
            width: 300px;
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
        }
        button:hover {
            background-color: #45a049;
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
    <h1>Search Products</h1>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="products.php">View Products</a>
    <a href="add_product.php">Add Product</a>
    <a href="search.php">Search Products</a>
</nav>

<div class="container">
    <div class="search-box">
        <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="query" placeholder="Search by name or category..." value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
            <button type="submit">Search</button>
        </form>
    </div>
    
    <?php
    include 'config.php';
    
    if (isset($_GET['query']) && !empty($_GET['query'])) {
        $query = $_GET['query'];
        
        $sql = "SELECT * FROM products WHERE name LIKE '%$query%' OR category LIKE '%$query%' OR description LIKE '%$query%'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            echo '<h3>Search Results for "' . htmlspecialchars($query) . '":</h3>';
            echo '<table>';
            echo '<tr><th>ID</th><th>Name</th><th>Description</th><th>Price</th><th>Category</th><th>Stock</th></tr>';
            
            while($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                echo '<td>' . htmlspecialchars($row['description']) . '</td>';
                echo '<td>$' . number_format($row['price'], 2) . '</td>';
                echo '<td>' . htmlspecialchars($row['category']) . '</td>';
                echo '<td>' . $row['stock'] . '</td>';
                echo '</tr>';
            }
            
            echo '</table>';
        } else {
            echo '<p>No products found matching "' . htmlspecialchars($query) . '"</p>';
        }
    } else {
        echo '<p>Enter a search term to find products.</p>';
    }
    
    $conn->close();
    ?>
</div>

<footer>
    <p>&copy; 2026 MyShop. All Rights Reserved.</p>
</footer>

</body>
</html>
