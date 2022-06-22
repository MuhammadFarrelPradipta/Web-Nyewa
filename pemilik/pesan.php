<?php include "./header.php";

?>

<div style="min-height: 1000px;">
    <h5 class="m-5">Pengajuan Sewa</h5>

    <?php
    $tampilPeg    = mysqli_query($conn, "SELECT * FROM pemilik WHERE id_pemilik='$_SESSION[id_pemilik]'");
    $peg          = mysqli_fetch_array($tampilPeg);
    $ambil = $conn->query("SELECT * FROM pengajuan WHERE kepada_pengajuan = '$peg[nama_pemilik]' ORDER BY tanggal_pengajuan DESC ");
    while ($pecah = $ambil->fetch_assoc()) {
    ?>

        <div class="card m-5">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h5>Tanggal Ketemuan : <?php echo $pecah['tanggal_pengajuan']  ?> </h5>
                    <p> <?php echo $pecah['dari_pengajuan'] ?> ingin menyewa selama <?php echo $pecah['sewa_pengajuan'] ?> Bulan</p>
                    <p>Pesan : <?php echo $pecah['pesan_pengajuan'] ?></p>
                </li>
            </ul>
            <a class="btn btn-primary m-3" href="tambahtransaksi.php?id=<?php echo $pecah['id_pengajuan'] ?>" style="text-decoration: none; color: white;"> Tambahkan ke Transaksi </a>
        </div>
    <?php } ?>
</div>
<!-- Content -->

<!-- Footer -->
<div class="fixed-bottom" style="background-color: #e3f2fd;">
    <div class="footer container">
        <div class="row">
            <div class="col">
                <div class="d-flex align-self-center align-items-center">
                    <img src="../img/logo.png" alt="" style="width: 100px; height: 100px;">
                    <a class="navbar-brand fw-bold" href="#" style="color: #4e5aa8; font-size: 40px;">NYEWA</a>
                </div>
                <p>Cari Kos dan Kontrakan dengan mudah,cepat dan murah</p>
            </div>
            <div class="col m-4">
                <h4>Hubungi Kami</h4>
                <p><i class="bi bi-envelope"></i> muhammadfarrelpradipta@gmail.com</p>
                <p><i class="bi bi-telephone-fill"></i> 089619103122</p>
            </div>
        </div>
    </div>
</div>
</body>

</html>

<!-- Button trigger modal -->