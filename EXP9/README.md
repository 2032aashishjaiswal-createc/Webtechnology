# Experiment 9: PHP & MySQL Product Management System

## Overview
Complete CRUD (Create, Read, Update, Delete) application for managing products using PHP and MySQL.

## Features
- ✅ Automatic database and table creation
- ✅ Add new products
- ✅ View all products
- ✅ Edit existing products
- ✅ Delete products
- ✅ Search products by name, category, or description
- ✅ Sample data auto-insertion

## Database Schema

### Database: `myshop_db`

### Table: `products`
```sql
CREATE TABLE products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(50),
    stock INT(6) DEFAULT 0,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## Installation Steps

### Method 1: Automatic Setup (Recommended)
1. Install XAMPP/WAMP/MAMP
2. Start Apache and MySQL servers
3. Place EXP9 folder in htdocs directory
4. Open browser and navigate to `http://localhost/EXP9/index.php`
5. Database will be created automatically!

### Method 2: Manual Setup
If you prefer to create the database manually:

1. Open phpMyAdmin (`http://localhost/phpmyadmin`)
2. Create new database: `myshop_db`
3. Run the following SQL:

```sql
CREATE DATABASE IF NOT EXISTS myshop_db;
USE myshop_db;

CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(50),
    stock INT(6) DEFAULT 0,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data
INSERT INTO products (name, description, price, category, stock, image_url) VALUES
('Wireless Headphones', 'High-quality sound and long battery life', 50.00, 'Electronics', 25, 'https://via.placeholder.com/200'),
('Smart Watch', 'Track your fitness and notifications easily', 80.00, 'Electronics', 15, 'https://via.placeholder.com/200'),
('Bluetooth Speaker', 'Portable speaker with amazing sound quality', 35.00, 'Electronics', 30, 'https://via.placeholder.com/200'),
('Laptop Stand', 'Ergonomic stand for better posture', 25.00, 'Accessories', 40, 'https://via.placeholder.com/200'),
('USB-C Cable', 'Fast charging and data transfer', 12.00, 'Accessories', 100, 'https://via.placeholder.com/200'),
('Wireless Mouse', 'Comfortable and precise wireless mouse', 28.00, 'Electronics', 50, 'https://via.placeholder.com/200');
```

## Configuration

### Database Connection Settings
Edit `config.php` if needed:

```php
$servername = "localhost";  // Usually localhost
$username = "root";         // Default MySQL username
$password = "";             // Default is empty for XAMPP
$dbname = "myshop_db";      // Database name
```

## File Descriptions

| File | Purpose |
|------|---------|
| `config.php` | Database connection and setup |
| `index.php` | Home page with navigation |
| `products.php` | Display all products in table format |
| `add_product.php` | Form to add new products |
| `edit_product.php` | Form to edit existing products |
| `search.php` | Search products by keyword |

## Usage Guide

### Adding a Product
1. Navigate to "Add Product"
2. Fill in the form:
   - Product Name (required)
   - Description (optional)
   - Price (required)
   - Category (required)
   - Stock Quantity
   - Image URL
3. Click "Add Product"

### Viewing Products
1. Navigate to "View Products"
2. See all products in a table
3. Use Edit/Delete buttons for each product

### Editing a Product
1. Click "Edit" button on any product
2. Modify the fields
3. Click "Update Product"

### Deleting a Product
1. Click "Delete" button on any product
2. Confirm deletion in the popup
3. Product will be removed from database

### Searching Products
1. Navigate to "Search Products"
2. Enter search term (searches in name, category, and description)
3. Click "Search"
4. Results will be displayed in a table

## Sample Products Included

The system comes with 6 sample products:
1. Wireless Headphones - $50
2. Smart Watch - $80
3. Bluetooth Speaker - $35
4. Laptop Stand - $25
5. USB-C Cable - $12
6. Wireless Mouse - $28

## Troubleshooting

### Error: "Connection failed"
- Ensure MySQL server is running
- Check username/password in config.php
- Verify MySQL is running on port 3306

### Error: "Access denied for user"
- Check MySQL credentials
- Default XAMPP: username=root, password=(empty)
- Default MAMP: username=root, password=root

### Database not created
- Check MySQL user has CREATE DATABASE permission
- Manually create database using phpMyAdmin
- Verify config.php settings

### Products not displaying
- Check if database and table exist
- Verify sample data was inserted
- Check for PHP errors (enable error reporting)

## Security Notes

⚠️ **Important**: This is an educational project. For production use:

1. **SQL Injection**: Use prepared statements
   ```php
   $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
   $stmt->bind_param("i", $id);
   ```

2. **Password Protection**: Add authentication
3. **Input Validation**: Validate all user inputs
4. **XSS Prevention**: Already using `htmlspecialchars()`
5. **CSRF Protection**: Add CSRF tokens to forms

## Testing Checklist

- [ ] Database auto-creation works
- [ ] Sample products are inserted
- [ ] Can view all products
- [ ] Can add new product
- [ ] Can edit existing product
- [ ] Can delete product
- [ ] Search functionality works
- [ ] Form validation works
- [ ] Error messages display correctly
- [ ] Success messages display correctly

## API Endpoints (Future Enhancement)

This system can be extended to include REST API:
- `GET /api/products` - Get all products
- `GET /api/products/{id}` - Get single product
- `POST /api/products` - Create product
- `PUT /api/products/{id}` - Update product
- `DELETE /api/products/{id}` - Delete product

## Learning Objectives

After completing this experiment, you should understand:
- ✅ PHP and MySQL integration
- ✅ CRUD operations
- ✅ Database connection management
- ✅ SQL queries (SELECT, INSERT, UPDATE, DELETE)
- ✅ Form handling in PHP
- ✅ Data validation
- ✅ Error handling
- ✅ Session management basics

## Next Steps

1. Add user authentication
2. Implement image upload functionality
3. Add pagination for products
4. Create categories management
5. Add order management system
6. Implement shopping cart
7. Add product reviews and ratings

## Support

For issues or questions:
1. Check the main README.md
2. Verify all installation steps
3. Check PHP and MySQL error logs
4. Ensure all files are in correct directory

---

**Happy Coding! 🚀**
