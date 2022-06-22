<?php include "./header.php" ?>
<!-- Content -->
<?php
if (isset($_GET["id"])) {
    $sewa = $conn->query("SELECT * FROM pengajuan WHERE id_pengajuan = '$_GET[id]'");
    $parts = $sewa->fetch_assoc();
?>
    <form method="post" enctype="multipart/form-data" class="m-5">
        <h4 class="text-center">Tambah Data Transaksi</h4>
        <div class="form-group">
            <label>Nama Penyewa</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $parts['dari_pengajuan'] ?>">
        </div>
        <div class="form-group">
            <label>Nama Kost/Kontrakan</label>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="kos">
                <?php $take = $conn->query("SELECT * FROM properti WHERE milik_properti = '$parts[kepada_pengajuan]'");
                while ($pecah = $take->fetch_assoc()) {
                ?>
                    <option value="<?php echo $pecah['nama_properti'] ?>"><?php echo $pecah['nama_properti'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal Pertemuan</label>
            <input type="date" class="form-control" name="pertemuan" value="<?php echo $parts['tanggal_pengajuan'] ?>">
        </div>
        <div class="form-group">
            <label>Tanggal Mulai Sewa</label>
            <input type="date" class="form-control" name="mulai_sewa" ?>
        </div>
        <div class="form-group">
            <label>Tanggal Selesai Sewa</label>
            <input type="date" class="form-control" name="selesai_sewa" ?>
        </div>
        <div class="form-group">
            <label>Sewa Selama (Bulan)</label>
            <input type="number" class="form-control" name="lama_sewa" value="<?php echo $parts['sewa_pengajuan'] ?>">
        </div>
        <div class="form-group">
            <label>Total Harga (Rupiah)</label>
            <input type="number" class="form-control" name="harga">
        </div>
        <button class="btn btn-primary my-5" name="save">Simpan</button>
    <?php } else { ?>

        <form method="post" enctype="multipart/form-data" class="m-5">
            <h4 class="text-center">Tambah Data Transaksi</h4>
            <div class="form-group">
                <label>Nama Penyewa</label>
                <input type="text" class="form-control" name="nama" value="">
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
                <input type="date" class="form-control" name="pertemuan" value="">
            </div>
            <div class="form-group">
                <label>Tanggal Mulai Sewa</label>
                <input type="date" class="form-control" name="mulai_sewa" ?>
            </div>
            <div class="form-group">
                <label>Tanggal Selesai Sewa</label>
                <input type="date" class="form-control" name="selesai_sewa" ?>
            </div>
            <div class="form-group">
                <label>Sewa Selama (Bulan)</label>
                <input type="number" class="form-control" name="lama_sewa" value="">
            </div>
            <div class="form-group">
                <label>Total Harga (Rupiah)</label>
                <input type="number" class="form-control" name="harga">
            </div>
            <button class="btn btn-primary my-5" name="save">Simpan</button>
        <?php } ?>
        </form>
        <?php
        include "../koneksi.php";
        if (isset($_POST['save'])) {
            $conn->query("INSERT INTO transaksi 
            (nama_transaksi,nama_kos,tanggal_pertemuan,tanggal_mulai_sewa,tanggal_selesai_sewa,jangka_waktu,biaya_transaksi,status_transaksi,pemilik_properti)
            VALUES ('$_POST[nama]','$_POST[kos]','$_POST[pertemuan]','$_POST[mulai_sewa]','$_POST[selesai_sewa]','$_POST[lama_sewa]','$_POST[harga]',0,'$parts[kepada_pengajuan]') ");

            echo "<div class='alert alert-info'> Data Telah Tersimpan</div>";
            echo "<meta http-equiv='refresh' content='1;url=transaksi.php'>";
        }
        ?>
        <!-- Footer -->
        <?php include "./footer.php" ?>