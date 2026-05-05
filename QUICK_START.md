# 🚀 Quick Start Guide - Web Programming Lab

## 📁 What's Included

All 10 experiments are complete and ready to use!

```
✅ EXP1  - Personal Website (HTML)
✅ EXP2  - E-Commerce Website (HTML)
✅ EXP3  - Personal Website with CSS
✅ EXP4  - E-Commerce with CSS
✅ EXP5  - Calculator (JavaScript)
✅ EXP6  - Registration & Login (JavaScript Validation)
✅ EXP7  - Event Handling (JavaScript Events)
✅ EXP8  - Form Handling (PHP Validation)
✅ EXP9  - Product Management (PHP & MySQL)
✅ EXP10 - Sessions & Cookies (PHP)
```

---

## ⚡ 3-Minute Setup

### For HTML/CSS/JavaScript (EXP1-7)
```bash
# No setup needed!
# Just open index.html in your browser
```

### For PHP Experiments (EXP8-10)

#### Windows (XAMPP)
1. Download [XAMPP](https://www.apachefriends.org/)
2. Install and start Apache (+ MySQL for EXP9)
3. Copy experiment folders to `C:\xampp\htdocs\`
4. Open browser: `http://localhost/EXP8/`

#### Mac (MAMP)
1. Download [MAMP](https://www.mamp.info/)
2. Install and start servers
3. Copy folders to `/Applications/MAMP/htdocs/`
4. Open browser: `http://localhost:8888/EXP8/`

---

## 🎯 Test Each Experiment

### EXP6 - Registration & Login
```
1. Open: EXP6/index.html
2. Click "Register"
3. Fill form and submit
4. Login with credentials
5. Add products to cart
6. Checkout
```

### EXP7 - Event Handling
```
1. Open: EXP7/exp1_events.html
2. Click buttons, hover elements
3. Type in inputs, submit forms
4. See events in action!
```

### EXP8 - PHP Forms
```
1. Start Apache server
2. Open: http://localhost/EXP8/exp1_form.php
3. Try submitting empty form (see errors)
4. Fill correctly and submit
5. Check generated text files
```

### EXP9 - PHP & MySQL
```
1. Start Apache + MySQL
2. Open: http://localhost/EXP9/index.php
3. Database auto-creates!
4. Add/Edit/Delete products
5. Search products
```

### EXP10 - Sessions & Cookies
```
1. Start Apache server
2. Open: http://localhost/EXP10/index.php
3. Register new account
4. Login (check "Remember Me")
5. Add items to cart
6. View profile (see session/cookie info)
7. Checkout
```

---

## 🔧 Troubleshooting

### PHP files download instead of running?
- ✅ Start Apache server
- ✅ Use .php extension
- ✅ Access via localhost (not file://)

### MySQL connection error?
- ✅ Start MySQL server
- ✅ Check config.php credentials
- ✅ Default: username=root, password=(empty)

### Session not working?
- ✅ Enable cookies in browser
- ✅ Check PHP session configuration
- ✅ Restart Apache server

---

## 📚 File Structure

```
📦 Web Programming Lab
├── 📄 index.html                    # Main landing page
├── 📄 README.md                     # Complete documentation
├── 📄 EXPERIMENTS_SUMMARY.md        # Detailed summary
├── 📄 QUICK_START.md               # This file
│
├── 📁 EXP1/                        # Personal Website
├── 📁 EXP2/                        # E-Commerce
├── 📁 EXP3/                        # Personal + CSS
├── 📁 EXP4/                        # E-Commerce + CSS
├── 📁 EXP5/                        # Calculator
│
├── 📁 EXP6/                        # JavaScript Validation
│   ├── index.html
│   ├── register.html
│   ├── login.html
│   ├── products.html
│   ├── cart.html
│   └── contact.html
│
├── 📁 EXP7/                        # Event Handling
│   ├── exp1_events.html
│   └── exp2_events.html
│
├── 📁 EXP8/                        # PHP Forms
│   ├── exp1_form.php
│   └── exp2_form.php
│
├── 📁 EXP9/                        # PHP & MySQL
│   ├── config.php
│   ├── index.php
│   ├── products.php
│   ├── add_product.php
│   ├── edit_product.php
│   ├── search.php
│   └── README.md
│
└── 📁 EXP10/                       # Sessions & Cookies
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

## 🎓 Learning Path

### Week 1-2: HTML Basics
- EXP1: Personal Website
- EXP2: E-Commerce Website

### Week 3-4: CSS Styling
- EXP3: Personal Website + CSS
- EXP4: E-Commerce + CSS

### Week 5-6: JavaScript
- EXP5: Calculator
- EXP6: Form Validation
- EXP7: Event Handling

### Week 7-8: PHP
- EXP8: PHP Form Handling

### Week 9-10: Database & State
- EXP9: PHP & MySQL
- EXP10: Sessions & Cookies

---

## 💡 Pro Tips

### For Students
1. Start with EXP1 and progress sequentially
2. Read code comments carefully
3. Experiment with modifications
4. Test in multiple browsers
5. Use browser DevTools (F12)

### For Testing
1. Always test with invalid data first
2. Check browser console for errors
3. Verify data persistence
4. Test logout/login flows
5. Clear browser cache if needed

### For Development
1. Use VS Code with extensions:
   - PHP Intelephense
   - Live Server
   - MySQL
2. Enable error reporting in PHP
3. Use browser DevTools Network tab
4. Check Apache/MySQL logs

---

## 📊 Feature Checklist

### EXP6 Features
- [x] User registration
- [x] Login authentication
- [x] Form validation
- [x] Shopping cart
- [x] LocalStorage persistence
- [x] Session management

### EXP7 Features
- [x] 8+ event types for EXP1
- [x] 10+ event types for EXP2
- [x] Real-time interactions
- [x] Dynamic content updates

### EXP8 Features
- [x] Server-side validation
- [x] Contact form (EXP1)
- [x] Checkout form (EXP2)
- [x] File storage
- [x] Error handling

### EXP9 Features
- [x] Auto database creation
- [x] CRUD operations
- [x] Search functionality
- [x] Sample data
- [x] Input validation

### EXP10 Features
- [x] User registration/login
- [x] Session management
- [x] Cookie handling
- [x] Shopping cart
- [x] Order processing
- [x] User profile

---

## 🎯 Common Tasks

### View All Experiments
```
Open: index.html
Click on any experiment link
```

### Test JavaScript Validation
```
1. Open EXP6/register.html
2. Try: empty fields → see errors
3. Try: invalid email → see error
4. Try: short password → see error
5. Fill correctly → success!
```

### Test PHP & MySQL
```
1. Start XAMPP (Apache + MySQL)
2. Open http://localhost/EXP9/
3. Click "View Products"
4. Click "Add Product"
5. Fill form and submit
6. See new product in list
```

### Test Sessions
```
1. Open http://localhost/EXP10/
2. Register and login
3. Add items to cart
4. Close browser
5. Reopen and check cart
6. View profile for session info
```

---

## 🆘 Need Help?

### Documentation
- 📖 README.md - Complete guide
- 📋 EXPERIMENTS_SUMMARY.md - Detailed info
- 📝 EXP9/README.md - MySQL setup

### Resources
- [MDN Web Docs](https://developer.mozilla.org/)
- [PHP Manual](https://www.php.net/manual/)
- [W3Schools](https://www.w3schools.com/)

### Common Issues
1. **Port already in use**: Change Apache port in XAMPP
2. **MySQL won't start**: Check if another MySQL is running
3. **404 errors**: Verify file paths and server root
4. **Session issues**: Clear browser cookies

---

## ✅ Verification Checklist

Before submitting, verify:

- [ ] All 10 experiments are present
- [ ] index.html links work
- [ ] EXP1-7 open in browser
- [ ] EXP8-10 run on localhost
- [ ] Forms validate correctly
- [ ] Database creates automatically
- [ ] Sessions persist across pages
- [ ] Cookies store data
- [ ] No console errors
- [ ] All features work

---

## 🎉 You're All Set!

Everything is ready to go. Start with `index.html` and explore each experiment!

**Happy Coding! 🚀**

---

*Last Updated: 2026*
*All experiments tested and working*
