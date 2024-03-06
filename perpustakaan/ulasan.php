<?php
require_once("koneksi.php");

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT buku.*, kategori.kategori
  FROM buku
  INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori WHERE buku.id_buku=$id;");
$buku = mysqli_fetch_assoc($query);

$query_ulasan = mysqli_query($koneksi, "SELECT ulasan.*, user.* FROM ulasan INNER JOIN user ON user.id_user = ulasan.id_user WHERE id_buku = '$id'");
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
    /* Tambahan CSS untuk animasi */
    .fadeIn {
      animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    /* Tambahkan CSS untuk gambar */
    .book-image {
      max-width: 500px;
      /* Ubah sesuai kebutuhan Anda */
      width: 100%;
      height: auto;
    }

    /* Tambahkan warna estetik untuk tombol */
    .custom-btn {
      padding: 5px 10px;
    }


    /* Tambahkan style untuk header */
    header {
      background-color: #3C3633;
      color: white;
      padding: 10px 0;
      text-align: center;
    }

    /* Tambahkan style untuk section ulasan */
    .review-section {
      background-color: #F5F5F5;
      padding: 20px;
      border-radius: 10px;
    }
  </style>
</head>

<body>


  <nav class="navbar navbar-expand-lg py-3" style="background-color: #3C3633">
    <div class="container-fluid">
      <!-- Tambahkan konten navbar di sini -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="pengguna.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="koleksi.php">Koleksi Pribadi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="peminjaman.php">Peminjaman</a>
          </li>
        </ul>
        <div class="d-flex nav-link">
          <a href="login.php" class="btn btn-danger">Log Out</a>
        </div>
      </div>
    </div>
  </nav>

  <section id="" style="margin-top: 50px; margin-left:40px" class="fadeIn">
    <div class="d-flex gap-5">
      <div class="card border-0">
        <img src="uploaded/<?php echo $buku['gambar']; ?>" class="img-fluid book-image" alt="">
        <br>
        <button onclick="window.location.href = 'peminjaman_tambah.php?id=<?php echo $id ?>';"
          class="custom-btn">Pinjam</button>
        <button onclick="window.location.href = 'koleksi_proses.php?id=<?php echo $buku['id_buku']; ?>';"
            class="custom-btn">Tambah Koleksi</a>
        </button>
      </div>

      <div class="ml-5" style="margin-left: 40px">
        <h2><?php echo $buku['judul']; ?></h2>
        <h6><?php echo $buku['penulis']; ?></h6>
        <br>
        <p>Kategori: <?php echo $buku['kategori']; ?></p>
        <p>Tahun terbit: <?php echo $buku['tahun_terbit']; ?></p>
        <p>Penerbit: <?php echo $buku['penerbit']; ?></p>
        <h6>Tentang</h6>
        <p><?php echo $buku['deskripsi']; ?></p>

        <form id="formUlasan" method="post" action="proses_ulasan.php">
          <!-- Formulir untuk ulasan -->
          <div class="row mb-3">
            <div class="col-md-4 ms-0">Rating :</div>
            <div class="col-md-0">
              <select name="rating" class="form-control">
                <option value="1">1 Bintang</option>
                <option value="2">2 Bintang</option>
                <option value="3">3 Bintang</option>
                <option value="4">4 Bintang</option>
                <option value="5">5 Bintang</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4 ms-0"></div>
            <div class="col-md-0">
              <textarea name="deskripsi" rows="4" class="form-control"></textarea>
            </div>
          </div>

          <!-- Input tersembunyi untuk menyimpan ID buku yang diulas -->
          <input type="hidden" name="id_buku" value="<?php echo $buku['id_buku']; ?>">

          <!-- Tombol untuk mengirim ulasan -->
          <button type="submit" class="custom-btn">Kirim Ulasan</button>
        </form>

      </div>
    </div>
  </section>

  <section class="review-section">
    <div class="container
    ">
      <h5 class="mt-3 mb-4">Ulasan</h5>
      <?php while ($data_ulasan = mysqli_fetch_array($query_ulasan)) { ?>
        <div class="card mb-3">
          <div class="card-body">
            <h6 class="card-title font-weight-bold">
              <?= $data_ulasan["username"]; ?>
            </h6>
            <p class="card-text">
              <?= $data_ulasan["ulasan"]; ?>
            </p>
            <p class="card-text">Rating:
              <?= $data_ulasan["rating"]; ?>
            </p>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</body>

</html>
