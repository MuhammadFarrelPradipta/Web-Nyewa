<?php
include "../koneksi.php";
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
                            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./bantuan.php">Bantuan</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Cari Iklan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./kos.php">Kos</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./kontrakan.php">Kontrakan</a></li>
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
                                    <h5 class="modal-title" id="staticBackdropLabel">Masuk sebagai </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="../img/2.png" alt="" style="width: 100px; height: 100px;">
                                    <a href="../pencari/masuk.php" style="text-decoration: none; color:black;">Pencari</a>
                                </div>
                                <div class="modal-body">
                                    <img src="../img/3.jpg" alt="" style="width: 100px; height: 100px;">
                                    <a href="../pemilik/masuk.php" style="text-decoration: none; color:black;">Pemilik</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- DAFTAR -->
    <div class="container my-5 p-4 border border-primary" style="background-color: #e3f2fd;">
        <div class="login row justify-content-md-center">
            <h4 class="text-center">Daftar Sebagai Pencari</h4>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-2"> </div>
                    <div class="col-md-8">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Nama" name="nama">
                            <label for="floatingInput">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="08XXXXXX" name="no">
                            <label for="floatingInput">No.HP</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <hr>
                        <button name="daftar" class="btn btn-outline-primary " style="width: 500px;"><a href="" style="text-decoration:none; ">Daftar</a></button>
                    </div>
                </div>
            </form>
            <?php
            if (isset($_POST["daftar"])) {
                $nama = $_POST["nama"];
                $telp = $_POST["no"];
                $email = $_POST["email"];
                $password = md5($_POST["pass"]);

                $ambil = $conn->query("SELECT * FROM pencari WHERE email_pencari = '$email' ");
                $cocok = $ambil->num_rows;

                if ($cocok == 1) {
                    echo "<script>alert('Gagal mendaftar karena email telah digunakan');</script>";
                    echo "<script>location='daftar.php';</script>";
                } else {
                    $conn->query("INSERT INTO pencari (nama_pencari,password_pencari,email_pencari,no_pencari) VALUES ('$nama','$password','$email','$telp')");
                    echo "<script>alert('Sukses mendaftar silahkan melakukan login');</script>";
                    echo "<script>location='masuk.php';</script>";
                }
            }


            ?>
        </div>
    </div>
    <?php include "../pemilik/footer.php" ?>
</body>

</html>