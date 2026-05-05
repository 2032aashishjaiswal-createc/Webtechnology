<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>MyShop - Home (Sessions & Cookies)</title>
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
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .welcome-box {
            background-color: #f4f4f4;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .info-box {
            background-color: #e3f2fd;
            padding: 20px;
            border-left: 4px solid #2196F3;
            margin-top: 20px;
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
    <h1>MyShop - Sessions & Cookies Demo</h1>
    <p>Your One Stop Online Store</p>
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

<div class="container">
    <div class="welcome-box">
        <h2>Welcome to MyShop!</h2>
        <p>We offer high-quality products at affordable prices.</p>
        
        <?php
        // Check for returning visitor cookie
        if (isset($_COOKIE['last_visit'])) {
            echo '<p><strong>Welcome back!</strong> Your last visit was on: ' . $_COOKIE['last_visit'] . '</p>';
        } else {
            echo '<p><strong>Welcome, first-time visitor!</strong></p>';
        }
        
        // Set cookie for current visit
        setcookie('last_visit', date('Y-m-d H:i:s'), time() + (86400 * 30), "/"); // 30 days
        
        // Display session information
        if (isset($_SESSION['username'])) {
            echo '<p>You are logged in as: <strong>' . htmlspecialchars($_SESSION['username']) . '</strong></p>';
            echo '<p>Your email: <strong>' . htmlspecialchars($_SESSION['email']) . '</strong></p>';
        }
        ?>
    </div>
    
    <div class="info-box">
        <h3>Session & Cookie Information</h3>
        <ul>
            <li><strong>Session ID:</strong> <?php echo session_id(); ?></li>
            <li><strong>Session Status:</strong> <?php echo isset($_SESSION['username']) ? 'Active' : 'Not logged in'; ?></li>
            <li><strong>Cookies Set:</strong> 
                <?php 
                if (count($_COOKIE) > 0) {
                    echo count($_COOKIE) . ' cookies';
                } else {
                    echo 'No cookies';
                }
                ?>
            </li>
        </ul>
    </div>
</div>

<footer>
    <p>&copy; 2026 MyShop. All Rights Reserved.</p>
</footer>

</body>
</html>
