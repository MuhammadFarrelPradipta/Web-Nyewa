<h1>Hapus Akun Pemilik</h1>
<?php
include "../koneksi.php";
$conn->query("DELETE FROM pemilik WHERE id_pemilik='$_GET[id]'");
echo "<script> alert('Akun Pemilik Kos/Kontrakan telah terhapus'); </script>";
echo "<script> location = 'index.php?halaman=pemilik' ;</script>";
?>