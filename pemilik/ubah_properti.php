<?php include "./header.php";
?>

<?php
include "../koneksi.php";
$ambil = $conn->query("SELECT * FROM properti WHERE id_properti = '$_GET[id]' ");
$hasil = $ambil->fetch_assoc();
?>
<div>
    <form method="post" enctype="multipart/form-data" class="m-5">
        <h4 class="text-center">Tambah Data Properti</h4>
        <div class="form-group">
            <label>Nama Kost/Kontrakan</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $hasil['nama_properti'] ?>">
        </div>
        <div class="form-group">
            <label>Harga (Rupiah)</label>
            <input type="number" class="form-control" name="harga" value="<?php echo $hasil['harga_properti'] ?>">
        </div>
        <div class="form-group">
            <label>Lokasi </label>
            <input type="text" class="form-control" name="lokasi" value="<?php echo $hasil['lokasi_properti'] ?>">
        </div>
        <div class="form-group">
            <label>Jenis Properti </label>
            <input type="text" class="form-control" name="jenis" value="<?php echo $hasil['jenis_properti'] ?>">
        </div>
        <div class="form-group">
            <label>Pemilik </label>
            <input type="text" class="form-control" name="pemilik" value="<?php echo $hasil['milik_properti'] ?>" disabled>
        </div>
        <div class="form-group">
            <label>Foto</label><br>
            <img src="../foto_properti/<?php echo $hasil['foto_properti']; ?>" width="200">
            <input type="file" class="form-control" name="foto">
        </div>
        <button class="btn btn-primary my-5" name="save">Simpan</button>
    </form>

    <?php
    if (isset($_POST['save'])) {
        $namafoto = $_FILES['foto']['name'];
        $lokasifoto = $_FILES['foto']['tmp_name'];

        if (!empty($lokasifoto)) {
            move_uploaded_file($lokasifoto, "../foto_properti/$namafoto");

            $conn->query("UPDATE properti SET nama_properti ='$_POST[nama]',foto_properti='$namafoto',lokasi_properti='$_POST[lokasi]',
                harga_properti='$_POST[harga]',jenis_properti = '$_POST[jenis]',milik_properti = '$hasil[milik_properti]'
                WHERE id_properti='$_GET[id]'");
        } else {
            $conn->query("UPDATE properti SET nama_properti ='$_POST[nama]',lokasi_properti='$_POST[lokasi]',
                harga_properti='$_POST[harga]',jenis_properti = '$_POST[jenis]',milik_properti = '$hasil[milik_properti]'
                WHERE id_properti='$_GET[id]'");
            echo "<script>alert('data properti telah diubah');</script>";
            echo "<script>location ='properti.php';</script>";
        }
    }
    ?>
</div>

<?php
include "./footer.php"
?>