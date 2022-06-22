<?php include "./header.php";
?>
<!-- Content -->
<form method="post" enctype="multipart/form-data" class="m-5">
    <h4 class="text-center">Tambah Data Properti</h4>
    <div class="form-group">
        <label>Nama Kost/Kontrakan</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>Harga (Rupiah)</label>
        <input type="number" class="form-control" name="harga">
    </div>
    <div class="form-group">
        <label>Lokasi </label>
        <input type="text" class="form-control" name="lokasi">
    </div>
    <div class="form-group">
        <label>Jenis Properti </label>
        <input type="text" class="form-control" name="jenis">
    </div>

    <?php
    $tampilPeg    = mysqli_query($conn, "SELECT * FROM pemilik WHERE id_pemilik='$_SESSION[id_pemilik]'");
    $peg          = mysqli_fetch_array($tampilPeg);
    ?>

    <div class="form-group">
        <label>Pemilik </label>
        <input type="text" class="form-control" name="pemilik" value="<?php echo $peg['nama_pemilik'] ?>" disabled>
    </div>
    <div class="form-group">
        <label>Foto</label>
        <input type="file" class="form-control" name="foto">
    </div>
    <button class="btn btn-primary my-5" name="save">Simpan</button>
</form>
<?php
include "../koneksi.php";
if (isset($_POST['save'])) {
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi, "../foto_properti/" . $nama);
    $conn->query("INSERT INTO properti 
            (nama_properti,foto_properti,lokasi_properti,harga_properti,jenis_properti,milik_properti)
            VALUES ('$_POST[nama]','$nama','$_POST[lokasi]','$_POST[harga]','$_POST[jenis]','$peg[nama_pemilik]') ");

    echo "<div class='alert alert-info'> Data Telah Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=properti.php'>";
}
?>
<!-- Footer -->
<?php
include "./footer.php"
?>
<!-- Button trigger modal -->