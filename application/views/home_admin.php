<?php
// Mulai sesi (jika dibutuhkan untuk autentikasi login)
session_start();

// Routing halaman
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin</title>
    <style>
                /* General Reset */
        * {
            margin: 0;
            padding: 0;
            list-style: none;
            box-sizing: border-box;
        }

        /* Body and Font */
        body {
            display: flex;
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            color: #333;
            min-height: 100vh;
            flex-direction: column;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px;
            background-color: #333;
            color: white;
            z-index: 1000;
        }
        .navbar .logo a {
            font-size: 24px;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            width: 250px;
            height: 100%;
            background: #333;
            top: 60px;
            overflow-y: auto;
        }

        .sidebar ul a {
            display: block;
            font-size: 18px;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            transition: all 0.3s ease;
            border-top: 1px solid rgba(255, 255, 255, .1);
            border-bottom: 1px solid black;
        }

        .sidebar ul {
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        
        .sidebar ul a:hover {
            background-color: #444;
            padding-left: 30px;
        }

        /* Main Content Area */
        .main-content {
            flex: 1;
            margin-top: 60px;
            margin-left: 250px; /* Sama dengan lebar sidebar */
            padding: 20px;
            padding-top: 15px; /* Supaya sejajar dengan menu */
            background-color: white;
        }

        .main-content h1 {
            margin-bottom: 15px;
        }

        /* Footer */
        footer {
            position: relative;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 20px;
            margin-top: 20px;
            font-size: 14px;
        }
    </style>


</head>
<body>
    <!-- Header Section (Navigation Bar) -->
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="#">Finest Garment</a>
            </div>
        </nav>
    </header>
    <!-- Sidebar -->
     <div class="sidebar">
        <ul>
            <li><a href="home_admin.php?page=dashboard">Dashboard</a></li>
            <li><a href="home_admin.php?page=produk">Produk</a></li>
            <li><a href="home_admin.php?page=pesanan">Pesanan</a></li>
            <li><a href="home_admin.php?page=pembayaran">Pembayaran</a></li>
        </ul>
     </div>
     <!-- Main Content -->
    <div class="main-content">
        <?php
            switch($page) {
                case 'dashboard':
                    include 'dashboard.php';
                    break;
                case 'produk':
                    include 'tabel_produk.php';
                    break;
                case 'pesanan': 
                    include 'tabel_pesanan.php';
                    break;
                case 'pemesanan':
                    include 'tabel_pemesanan.php';
                    break;
                default: 
                    echo "<p>Halaman Tidak Ditemukan</p>";
                    break;
            }
        ?>
    </div>
    <!-- Footer Section -->
    <footer>
        <div class="footer">
            <p>&copy; 2024 Finest Garment. All rights reserved.</p>
            <ul class="footer-links">
                <li><a href="#about">About Us</a></li>
                <li><a href="mailto:info@finestgarment.com">Contact Us</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>