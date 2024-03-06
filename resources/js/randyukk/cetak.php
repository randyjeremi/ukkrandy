<h2 align="center">Laporan Peminjaman Buku</h2>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <tr>
        <th>No</th>
        <th>User</th>
        <th>Buku</th>
        <th>Tanggal Peminjaman</th>
        <th>Tanggal Pengembalian</th>
        <th>Status Peminjaman</th>
        <th>Rating</th>
    </tr>
    <?php
    include "koneksi.php";
    $i = 1;
    $query = mysqli_query($koneksi, "SELECT peminjaman.*,user.*,buku.*, ulasan.* FROM peminjaman INNER JOIN ulasan on ulasan.id_user = peminjaman.id_user INNER JOIN user on user.id_user = peminjaman.id_user INNER JOIN buku on buku.id_buku = peminjaman.id_buku");
    while ($data = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td>
                <?php echo $i++; ?>
            </td>
            <td>
                <?php echo $data['nama']; ?>
            </td>
            <td>
                <?php echo $data['judul']; ?>
            </td>
            <td>
                <?php echo $data['tanggal_peminjaman']; ?>
            </td>
            <td>
                <?php echo $data['tanggal_pengembalian']; ?>
            </td>
            <td>
                <?php echo $data['status_pengembalian']; ?>
            </td>
            <td>
                <?php echo $data['rating']; ?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<script>
    window.print()
    setTimeout(function () {
        window.close();
    }, 1000);
</script>