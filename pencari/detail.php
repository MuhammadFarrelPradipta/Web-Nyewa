<?php
include "../koneksi.php";
session_start();
if (!isset($_SESSION['pencari'])) {
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
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
                                        <img src="./img/3.jpg" alt="" style="width: 100px; height: 100px;">
                                        <a href="../pemilik/masuk.php" style="text-decoration: none; color:black;">Pemilik</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </nav>
    </div>
    <!-- Content -->
    <!-- <?php

            $find_count = mysqli_query($conn, "SELECT * FROM pengunjung JOIN properti WHERE properti.id_properti = pengunjung.id_pengunjung");
            while ($row = mysqli_fetch_assoc($find_count)) {
            }

            ?> -->
    <?php
    $ambil = $conn->query("SELECT * FROM properti WHERE id_properti ='$_GET[id]'");
    while ($bagian = $ambil->fetch_assoc()) :
        $current_count = $bagian['jumlah_pengunjung'];
        $new_count = $current_count + 1;
        $update_count = mysqli_query($conn, "UPDATE properti SET jumlah_pengunjung = '" . $new_count . "' WHERE id_properti ='$_GET[id]'");
    ?>
        <div class="m-5 row">
            <div class="col"></div>
            <div class="card col-md-10">
                <img src="../foto_properti/<?php echo $bagian['foto_properti'] ?>" class="card-img-top" alt="...">
                <div class="card-body" style="height: 500px;">
                    <h4 class="card-text"><?php echo $bagian['nama_properti'] ?></h4>
                    <i class="bi bi-geo-alt-fill"><?php echo $bagian['lokasi_properti'] ?></i><br>
                    <i class="bi bi-people-fill">Jumlah Pengunjung : <?php echo $bagian['jumlah_pengunjung'] ?></i>
                    <h5 class="mt-5"><?php echo $bagian['jenis_properti'] ?> ini dikelola oleh <?php echo $bagian['milik_properti'] ?></h5>
                    <?php
                    $telp = $conn->query("SELECT * FROM pemilik JOIN properti ON properti.milik_properti = pemilik.nama_pemilik");
                    $phone = $telp->fetch_assoc();
                    ?>
                    <i class="bi bi-telephone-fill"><?php echo $phone['no_pemilik'] ?></i>
                    <br>
                    <i class="bi bi-cash-coin">Biaya <?php echo  $bagian['jenis_properti'] ?></i>
                    <table>
                        <tr>
                            <th>Biaya per Bulan</th>
                            <th>:</th>
                            <td>Rp.<?php echo number_format($bagian["harga_properti"]) ?></td>
                        </tr>
                        <tr>
                            <th>Biaya per 6 Bulan</th>
                            <th>:</th>
                            <td>Rp.<?php echo number_format($bagian["harga_properti"] * 6) ?></td>
                        </tr>
                        <tr>
                            <th>Biaya per Tahun</th>
                            <th>:</th>
                            <td>Rp.<?php echo number_format($bagian["harga_properti"] * 12) ?></td>
                        </tr>
                    </table><br>
                    <div class="card position-absolute bottom-0 end-0 m-3">
                        <h5 class="card-header">Ajukan Sewa</h5>
                        <div class="card-body">
                            <form action="detail.php" method="post">
                                <input type="date" name="tanggals" style="width:200px;" class="mb-1">
                                <input type="number" class="mb-1" name="bulans" style="width:200px;"> Bulan <br>
                                Kepada Pemilik <?php echo $bagian['jenis_properti'] ?>
                                <input type="text" class="form-control" name="miliks" value="<?php echo $bagian['milik_properti'] ?>"><br>
                                Nama Penyewa
                                <input type="text" class="form-control" name="penyewa" placeholder="Tulis nama lengkap anda"><br>
                                <textarea type="text" name="pesans" placeholder="Tinggalkan pesan" class="mb-5 p-1" style="width:405px; height: 80px;"></textarea><br>
                                <button name="kirims" class="btn btn-primary">Kirim Pesanan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    <?php endwhile; ?>

    <?php
    if (isset($_POST['kirims'])) {
        $conn->query("INSERT INTO pengajuan 
                (tanggal_pengajuan,pesan_pengajuan,sewa_pengajuan,kepada_pengajuan,dari_pengajuan)
                VALUES ('$_POST[tanggals]','$_POST[pesans]','$_POST[bulans]','$_POST[miliks]','$_POST[penyewa]') ");

        echo "<div class='alert alert-info'>Pesan Telah Terkirim</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
    }
    ?>