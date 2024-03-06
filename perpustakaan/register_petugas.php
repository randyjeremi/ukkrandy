<?php
session_start();
if ($_SESSION['user']['role'] != 'admin') {
    header("Location: admin.php");
    exit;
}
require_once('koneksi.php');
if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $no_telepon = $_POST['no_telepon'];
    $role = $_POST['role'];
    $password = md5($_POST['password']);

    $role = 'petugas';

    $insert = mysqli_query($koneksi, "INSERT INTO user(nama,username,alamat,email,password,no_telepon,role) VALUES('$nama','$username','$alamat','$email','$password','$no_telepon','$role')");
    if ($insert) {
        echo '<script>alert("Selamat, Register Berhasil"); location.href="login.php";</script>';
    } else {
        echo '<script>alert("Register gagal, silahkan ulangi kembali");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PerpustakaanKu.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #1C2526;
        }

        .container {
            background-color: #000;
            border-radius: 25px;
            color: white;
            padding: 20px;
        }

        @media (min-width: 576px) {
            .container {
                max-width: 400px;
                /* Tetapkan lebar maksimum pada layar yang lebih besar */
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">Register</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="fullName" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Masukkan Email" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Masukkan Password"
                    id="inputPassword" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">No.Telepon</label>
                <input type="text" class="form-control" name="no_telepon" placeholder="Masukkan No Telepon" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" rows="3" required></textarea>
            </div>
            <p class="mb-3">Sudah punya akun? <a href="login.php" class="text-decoration-none">Login</a></p>
            <button type="submit" class="btn btn-dark" name="register">Register</button>
            <a href="admin.php" class="btn btn-danger">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>