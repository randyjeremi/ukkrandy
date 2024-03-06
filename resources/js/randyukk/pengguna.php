<?php
session_start();
if ($_SESSION['user']['role'] != 'peminjam') {
    header("Location: admin.php");
    exit;
}
require_once("koneksi2.php");
$query = mysqli_query($koneksi, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan Bersama - Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        
        body {
            font-family: 'Poppins';
            font-weight: bold;
            font-size: medium;
            background-color: #F7F6BB;
        }

        .navbar {
            background-color: #114232; /* Warna navbar */
            
        }

        .navbar-brand img {
            width: 40px; /* Ukuran logo */
            margin-right: 10px;
        }

        .carousel-item img {
            height: 400px;
            object-fit: cover;
        }

        .card {
            text-align: center;
            margin: 20px;
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card-img-top {
            height: 400px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.1);
        }

        .card-body {
            background-color: #fff;
            padding: 20px;
        }

        .fade-in {
            opacity: 0;
            animation: fadeInAnimation 3s ease forwards;
        }

        @keyframes fadeInAnimation {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-size: 30px; margin-left: 1rem;" >Perpustakaan Bersama</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Add other navbar items here -->
                </ul>
                <ul class="navbar-nav ml-auto">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="peminjaman.php">Pinjaman Saya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="koleksi.php">Koleksi Saya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container fade-in mt-4">
        <div class="row">
            <div class="col">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/7913448.jpg" class="d-block w-100" alt="Carousel Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/8644645.jpg" class="d-block w-100" alt="Carousel Image 2">
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h1></h1>
        </div>

        <div class="row">
            <?php
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM buku LEFT JOIN kategori  on buku.id_kategori = kategori.id_kategori");
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="uploaded/<?php echo $data['gambar']; ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data['judul']; ?></h5>
                            <a href="ulasan.php?id=<?= $data['id_buku']; ?>" class="btn btn-primary">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
