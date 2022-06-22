<?php
include "../koneksi.php";
session_start();
if (!isset($_SESSION['pemilik'])) {
    echo "<script>location='login.php'</script>";
    header('location:masuk.php');
    exit();
}

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
                <a class="navbar-brand fw-bold" href="index.php" style="color: #4e5aa8;">NYEWA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="./bantuan.php">Bantuan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pesan.php">Pesan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./properti.php">Properti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./transaksi.php">Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./laporan.php">Laporan</a>
                        </li>
                    </ul>
                    <?php if (isset($_SESSION['pemilik'])) : ?>
                        <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <a href="keluar.php" style="color: white; text-decoration: none;">Keluar</a>
                        </button>
                    <?php else : ?>
                        <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            MASUK
                        </button>
                        <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            DAFTAR
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
                                        <img src="./img/2.png" alt="" style="width: 100px; height: 100px;">
                                        <a href="" style="text-decoration: none; color:black;">Pencari</a>
                                    </div>
                                    <div class="modal-body">
                                        <img src="./img/3.jpg" alt="" style="width: 100px; height: 100px;">
                                        <a href="" style="text-decoration: none; color:black;">Pemilik</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Masuk sebagai </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="./img/2.png" alt="" style="width: 100px; height: 100px;">
                                        <a href="./pencari/masuk.php" style="text-decoration: none; color:black;">Pencari</a>
                                    </div>
                                    <div class="modal-body">
                                        <img src="./img/3.jpg" alt="" style="width: 100px; height: 100px;">
                                        <a href="./pemilik/masuk.php" style="text-decoration: none; color:black;">Pemilik</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </nav>
    </div>