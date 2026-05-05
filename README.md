# Web Programming Lab Experiments

This repository contains all web programming lab experiments (EXP1 - EXP10) with complete implementations.

## Experiments Overview

### Experiment 1-5 (Already Completed)
- **EXP1**: Personal Website (Basic HTML)
- **EXP2**: E-Commerce Website (Semantic HTML5)
- **EXP3**: Personal Website with CSS
- **EXP4**: E-Commerce Website with CSS
- **EXP5**: Calculator with JavaScript

### Experiment 6: Registration & Login Forms with JavaScript Validation
**Location**: `EXP6/`

Features:
- Registration form with validation (username, email, phone, password)
- Login form with authentication
- Client-side validation using JavaScript
- LocalStorage for user data persistence
- SessionStorage for login state
- Shopping cart functionality

**Files**:
- `index.html` - Home page
- `register.html` - Registration form
- `login.html` - Login form
- `products.html` - Products page with cart
- `cart.html` - Shopping cart
- `contact.html` - Checkout form

**How to Run**:
1. Open `EXP6/index.html` in a web browser
2. Register a new account
3. Login with credentials
4. Browse products and add to cart

---

### Experiment 7: Event Handling Mechanisms
**Location**: `EXP7/`

Features:
- Click, Double Click events
- Mouse Over/Out events
- Key Press events
- Focus/Blur events
- Change events
- Submit events
- Load events
- Context Menu events
- Scroll and Resize events

**Files**:
- `exp1_events.html` - Event handling for Personal Website
- `exp2_events.html` - Event handling for MyShop

**How to Run**:
1. Open `EXP7/exp1_events.html` or `EXP7/exp2_events.html`
2. Interact with various elements to see event handling in action

---

### Experiment 8: PHP Form Handling and Validation
**Location**: `EXP8/`

Features:
- Server-side form validation using PHP
- Contact form (EXP1)
- Checkout form (EXP2)
- Data persistence to text files
- Error handling and success messages

**Files**:
- `exp1_form.php` - Contact form for Personal Website
- `exp2_form.php` - Checkout form for MyShop

**How to Run**:
1. Install PHP (XAMPP, WAMP, or MAMP)
2. Place files in web server directory (htdocs for XAMPP)
3. Start Apache server
4. Access via `http://localhost/EXP8/exp1_form.php`

---

### Experiment 9: PHP & MySQL Product Management
**Location**: `EXP9/`

Features:
- Create, Read, Update, Delete (CRUD) operations
- MySQL database integration
- Product management system
- Search functionality
- Automatic database and table creation

**Files**:
- `config.php` - Database configuration
- `index.php` - Home page
- `products.php` - View all products
- `add_product.php` - Add new product
- `edit_product.php` - Edit product
- `search.php` - Search products

**Database Setup**:
1. Install MySQL (comes with XAMPP/WAMP/MAMP)
2. Start MySQL server
3. The application will automatically:
   - Create database `myshop_db`
   - Create `products` table
   - Insert sample data

**How to Run**:
1. Install XAMPP/WAMP/MAMP
2. Start Apache and MySQL servers
3. Place files in htdocs directory
4. Access via `http://localhost/EXP9/index.php`
5. Database will be created automatically on first run

---

### Experiment 10: Sessions and Cookies
**Location**: `EXP10/`

Features:
- User registration and login
- Session management
- Cookie implementation (Remember Me, Last Visit, Page Views)
- Shopping cart using sessions
- User profile with session/cookie information
- Order management

**Files**:
- `index.php` - Home page
- `register.php` - User registration
- `login.php` - User login
- `logout.php` - Logout functionality
- `products.php` - Products listing
- `cart.php` - Shopping cart
- `checkout.php` - Order checkout
- `profile.php` - User profile

**How to Run**:
1. Install PHP (XAMPP/WAMP/MAMP)
2. Start Apache server
3. Access via `http://localhost/EXP10/index.php`
4. Register a new account
5. Login and explore features

**Session Features**:
- User authentication state
- Shopping cart data
- Login time tracking

**Cookie Features**:
- Remember Me functionality (30 days)
- Last visit tracking
- Page view counter

---

## Installation Guide

### For HTML/CSS/JavaScript Experiments (EXP1-7)
1. No installation required
2. Simply open the HTML files in any modern web browser

### For PHP Experiments (EXP8-10)

