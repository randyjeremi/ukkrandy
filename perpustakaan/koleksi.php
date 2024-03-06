<?php
require_once("koneksi.php");
if ($_SESSION['user']['role'] != 'peminjam') {
    header("Location: admin.php");
}
$id_user = $_SESSION['user']['id_user'];
$query = mysqli_query($koneksi, "SELECT buku.*,koleksi.id_koleksi,  koleksi.id_buku, user.id_user FROM buku INNER JOIN koleksi ON koleksi.id_buku = buku.id_buku INNER JOIN user ON user.id_user = koleksi.id_user");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PerpustakaanKu.</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/user.css">
    <style>
        /* Perubahan CSS tambahan untuk desain */
        body {
            background-color: #f8f9fa;
            /* Ubah warna latar belakang */
        }

        #Buku {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            width: 250px;
            background-color: #fff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg py-3" style="background-color: #3C3633">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">PerpustakaanKu.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-white"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="pengguna.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="koleksi.php">Koleksi
                            Pribadi</a>
                    </li>
                </ul>
                <div class="d-flex nav-link">
                    <a href="login.php" class="btn btn-danger">Log Out</a>
                </div>
            </div>
        </div>
    </nav>

    <section id="Buku">
        <?php while ($buku = mysqli_fetch_assoc($query)): ?>
            <div class="card">
                <img src='uploaded/<?php echo $buku['gambar']; ?>' class='card-img-top' alt='<?php echo $buku['judul']; ?>'>
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $buku['judul']; ?>
                    </h5>
                    <p class="card-text">
                        <?php echo $buku['tahun_terbit']; ?>
                    </p>
                    <p class="card-text">Penerbit:
                        <?php echo $buku['penerbit']; ?>
                    </p>
                    <a href='ulasan.php?id=<?php echo $buku['id_buku']; ?>' class="btn btn-primary">Lihat</a>
                    <a onclick="return confirm('Ingin Menghapus dari koleksi?');"
                        href="koleksi_hapus.php?id=<?php echo $buku['id_koleksi']; ?>"
                        class="btn btn-danger text-white">Hapus</a>
                </div>
            </div>
        <?php endwhile; ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>