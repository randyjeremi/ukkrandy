<?php
session_start();
if ($_SESSION['user']['role'] != 'admin' && $_SESSION['user']['role'] != 'petugas') {
    header("Location: pengguna.php");
    exit;
}

// Log out logic
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

require_once("koneksi2.php");
$query = mysqli_query($koneksi, "SELECT * FROM buku");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS untuk desain tambahan */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            margin-bottom: 20px;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            color: #007bff;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card-text {
            color: #6c757d;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .container {
            padding-top: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header {
            text-align: center;
            margin-bottom: 50px;
        }

        .header h2 {
            color: #007bff;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card-container .col-md-4 {
            flex: 0 0 30%;
            margin: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Logout Button -->
        <form method="post">
            <button type="submit" name="logout" class="btn btn-danger"
                style="float: right; margin-top: 10px; margin-right: 10px;">Logout</button>
        </form>
        <!-- End Logout Button -->

        <div class="header">
            <h2>Selamat Datang di Laman Admin</h2>
            <p>Apa yang ingin kamu lakukan hari ini?</p>
        </div>
        <div class="card-container">
            <!-- Card 1: Generate Laporan -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Generate Laporan</h5>
                        <p class="card-text">Klik Untuk Mengenerate Laporan Perpustakaan</p>
                        <a href="laporan.php" class="btn btn-primary">Ke Laporan</a>
                    </div>
                </div>
            </div>

            <!-- Card 2: Register Officer -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftarkan Petugas</h5>
                        <p class="card-text">Klik Untuk Mendaftarkan Petugas Perpustakaan</p>
                        <a href="register_petugas.php" class="btn btn-primary">Daftar Petugas</a>
                    </div>
                </div>
            </div>

            <!-- Card 3: Inventory Management -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pendataan Barang</h5>
                        <p class="card-text">Klik Untuk Mengupdate Data Barang Perpustakaan</p>
                        <a href="pendataan.php" class="btn btn-primary">Data Barang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>