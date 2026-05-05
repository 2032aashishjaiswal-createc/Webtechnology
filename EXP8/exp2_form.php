<!DOCTYPE html>
<html>
<head>
    <title>Checkout Form - MyShop (PHP)</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
            margin: 50px auto;
            padding: 20px;
        }
        fieldset {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        legend {
            font-weight: bold;
            padding: 0 10px;
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
        input[type="tel"],
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
            padding: 15px;
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
        .order-summary {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<nav>
    <a href="exp1_form.php">EXP1 Form</a> |
    <a href="exp2_form.php">EXP2 Form</a>
</nav>

<h1>Checkout - MyShop</h1>

<?php
// Initialize variables
$name = $email = $phone = $address = $payment = "";
$nameErr = $emailErr = $phoneErr = $addressErr = $paymentErr = "";
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
    
    // Validate phone
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
        $isValid = false;
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            $phoneErr = "Phone number must be 10 digits";
            $isValid = false;
        }
    }
    
    // Validate address
    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
        $isValid = false;
    } else {
        $address = test_input($_POST["address"]);
        if (strlen($address) < 10) {
            $addressErr = "Please enter a complete address";
            $isValid = false;
        }
    }
    
    // Validate payment method
    if (empty($_POST["payment"])) {
        $paymentErr = "Please select a payment method";
        $isValid = false;
    } else {
        $payment = test_input($_POST["payment"]);
    }
    
    // If all validations pass
    if ($isValid) {
        $orderNumber = "ORD" . date("YmdHis");
        $successMsg = "Order placed successfully! Order Number: $orderNumber<br>";
        $successMsg .= "Thank you, $name! Your order will be delivered to the address provided.";
        
        // Save order to file
        $file = fopen("orders.txt", "a");
        $data = "Order #$orderNumber | Date: " . date("Y-m-d H:i:s") . " | Name: $name | Email: $email | Phone: $phone | Address: $address | Payment: $payment\n";
        fwrite($file, $data);
        fclose($file);
        
        // Clear form
        $name = $email = $phone = $address = $payment = "";
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

<div class="order-summary">
    <h3>Order Summary</h3>
    <p>Wireless Headphones - $50 x 1 = $50</p>
    <p>Smart Watch - $80 x 1 = $80</p>
    <hr>
    <p><strong>Total: $130</strong></p>
</div>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <fieldset>
        <legend>Customer Information</legend>
        
        <div class="form-group">
            <label for="name">Full Name:</label>
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
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>">
            <?php if ($phoneErr): ?>
                <div class="error"><?php echo $phoneErr; ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="address">Delivery Address:</label>
            <textarea id="address" name="address" rows="4"><?php echo $address; ?></textarea>
            <?php if ($addressErr): ?>
                <div class="error"><?php echo $addressErr; ?></div>
            <?php endif; ?>
        </div>
    </fieldset>

    <fieldset>
        <legend>Payment Method</legend>
        
        <input type="radio" id="credit" name="payment" value="Credit Card" <?php if ($payment == "Credit Card") echo "checked"; ?>>
        <label for="credit" style="display:inline;">Credit Card</label><br>
        
        <input type="radio" id="debit" name="payment" value="Debit Card" <?php if ($payment == "Debit Card") echo "checked"; ?>>
        <label for="debit" style="display:inline;">Debit Card</label><br>
        
        <input type="radio" id="cod" name="payment" value="Cash on Delivery" <?php if ($payment == "Cash on Delivery") echo "checked"; ?>>
        <label for="cod" style="display:inline;">Cash on Delivery</label><br>
        
        <?php if ($paymentErr): ?>
            <div class="error"><?php echo $paymentErr; ?></div>
        <?php endif; ?>
    </fieldset>

    <button type="submit">Place Order</button>
</form>

<hr>
<h3>Recent Orders:</h3>
<?php
if (file_exists("orders.txt")) {
    $orders = file("orders.txt");
    echo "<ul>";
    foreach (array_reverse(array_slice($orders, -5)) as $order) {
        echo "<li>" . htmlspecialchars($order) . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No orders placed yet.</p>";
}
?>

</body>
</html>
