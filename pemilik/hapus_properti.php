<?php include "./header.php" ?>
<h1>Hapus Properti</h1>
<?php
include "../koneksi.php";
$ambil = $conn->query("SELECT * FROM properti WHERE id_properti='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoproperti = $pecah['foto_properti'];
if (file_exists("../foto_properti/$fotoproperti")) {
    unlink("../foto_properti/$fotoproperti");
}

$conn->query("DELETE FROM properti WHERE id_properti='$_GET[id]'");
echo "<script> alert('Properti telah terhapus'); </script>";
echo "<script> location='properti.php' ;</script>";
?>

<?php include "./footer.php" ?>