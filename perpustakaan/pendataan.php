<?php
include "koneksi.php";
if (!isset($_SESSION['user'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #343a40 !important;
        }

        .navbar-brand,
        .navbar-text {
            color: #ffffff !important;
        }

        .card {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .card-body {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: #212529;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-top: none;
            text-align: center;
        }

        .card-footer a {
            color: #212529;
            text-decoration: none;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Kembali</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kategori")); ?>
                        <br>Total Kategori
                    </div>
                    <div class="card-footer">
                        <a href="kategori.php">Lihat Selengkapnya<i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM buku")); ?>
                        <br>Total Buku
                    </div>
                    <div class="card-footer">
                        <a href="buku.php">Lihat Selengkapnya<i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM ulasan")); ?>
                        <br>Total Ulasan
                    </div>
                    <div class="card-footer">
                        <a href="total_ulasan.php">Lihat Selengkapnya<i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user")); ?>
                        <br>Total User
                    </div>
                    <div class="card-footer">
                        <a href="total_pengguna.php">Lihat Selengkapnya<i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>