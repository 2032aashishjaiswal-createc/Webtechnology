<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Load user data
$userFile = "users/" . $_SESSION['username'] . ".txt";
$userData = json_decode(file_get_contents($userFile), true);

// Calculate session duration
$sessionDuration = time() - $_SESSION['login_time'];
$minutes = floor($sessionDuration / 60);
$seconds = $sessionDuration % 60;
?>
<!DOCTYPE html>
<html>
<head>
    <title>MyShop - User Profile</title>
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
            max-width: 800px;
            margin: 0 auto;
        }
        .profile-box {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .info-row {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .label {
            font-weight: bold;
            display: inline-block;
            width: 200px;
        }
        .session-box {
            background-color: #e3f2fd;
            padding: 20px;
            border-left: 4px solid #2196F3;
            margin-top: 20px;
        }
        .cookie-box {
            background-color: #fff3cd;
            padding: 20px;
            border-left: 4px solid #ffc107;
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
    <h1>User Profile</h1>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="products.php">Products</a>
    <a href="cart.php">Cart</a>
    <a href="profile.php">Profile</a>
    <div class="user-info">
        <?php
        echo 'Welcome, ' . htmlspecialchars($_SESSION['username']) . ' | ';
        echo '<a href="logout.php" style="color: white;">Logout</a>';
        ?>
    </div>
</nav>

<div class="container">
    <div class="profile-box">
        <h2>Profile Information</h2>
        <div class="info-row">
            <span class="label">Username:</span>
            <span><?php echo htmlspecialchars($userData['username']); ?></span>
        </div>
        <div class="info-row">
            <span class="label">Email:</span>
            <span><?php echo htmlspecialchars($userData['email']); ?></span>
        </div>
        <div class="info-row">
            <span class="label">Registered At:</span>
            <span><?php echo $userData['registered_at']; ?></span>
        </div>
    </div>
    
    <div class="session-box">
        <h3>Session Information</h3>
        <div class="info-row">
            <span class="label">Session ID:</span>
            <span><?php echo session_id(); ?></span>
        </div>
        <div class="info-row">
            <span class="label">Login Time:</span>
            <span><?php echo date('Y-m-d H:i:s', $_SESSION['login_time']); ?></span>
        </div>
        <div class="info-row">
            <span class="label">Session Duration:</span>
            <span><?php echo $minutes; ?> minutes <?php echo $seconds; ?> seconds</span>
        </div>
        <div class="info-row">
            <span class="label">Cart Items:</span>
            <span><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span>
        </div>
    </div>
    
    <div class="cookie-box">
        <h3>Cookie Information</h3>
        <div class="info-row">
            <span class="label">Remember Me:</span>
            <span><?php echo isset($_COOKIE['remember']) ? 'Yes' : 'No'; ?></span>
        </div>
        <div class="info-row">
            <span class="label">Last Visit:</span>
            <span><?php echo isset($_COOKIE['last_visit']) ? $_COOKIE['last_visit'] : 'N/A'; ?></span>
        </div>
        <div class="info-row">
            <span class="label">Page Views:</span>
            <span><?php echo isset($_COOKIE['page_views']) ? $_COOKIE['page_views'] : 0; ?></span>
        </div>
        <div class="info-row">
            <span class="label">Total Cookies:</span>
            <span><?php echo count($_COOKIE); ?></span>
        </div>
    </div>
</div>

<footer>
    <p>&copy; 2026 MyShop</p>
</footer>

</body>
</html>
