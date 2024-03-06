<?php
session_start();
if ($_SESSION['user']['role'] != 'peminjam') {
    header("Location: admin.php");
    exit;
}
include "koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM koleksi WHERE id_koleksi=$id");
?>
<script>
    alert('Hapus data berhasil');
    location.href = "koleksi.php";
</script>