<?php
session_start();

// Redirect if cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Calculate total
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}

$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process order
    $orderNumber = "ORD" . date("YmdHis");
    
    // Save order to file
    if (!file_exists('orders')) {
        mkdir('orders', 0777, true);
    }
    
    $orderData = array(
        'order_number' => $orderNumber,
        'username' => $_SESSION['username'],
        'items' => $_SESSION['cart'],
        'total' => $total,
        'date' => date('Y-m-d H:i:s')
    );
    
    file_put_contents("orders/" . $orderNumber . ".txt", json_encode($orderData));
    
    // Clear cart
    $_SESSION['cart'] = array();
    
    $success = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>MyShop - Checkout</title>
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
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .success {
            color: green;
            padding: 20px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
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
    <h1>Checkout</h1>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="products.php">Products</a>
    <a href="cart.php">Cart</a>
    <a href="profile.php">Profile</a>
</nav>

<div class="container">
    <?php if ($success): ?>
        <div class="success">
            <h2>Order Placed Successfully!</h2>
            <p>Your order number is: <strong><?php echo $orderNumber; ?></strong></p>
            <p>Thank you for shopping with us!</p>
            <a href="products.php">Continue Shopping</a>
        </div>
    <?php else: ?>
        <h2>Order Summary</h2>
        <table>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td>$<?php echo number_format($item['price'], 2); ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3" style="text-align: right;"><strong>Grand Total:</strong></td>
                <td><strong>$<?php echo number_format($total, 2); ?></strong></td>
            </tr>
        </table>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <button type="submit">Confirm Order</button>
        </form>
    <?php endif; ?>
</div>

<footer>
    <p>&copy; 2026 MyShop</p>
</footer>

</body>
</html>
