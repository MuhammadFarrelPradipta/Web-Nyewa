<?php include "./header.php" ?>
<!-- Content -->
<?php
include "../koneksi.php";
$ambil = $conn->query("SELECT * FROM transaksi WHERE id_transaksi = '$_GET[id]' ");
$hasil = $ambil->fetch_assoc();
?>
<form method="post" enctype="multipart/form-data" class="m-5">
    <h4 class="text-center">Apakah Data Transaksi Sudah Benar ?</h4>
    <div class="form-group">
        <label>Nama Penyewa</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $hasil['nama_transaksi'] ?>">
    </div>
    <div class="form-group">
        <label>Nama Kost/Kontrakan</label>
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="kos">
            <?php
            $tampilPeg    = mysqli_query($conn, "SELECT * FROM pemilik WHERE id_pemilik='$_SESSION[id_pemilik]'");
            $peg          = mysqli_fetch_array($tampilPeg);
            $take = $conn->query("SELECT * FROM properti WHERE milik_properti = '$peg[nama_pemilik]'");
            while ($pecah = $take->fetch_assoc()) {
            ?>
                <option value="<?php echo $pecah['nama_properti'] ?>"><?php echo $pecah['nama_properti'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Tanggal Pertemuan</label>
        <input type="date" class="form-control" name="pertemuan" value="<?php echo $hasil['tanggal_pertemuan'] ?>">
    </div>
    <div class="form-group">
        <label>Tanggal Mulai Sewa</label>
        <input type="date" class="form-control" name="mulai_sewa" value="<?php echo $hasil['tanggal_mulai_sewa'] ?>" ?>
    </div>
    <div class="form-group">
        <label>Tanggal Selesai Sewa</label>
        <input type="date" class="form-control" name="selesai_sewa" value="<?php echo $hasil['tanggal_selesai_sewa'] ?>">
    </div>
    <div class="form-group">
        <label>Sewa Selama (Bulan)</label>
        <input type="number" class="form-control" name="lama_sewa" value="<?php echo $hasil['jangka_waktu'] ?>">
    </div>
    <div class="form-group">
        <label>Total Harga (Rupiah)</label>
        <input type="number" class="form-control" name="harga" value="<?php echo $hasil['biaya_transaksi'] ?>">
    </div>
    <button class="btn btn-primary my-5" name="save">Benar</button>
</form>
<?php
if (isset($_POST['save'])) {
    $conn->query("UPDATE transaksi SET nama_transaksi = '$_POST[nama]',nama_kos = '$_POST[kos]',tanggal_pertemuan = '$_POST[pertemuan]',tanggal_mulai_sewa = '$_POST[mulai_sewa]',tanggal_selesai_sewa = '$_POST[selesai_sewa]',jangka_waktu = '$_POST[lama_sewa]', biaya_transaksi = '$_POST[harga]', status_transaksi = '1'  WHERE id_transaksi='$_GET[id]'");

    echo "<div class='alert alert-info'> Data Telah Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=transaksi.php'>";
}
?>
<!-- Footer -->
<?php include "./footer.php" ?>