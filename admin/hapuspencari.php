<h1>Hapus Account Pencari</h1>
<?php
include "../koneksi.php";
$conn->query("DELETE FROM pencari WHERE id_pencari='$_GET[id]'");
echo "<script> alert('Akun pencari telah terhapus'); </script>";
echo "<script> location='index.php?halaman=pencari' ;</script>";
?>