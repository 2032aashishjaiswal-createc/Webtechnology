<?php
session_start();

// Clear session variables
$_SESSION = array();

// Destroy session
session_destroy();

// Clear remember me cookie if exists
if (isset($_COOKIE['remember'])) {
    setcookie('remember', '', time() - 3600, "/");
    setcookie('username', '', time() - 3600, "/");
}

// Redirect to home page
header("Location: index.php");
exit();
?>
