<?php include "./header.php" ?>
<!-- Content -->
<div class="m-5">
  <button type="button" class="btn btn-primary rounded-pill"><a href="./kos.php" style="text-decoration:none ;color: white;">Kos</a></button>
  <button type="button" class="btn btn-primary rounded-pill"><a href="./kontrakan.php" style="text-decoration:none ;color: white;">Kontrakan</a></button>
</div>
<?php
$ambil = $conn->query("SELECT * FROM properti");
while ($bagian = $ambil->fetch_assoc()) :
?>
  <div class="m-5">
    <div class="card mb-3" style="max-width: 1200px;">
      <a href="./detail.php?id=<?php echo $bagian['id_properti'] ?>" style="text-decoration: none; color: black;">
        <div class="row">
          <div class="col-md-4">
            <img src="../foto_properti/<?php echo $bagian["foto_properti"]; ?> " class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h4 class="card-title"><?php echo $bagian["nama_properti"] ?></h4>
              <p class="card-text"><small class="text-muted"><?php echo $bagian["lokasi_properti"] ?></small></p>
              <h5 class="card-text  position-absolute bottom-0 end-0 m-3">Rp.<?php echo number_format($bagian["harga_properti"]) ?> / Bulan</h5>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
<?php endwhile; ?>
<!-- Footer -->
<div style="background-color: #e3f2fd;">
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