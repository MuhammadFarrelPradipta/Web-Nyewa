<?php
include "../koneksi.php";
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
        <img src="../img/logo.png" alt="" style="width: 100px; height: 100px;">
        <a class="navbar-brand fw-bold" href="../index.php" style="color: #4e5aa8;">NYEWA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./bantuan.php">Bantuan</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Cari Iklan
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../pencari/kos.php">Kos</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="../pencari/kontrakan.php">Kontrakan</a></li>
              </ul>
            </li>
          </ul>
          <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            MASUK
          </button>

          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Daftar sebagai </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <img src="../img/2.png" alt="" style="width: 100px; height: 100px;">
                  <a href="" style="text-decoration: none; color:black;">Pencari</a>
                </div>
                <div class="modal-body">
                  <img src="../img/3.jpg" alt="" style="width: 100px; height: 100px;">
                  <a href="" style="text-decoration: none; color:black;">Pemilik</a>
                </div>
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
                  <a href="../pencari/masuk.php" style="text-decoration: none; color:black;">Pencari</a>
                </div>
                <div class="modal-body">
                  <img src="../img/3.jpg" alt="" style="width: 100px; height: 100px;">
                  <a href="./masuk.php" style="text-decoration: none; color:black;">Pemilik</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <!-- Login -->
  <div class="container my-5 p-4 border border-primary" style="background-color: #e3f2fd;">
    <form action="" method="post">
      <div class="login row justify-content-md-center">
        <h4 class="text-center">Masuk Sebagai Pemilik</h4>
        <div class="col-md-8">
          <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          <button name="masuk" class="btn btn-outline-primary mt-5" style="width: 500px;"><a href="" style="text-decoration:none; ">Masuk</a></button>
        </div>
        <h5 class="text-center m-3">Belum punya akun? silahkan daftar terlebih dahulu</h5>
        <button type="button" class="btn btn-outline-primary " style="width: 100px;"><a href="daftar.php" style="text-decoration:none; ">Daftar</a></button>
      </div>
    </form>
    <?php
    if (isset($_POST['masuk'])) {
      $email = $_POST['email'];
      $password = md5($_POST['pass']);
      $ambil = $conn->query("SELECT * FROM pemilik WHERE email_pemilik = '$email' AND password_pemilik = '$password'");
      $akun = $ambil->num_rows;
      if ($akun == 1) {
        $akuns = $ambil->fetch_assoc();
        $_SESSION['pemilik'] = $akuns;
        $_SESSION['id_pemilik'] = $akuns['id_pemilik'];
        echo "<script>alert('Berhasil melakukan login')</script>";
        echo "<script>location='index.php'</script>";
      } else {
        echo "<script>alert('Gagal melakukan login')</script>";
        echo "<script>location='masuk.php'</script>";
      }
    }
    ?>
  </div>
</body>

</html>