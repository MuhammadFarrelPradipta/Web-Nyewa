<?php
include "./koneksi.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nyewa - Cari Sewa Kost & Kontrakan via Online</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>

<body>
  <!-- Header -->
  <div class="header border-bottom-1 border border-primary">
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
      <div class="container-fluid">
        <img src="./img/logo.png" alt="" style="width: 100px; height: 100px;">
        <a class="navbar-brand fw-bold" href="./index.php" style="color: #4e5aa8;">NYEWA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="./pencari/index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./ketentuan.php">Ketentuan</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Cari Iklan
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="./pencari/kos.php">Kos</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="./pencari/kontrakan.php">Kontrakan</a></li>
              </ul>
            </li>
          </ul>
          <?php if (isset($_SESSION['pencari'])) : ?>
            <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              <a href="keluar.php" style="color: white; text-decoration: none;">Keluar</a>
            </button>
          <?php else : ?>
            <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              MASUK
            </button>
            <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#staticBackdrops">
              DAFTAR
            </button>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Masuk sebagai </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <img src="../img/2.png" alt="" style="width: 100px; height: 100px;">
                    <a href="./masuk.php" style="text-decoration: none; color:black;">Pencari</a>
                  </div>
                  <div class="modal-body">
                    <img src="../img/3.jpg" alt="" style="width: 100px; height: 100px;">
                    <a href="../pemilik/masuk.php" style="text-decoration: none; color:black;">Pemilik</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrops" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Daftar sebagai </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <img src="../img/2.png" alt="" style="width: 100px; height: 100px;">
                    <a href="../pencari/daftar.php" style="text-decoration: none; color:black;">Pencari</a>
                  </div>
                  <div class="modal-body">
                    <img src="../img/3.jpg" alt="" style="width: 100px; height: 100px;">
                    <a href="../pemilik/daftar.php" style="text-decoration: none; color:black;">Pemilik</a>
                  </div>
                </div>
              </div>
            </div>
          <?php endif ?>
        </div>
      </div>
    </nav>
  </div>
  </div>
  <!-- Content -->
  <div class="content m-5 container">
    <div class="row">
      <div class="col">
        <img src="./img/1.jpg" alt="" style="width: 300px; height: 300px;" class="mx-5">
        <h2>Mau Cari Kos atau Kontrakan ?</h2>
        <h4>Dapatkan informasi lebih lanjut di NYEWA</h4>
        <a class="btn btn-primary" href="./pencari/kos.php" role="button">Detail Kos</a>
        <a class="btn btn-primary" href="./pencari/kontrakan.php" role="button">Detail Kontrakan</a>
      </div>
    </div>
  </div>
  <!-- Iklan Kos -->
  <div style="background-color: #4e5aa8; color: white;" class="p-5">
    <h4>Kos Terpopuler</h4>
    <hr width="200px">
    <div class="card-group">
      <?php
      $take = $conn->query("SELECT * FROM properti WHERE jenis_properti = 'Kost' ORDER BY jumlah_pengunjung DESC");
      while ($pecah = $take->fetch_assoc()) {
      ?>
        <div class="card mx-3" style="width: 18rem;">
          <img src="./foto_properti/<?php echo $pecah['foto_properti'] ?>" class="card-img-top" sizes="10">
          <div class="card-body" style="color: black;">
            <h5 class="card-title"><?php echo $pecah['nama_properti'] ?></h5>
            <p class="card-text"><?php echo $pecah['lokasi_properti'] ?></p>
            <a href="./pencari/detail.php?id=<?php echo $pecah['id_properti'] ?> " class="btn btn-primary">Detail Informasi</a>
          </div>
        </div>
      <?php } ?>
    </div>
    <br>
    <div class="d-flex justify-content-center">
      <a href="./pemilik/masuk.php"><button type="button" class="btn btn-outline-light" class="text-center">Daftarkan Kos Anda Segera </button></a>
    </div>
    <!-- Iklan Kontrakan -->
    <div class="p-5">
      <h4>Kontrakan Terpopuler</h4>
      <hr width="200px">
      <div class="card-group">
        <?php
        $take = $conn->query("SELECT * FROM properti WHERE jenis_properti = 'Kontrakan' ORDER BY jumlah_pengunjung DESC");
        while ($pecah = $take->fetch_assoc()) {
        ?>
          <div class="card mx-3" style="width: 18rem;">
            <img src="./foto_properti/<?php echo $pecah['foto_properti'] ?>" class="card-img-top" sizes="10">
            <div class="card-body" style="color: black;">
              <h5 class="card-title"><?php echo $pecah['nama_properti'] ?></h5>
              <p class="card-text"><?php echo $pecah['lokasi_properti'] ?></p>
              <a href="./pencari/detail.php?id=<?php echo $pecah['id_properti'] ?> " class="btn btn-primary">Detail Informasi</a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div><br>
    <div class="d-flex justify-content-center">
      <a href="./pemilik/masuk.php"><button type="button" class="btn btn-outline-light" class="text-center">Daftarkan Kontrakan Anda Segera </button></a>
    </div>
  </div>
  <!-- Footer -->
  <div style="background-color: #e3f2fd;">
    <div class="footer container">
      <div class="row">
        <div class="col">
          <div class="d-flex align-self-center align-items-center">
            <img src="./img/logo.png" alt="" style="width: 100px; height: 100px;">
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