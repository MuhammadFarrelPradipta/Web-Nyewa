<?php include "./header.php";
?>
<!-- Content -->
<button type="button" class="btn btn-primary m-5"><a href="tambah_properti.php" style="text-decoration: none; color: white;"> Tambah Properti </a></button>
<div style="min-height:500px ;">
    <table class="table mx-5">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kos/Kontrakan</th>
                <th scope="col">Foto </th>
                <th scope="col">Lokasi </th>
                <th scope="col">Harga (perbulan) </th>
                <th scope="col">Jenis Properti </th>
            </tr>
        </thead>
        <tbody>
            <?php $number = 1;
            $tampilPeg    = mysqli_query($conn, "SELECT * FROM pemilik WHERE id_pemilik='$_SESSION[id_pemilik]'");
            $peg          = mysqli_fetch_array($tampilPeg);
            $take = $conn->query("SELECT * FROM properti WHERE milik_properti = '$peg[nama_pemilik]'");
            while ($pecah = $take->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $pecah["nama_properti"]; ?></td>
                    <td>
                        <img src="../foto_properti/<?php echo $pecah["foto_properti"]; ?>" width="100">
                    </td>
                    <td><?php echo $pecah["lokasi_properti"]; ?></td>
                    <td><?php echo $pecah["harga_properti"]; ?></td>
                    <td><?php echo $pecah["jenis_properti"]; ?></td>
                    <td>
                        <a href="hapus_properti.php?id=<?php echo $pecah['id_properti'] ?>" class="btn-primary btn">hapus</a>
                        <a href="ubah_properti.php?id=<?php echo $pecah['id_properti'] ?>" class="btn-primary btn">ubah</a>
                    </td>
                </tr>
                <?php $number++; ?>
            <?php }
            ?>
        </tbody>
    </table>
</div>
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