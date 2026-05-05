<?php
session_start();

// Redirect if already logged in
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);
    
    // Simple validation (in real app, check against database)
    if (!empty($username) && !empty($password)) {
        // Check if user exists in our simple file storage
        $userFile = "users/" . $username . ".txt";
        
        if (file_exists($userFile)) {
            $userData = file_get_contents($userFile);
            $user = json_decode($userData, true);
            
            if ($user['password'] === $password) {
                // Set session variables
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $user['email'];
                $_SESSION['login_time'] = time();
                
                // Set cookie if "Remember Me" is checked
                if ($remember) {
                    setcookie('username', $username, time() + (86400 * 30), "/"); // 30 days
                    setcookie('remember', 'yes', time() + (86400 * 30), "/");
                }
                
                header("Location: index.php");
                exit();
            } else {
                $error = "Invalid username or password";
            }
        } else {
            $error = "User not found. Please register first.";
        }
    } else {
        $error = "Please fill in all fields";
    }
}

// Check for remember me cookie
$rememberedUsername = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>MyShop - Login</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
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
        input[type="password"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .error {
            color: red;
            padding: 10px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
        nav {
            margin-bottom: 20px;
        }
        nav a {
            margin-right: 10px;
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>

<nav>
    <a href="index.php">Home</a> |
    <a href="products.php">Products</a> |
    <a href="login.php">Login</a> |
    <a href="register.php">Register</a>
</nav>

<h1>Login</h1>

<?php if ($error): ?>
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($rememberedUsername); ?>" required>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>

    <div class="form-group">
        <input type="checkbox" id="remember" name="remember" <?php echo isset($_COOKIE['remember']) ? 'checked' : ''; ?>>
        <label for="remember" style="display:inline;">Remember Me</label>
    </div>

    <button type="submit">Login</button>
</form>

<p>Don't have an account? <a href="register.php">Register here</a></p>

</body>
</html>
