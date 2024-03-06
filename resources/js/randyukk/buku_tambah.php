<?php
include "koneksi.php";
if (!isset($_SESSION['user'])) {
    header('location:login.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <h1 class="mt-4 ms-4">Buku</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" enctype="multipart/form-data">

                        <?php
                        if (isset($_POST['submit'])) {
                            // Ambil data dari formulir
                            $id_kategori = $_POST['id_kategori'];
                            $judul = $_POST['judul'];
                            $gambar = $_FILES['gambar']['name'];
                            $penulis = $_POST['penulis'];
                            $penerbit = $_POST['penerbit'];
                            $tahun_terbit = $_POST['tahun_terbit'];
                            $deskripsi = $_POST['deskripsi'];

                            // File Upload Handling
                            if ($gambar !== "") {
                        
                                $fileName = uniqid("", true);
                                $fileType = explode("image/", $_FILES["gambar"]["type"]);
                                move_uploaded_file($_FILES["gambar"]["tmp_name"], "uploaded/" . $fileName . "." . end($fileType));

                                $newFile = $fileName . '.' . end($fileType);
                     
                        
                                $query = mysqli_prepare($koneksi, "INSERT INTO buku(id_kategori, judul, penulis, penerbit, tahun_terbit, deskripsi, gambar) VALUES (?, ?, ?, ?, ?, ?, ?)");
                                // Bind parameter ke statement SQL
                                mysqli_stmt_bind_param($query, 'sssssss', $id_kategori, $judul, $penulis, $penerbit, $tahun_terbit, $deskripsi, $newFile);

                                // Eksekusi statement SQL
                                if (mysqli_stmt_execute($query)) {
                                    echo '<script>alert("Tambah Buku Berhasil"); location.href="buku.php";</script>';
                                } else {
                                    echo '<script>alert("Tambah Buku Gagal");</script>';
                                }
                                // Tutup statement
                                mysqli_stmt_close($query);
                            } else {
                                echo '<script>alert("Silahkan upload gambar dulu"); location.href="buku_tambah.php";</script>';
                            }

                            // Tutup koneksi database
                            mysqli_close($koneksi);
                        }
                        ?>

                        <div class="row mb-3">
                            <div class="col-md-2">Kategori</div>
                            <div class="col-md-8">
                                <select name="id_kategori" class="form-control">
                                    <?php
                                    $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                                    while ($kategori = mysqli_fetch_array($kat)) {
                                        ?>
                                        <option value="<?php echo $kategori['id_kategori']; ?>">
                                            <?php echo $kategori['kategori']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Judul</div>
                            <div class="col-md-8"><input type="text" class="form-control" name="judul"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Penulis</div>
                            <div class="col-md-8"><input type="text" class="form-control" name="penulis"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Penerbit</div>
                            <div class="col-md-8"><input type="text" class="form-control" name="penerbit"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Tahun Terbit</div>
                            <div class="col-md-8"><input type="number" class="form-control" name="tahun_terbit"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Deskripsi</div>
                            <div class="col-md-8"><textarea name="deskripsi" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Gambar</div>
                            <div class="col-md-8"><input type="file" name="gambar"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" name="submit"
                                    value="submit">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <a href="kategori.php" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>
</body>

</html>