<!DOCTYPE html>
<html>
<head>
    <title>Contact Form - Personal Website (PHP)</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
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
        input[type="email"],
        textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
        .success {
            color: green;
            font-size: 16px;
            padding: 10px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            margin-bottom: 20px;
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
    <a href="exp1_form.php">EXP1 Form</a> |
    <a href="exp2_form.php">EXP2 Form</a>
</nav>

<h1>Contact Me - Personal Website</h1>

<?php
// Initialize variables
$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = "";
$successMsg = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;
    
    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $isValid = false;
    } else {
        $name = test_input($_POST["name"]);
        if (strlen($name) < 3) {
            $nameErr = "Name must be at least 3 characters";
            $isValid = false;
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and spaces allowed";
            $isValid = false;
        }
    }
    
    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $isValid = false;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $isValid = false;
        }
    }
    
    // Validate message
    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
        $isValid = false;
    } else {
        $message = test_input($_POST["message"]);
        if (strlen($message) < 10) {
            $messageErr = "Message must be at least 10 characters";
            $isValid = false;
        }
    }
    
    // If all validations pass
    if ($isValid) {
        $successMsg = "Thank you, $name! Your message has been received. We will contact you at $email soon.";
        
        // Save to file (optional)
        $file = fopen("contacts.txt", "a");
        $data = date("Y-m-d H:i:s") . " | Name: $name | Email: $email | Message: $message\n";
        fwrite($file, $data);
        fclose($file);
        
        // Clear form
        $name = $email = $message = "";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<?php if ($successMsg): ?>
    <div class="success"><?php echo $successMsg; ?></div>
<?php endif; ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>">
        <?php if ($nameErr): ?>
            <div class="error"><?php echo $nameErr; ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>">
        <?php if ($emailErr): ?>
            <div class="error"><?php echo $emailErr; ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="5"><?php echo $message; ?></textarea>
        <?php if ($messageErr): ?>
            <div class="error"><?php echo $messageErr; ?></div>
        <?php endif; ?>
    </div>

    <button type="submit">Send Message</button>
</form>

<hr>
<h3>Submitted Contacts:</h3>
<?php
if (file_exists("contacts.txt")) {
    $contacts = file("contacts.txt");
    echo "<ul>";
    foreach (array_reverse($contacts) as $contact) {
        echo "<li>" . htmlspecialchars($contact) . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No contacts submitted yet.</p>";
}
?>

</body>
</html>
