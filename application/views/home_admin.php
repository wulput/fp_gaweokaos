<?php
// Mulai sesi (jika dibutuhkan untuk autentikasi login)
session_start();

// Routing halaman
// $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin</title>
    
    <link rel="stylesheet" href="<?php echo base_url('asset/css/home_adm.css')?>">

</head>
<body>
    <!-- Header Section (Navigation Bar) -->
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="#">Gaweo Kaos</a>
            </div>
        </nav>
    </header>
    <!-- Sidebar -->
     <div class="sidebar">
        <ul>
            <li><a href="home_admin.php?page=dashboard_admin.php">Dashboard</a></li>
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
                    include 'dashboard_admin.php';
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
            <p>&copy; 2024 Gaweo Kaos. All rights reserved.</p>
            <ul class="footer-links">
                <li><a href="#about">About Us</a></li>
                <li><a href="mailto:info@finestgarment.com">Contact Us</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>