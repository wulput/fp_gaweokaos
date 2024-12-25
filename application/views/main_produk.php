<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finest Garment - Fashion Store</title>
    <link rel="stylesheet" href="<?php echo base_url('asset/css/main.css')?>">
    <!-- Add font-awesome icons for cart or other features if needed -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!-- Header Section (Navigation Bar) -->
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="#">Finest Garment</a>
            </div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="<?php echo site_url('main/produk')?>">Products</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="<?php echo site_url("main/login")?>">Login</a></li>
            </ul>
            <div class="cart-icon">
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="hero-content">
            <h1>Premium Garments for Every Occasion</h1>
            <p>Explore our latest collection of high-quality apparel</p>
            <a href="#products" class="cta-btn">Shop Now</a>
        </div>
    </section>

    <!-- Product Section -->
    <section id="products" class="products-section">
        <h2>Featured Products</h2>
        <div class="product-grid">
            <div class="product-card">
                <img src="product1.jpg" alt="Product 1">
                <h3>Stylish Jacket</h3>
                <p>$49.99</p>
                <button>Add to Cart</button>
            </div>
            <div class="product-card">
                <img src="product2.jpg" alt="Product 2">
                <h3>Modern Shirt</h3>
                <p>$29.99</p>
                <button>Add to Cart</button>
            </div>
            <div class="product-card">
                <img src="product3.jpg" alt="Product 3">
                <h3>Classic Jeans</h3>
                <p>$39.99</p>
                <button>Add to Cart</button>
            </div>
            <!-- Add more products here -->
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="footer-content">
            <p>&copy; 2024 Finest Garment. All rights reserved.</p>
            <ul class="footer-links">
                <li><a href="#about">About Us</a></li>
                <li><a href="mailto:info@finestgarment.com">Contact Us</a></li>
            </ul>
        </div>
    </footer>

</body>
</html>
