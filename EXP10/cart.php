<?php
session_start();

// Initialize cart if not exists
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Handle add to cart
if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    
    // Check if product already in cart
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity']++;
    } else {
        $_SESSION['cart'][$productId] = array(
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => 1
        );
    }
    
    // Store cart count in cookie
    setcookie('cart_count', count($_SESSION['cart']), time() + (86400 * 30), "/");
}

// Handle remove from cart
if (isset($_GET['remove'])) {
    $productId = $_GET['remove'];
    unset($_SESSION['cart'][$productId]);
}

// Handle clear cart
if (isset($_GET['clear'])) {
    $_SESSION['cart'] = array();
}

// Calculate total
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>MyShop - Shopping Cart</title>
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
        main {
            max-width: 1000px;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
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
        .total-section {
            text-align: right;
            font-size: 20px;
            font-weight: bold;
            margin: 20px 0;
        }
        .btn {
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin: 5px;
        }
        .btn-primary {
            background-color: #4CAF50;
            color: white;
        }
        .btn-danger {
            background-color: #f44336;
            color: white;
        }
        .empty-cart {
            text-align: center;
            padding: 40px;
            font-size: 18px;
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
    <h1>Your Shopping Cart</h1>
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

<main>
    <?php if (empty($_SESSION['cart'])): ?>
        <div class="empty-cart">
            Your cart is empty. <a href="products.php">Continue Shopping</a>
        </div>
    <?php else: ?>
        <table>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            <?php foreach ($_SESSION['cart'] as $id => $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td>$<?php echo number_format($item['price'], 2); ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                    <td><a href="cart.php?remove=<?php echo $id; ?>" class="btn btn-danger">Remove</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        
        <div class="total-section">
            Grand Total: $<?php echo number_format($total, 2); ?>
        </div>
        
        <div style="text-align: right;">
            <a href="cart.php?clear=1" class="btn btn-danger" onclick="return confirm('Clear entire cart?')">Clear Cart</a>
            <a href="products.php" class="btn btn-primary">Continue Shopping</a>
            <a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>
        </div>
    <?php endif; ?>
</main>

<footer>
    <p>&copy; 2026 MyShop</p>
</footer>

</body>
</html>