#### Windows:
1. Download and install [XAMPP](https://www.apachefriends.org/)
2. Start Apache (and MySQL for EXP9)
3. Copy experiment folders to `C:\xampp\htdocs\`
4. Access via `http://localhost/EXP8/` (or EXP9, EXP10)

#### Mac:
1. Download and install [MAMP](https://www.mamp.info/)
2. Start servers
3. Copy experiment folders to `/Applications/MAMP/htdocs/`
4. Access via `http://localhost:8888/EXP8/`

#### Linux:
```bash
# Install Apache and PHP
sudo apt-get update
sudo apt-get install apache2 php libapache2-mod-php

# For MySQL (EXP9)
sudo apt-get install mysql-server php-mysql

# Copy files to web directory
sudo cp -r EXP8 /var/www/html/
sudo cp -r EXP9 /var/www/html/
sudo cp -r EXP10 /var/www/html/

# Set permissions
sudo chmod -R 755 /var/www/html/
```

---

## Testing Guide

### Experiment 6 (JavaScript Validation)
1. Try registering with invalid data to see validation
2. Register a valid user
3. Login with correct credentials
4. Add products to cart
5. Proceed to checkout

### Experiment 7 (Event Handling)
1. Click buttons to see click events
2. Hover over elements for mouse events
3. Type in input fields for keyboard events
4. Submit forms to see form events

### Experiment 8 (PHP Forms)
1. Submit empty forms to see validation errors
2. Submit with invalid data (wrong email format, short names)
3. Submit valid data to see success messages
4. Check generated text files for stored data

### Experiment 9 (PHP & MySQL)
1. View all products
2. Add new products
3. Edit existing products
4. Delete products
5. Search for products by name or category

### Experiment 10 (Sessions & Cookies)
1. Register and login
2. Check "Remember Me" and logout
3. Close browser and reopen - should remember username
4. Add items to cart
5. View profile to see session/cookie information
6. Complete checkout process

---

## File Structure

```
.
├── index.html              # Main landing page
├── README.md              # This file
├── EXP1/                  # Personal Website (HTML)
├── EXP2/                  # E-Commerce (HTML)
├── EXP3/                  # Personal Website (CSS)
├── EXP4/                  # E-Commerce (CSS)
├── EXP5/                  # Calculator (JavaScript)
├── EXP6/                  # Registration & Login (JavaScript)
│   ├── index.html
│   ├── register.html
│   ├── login.html
│   ├── products.html
│   ├── cart.html
│   └── contact.html
├── EXP7/                  # Event Handling
│   ├── exp1_events.html
│   └── exp2_events.html
├── EXP8/                  # PHP Form Handling
│   ├── exp1_form.php
│   └── exp2_form.php
├── EXP9/                  # PHP & MySQL
│   ├── config.php
│   ├── index.php
│   ├── products.php
│   ├── add_product.php
│   ├── edit_product.php
│   └── search.php
└── EXP10/                 # Sessions & Cookies
    ├── index.php
    ├── register.php
    ├── login.php
    ├── logout.php
    ├── products.php
    ├── cart.php
    ├── checkout.php
    └── profile.php
```

---

## Technologies Used

- **HTML5**: Semantic markup
- **CSS3**: Styling and layouts
- **JavaScript**: Client-side validation and interactivity
- **PHP**: Server-side processing
- **MySQL**: Database management
- **Sessions**: User state management
- **Cookies**: Persistent data storage

---

## Notes

1. **Security**: These are educational examples. For production use:
   - Hash passwords (use `password_hash()` in PHP)
   - Use prepared statements for SQL queries
   - Implement CSRF protection
   - Validate and sanitize all inputs

2. **Browser Compatibility**: Tested on modern browsers (Chrome, Firefox, Edge)

3. **PHP Version**: Requires PHP 7.0 or higher

4. **MySQL**: EXP9 requires MySQL 5.6 or higher

---

## Troubleshooting

### PHP files download instead of executing
- Ensure Apache is running
- Check that PHP module is enabled
- Verify files have `.php` extension

### MySQL connection errors
- Ensure MySQL server is running
- Check credentials in `config.php`
- Verify MySQL port (default: 3306)

### Session not working
- Check PHP session configuration
- Ensure cookies are enabled in browser
- Verify write permissions on session directory

---

## Author

Web Programming Lab - 2026

## License

Educational use only
