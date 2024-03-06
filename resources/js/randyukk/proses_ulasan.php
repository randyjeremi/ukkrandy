<?php
// Sertakan file koneksi ke database
require_once("koneksi.php");

// Pastikan session user sudah dimulai
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['user'])) {
    // Jika belum, redirect ke halaman login atau tindakan lainnya
    header('location:login.php');
    exit; // Hentikan eksekusi skrip setelah melakukan redirect
}

// Ambil data dari formulir ulasan yang dikirimkan oleh pengguna
$id_user = $_SESSION['user']['id_user'];
$id_buku = $_POST['id_buku'];
$rating = $_POST['rating'];
$ulasan = $_POST['deskripsi'];

// Lakukan proses penyimpanan ulasan ke dalam database, termasuk ID buku
$query_insert = "INSERT INTO ulasan (id_user, id_buku, rating, ulasan) VALUES ('$id_user', '$id_buku', '$rating', '$ulasan')";

// Eksekusi query untuk menyimpan ulasan
$result = mysqli_query($koneksi, $query_insert);

// Periksa apakah penyimpanan berhasil atau tidak
if ($result) {
    // Jika berhasil, lakukan tindakan yang sesuai, misalnya redirect kembali ke halaman buku atau tampilkan pesan sukses
    header('location:ulasan.php?id=' . $id_buku);
    exit; // Hentikan eksekusi skrip setelah melakukan redirect
} else {
    // Jika gagal, lakukan tindakan yang sesuai, misalnya tampilkan pesan gagal
    echo "Gagal menyimpan ulasan. Silakan coba lagi.";
}
?>