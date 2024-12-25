<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Cards Container */
        .card-container {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        /* Individual Card */
        .card {
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            flex: 1;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .card h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .card p {
            font-size: 18px;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Selamat Datang, Admin!</h1>
    <p>Ini adalah halaman utama Admin untuk mengelola Finest Garment.</p>

    <div class="card-container">
        <div class="card">
            <h2>Total Produk</h2>
            <p>120</p>
        </div>
        <div class="card">
            <h2>Total Pesanan</h2>
            <p>75</p>
        </div>
        <div class="card">
            <h2>Total Pembayaran</h2>
            <p>Rp. 25,000,000</p>
        </div>
    </div>

</body>
</html>