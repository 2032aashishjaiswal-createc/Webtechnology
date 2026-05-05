<?php
session_start();

// Track page views with cookies
$pageViews = isset($_COOKIE['page_views']) ? (int)$_COOKIE['page_views'] + 1 : 1;
setcookie('page_views', $pageViews, time() + (86400 * 30), "/");
?>
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
        .user-info {
            float: right;
            color: white;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .product-card {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }
        .product-card img {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .product-card button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        .product-card button:hover {
            background-color: #45a049;
        }
        .stats {
            background-color: #fff3cd;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            text-align: center;
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
    <h1>Our Products</h1>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="products.php">Products</a>
    <a href="cart.php">Cart</a>
    <a href="profile.php">Profile</a>
    <div class="user-info">
        <?php
        if (isset($_SESSION['username'])) {
            echo 'Welcome, ' . htmlspecialchars($_SESSION['username']) . ' | ';
            echo '<a href="logout.php" style="color: white;">Logout</a>';
        } else {
            echo '<a href="login.php" style="color: white;">Login</a> | ';
            echo '<a href="register.php" style="color: white;">Register</a>';
        }
        ?>
    </div>
</nav>

<div class="stats">
    <strong>Page Views:</strong> <?php echo $pageViews; ?> | 
    <strong>Cart Items:</strong> <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
</div>

<main>
    <div class="product-grid">
        <article class="product-card">
            <figure>
                <img src="https://via.placeholder.com/200" alt="Wireless Headphones">
                <figcaption><strong>Wireless Headphones</strong></figcaption>
            </figure>
            <p>High-quality sound and long battery life.</p>
            <p><strong>Price: $50</strong></p>
            <form method="post" action="cart.php">
                <input type="hidden" name="product_id" value="1">
                <input type="hidden" name="product_name" value="Wireless Headphones">
                <input type="hidden" name="product_price" value="50">
                <button type="submit" name="add_to_cart">Add to Cart</button>
            </form>
        </article>

        <article class="product-card">
            <figure>
                <img src="https://via.placeholder.com/200" alt="Smart Watch">
                <figcaption><strong>Smart Watch</strong></figcaption>
            </figure>
            <p>Track your fitness and notifications easily.</p>
            <p><strong>Price: $80</strong></p>
            <form method="post" action="cart.php">
                <input type="hidden" name="product_id" value="2">
                <input type="hidden" name="product_name" value="Smart Watch">
                <input type="hidden" name="product_price" value="80">
                <button type="submit" name="add_to_cart">Add to Cart</button>
            </form>
        </article>

        <article class="product-card">
            <figure>
                <img src="https://via.placeholder.com/200" alt="Bluetooth Speaker">
                <figcaption><strong>Bluetooth Speaker</strong></figcaption>
            </figure>
            <p>Portable speaker with amazing sound quality.</p>
            <p><strong>Price: $35</strong></p>
            <form method="post" action="cart.php">
                <input type="hidden" name="product_id" value="3">
                <input type="hidden" name="product_name" value="Bluetooth Speaker">
                <input type="hidden" name="product_price" value="35">
                <button type="submit" name="add_to_cart">Add to Cart</button>
            </form>
        </article>

        <article class="product-card">
            <figure>
                <img src="https://via.placeholder.com/200" alt="Laptop Stand">
                <figcaption><strong>Laptop Stand</strong></figcaption>
            </figure>
            <p>Ergonomic stand for better posture.</p>
            <p><strong>Price: $25</strong></p>
            <form method="post" action="cart.php">
                <input type="hidden" name="product_id" value="4">
                <input type="hidden" name="product_name" value="Laptop Stand">
                <input type="hidden" name="product_price" value="25">
                <button type="submit" name="add_to_cart">Add to Cart</button>
            </form>
        </article>
    </div>
</main>

<footer>
    <p>&copy; 2026 MyShop</p>
</footer>

</body>
</html>
