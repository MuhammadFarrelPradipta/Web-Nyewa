<?php include "./header.php"; ?>
<!--  -->
<div class="m-5" style="min-height: 300px ; ">
    <h4 class="text-center">Laporan </h4>
    <form method="post" action="./laporan_print.php">
        <div class="form-group">
            <label>Dari Tanggal</label>
            <input type="date" name="dari" class="form-control">

        </div>
        <div class="form-group">
            <label>Sampai Tanggal</label>
            <input type="date" name="sampai" class="form-control">

        </div>
        <br>
        <div class="form-group">
            <input type="submit" value="Cetak Laporan" name="cari" class="btn btn-sm btn-primary">

        </div>
    </form><br>

    <?php
    include "../koneksi.php";

    ?>
    <h4 class="text-center">Laporan Transaksi</h4>
    <table class="table mx-5">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Penyewa</th>
                <th scope="col">Nama Kos </th>
                <th scope="col">Tanggal Pertemuan </th>
                <th scope="col">Tanggal Mulai Sewa </th>
                <th scope="col">Tanggal Selesai Sewa </th>
                <th scope="col">Jangka Waktu Sewa (Bulan) </th>
                <th scope="col">Total Biaya (Rupiah) </th>
                <th scope="col">Status Transaksi </th>
            </tr>
        </thead>
        <tbody>
            <?php $number = 1;
            $tampilPeg    = mysqli_query($conn, "SELECT * FROM pemilik WHERE id_pemilik='$_SESSION[id_pemilik]'");
            $peg          = mysqli_fetch_array($tampilPeg);
            $ttable = $conn->query("SELECT * FROM transaksi WHERE pemilik_properti = '$peg[nama_pemilik]' AND tanggal_mulai_sewa BETWEEN '$_POST[dari]' AND '$_POST[sampai]'");
            while ($pecah = $ttable->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $pecah["nama_transaksi"]; ?></td>
                    <td><?php echo $pecah["nama_kos"]; ?></td>
                    <td><?php echo  $pecah["tanggal_pertemuan"]; ?></td>
                    <td><?php echo $pecah["tanggal_mulai_sewa"]; ?></td>
                    <td><?php echo $pecah["tanggal_selesai_sewa"]; ?></td>
                    <td><?php echo $pecah["jangka_waktu"]; ?> </td>
                    <td><?php echo "Rp. " . number_format($pecah["biaya_transaksi"])  ?> </td>
                    <td>
                        <?php if ($pecah["status_transaksi"] == '0') { ?>
                            Transaksi Belum Dilakukan
                        <?php } else if ($pecah["status_transaksi"] == "1") { ?>
                            Transaksi Telah Selesai
                        <?php } else { ?>
                            Transaksi Dibatalkan
                        <?php } ?>
                    </td>
                </tr>
                <?php $number++; ?>
            <?php }
            ?>
        </tbody>
    </table>
    <h4 class="text-center">Laporan Jumlah Pengunjung Terakhir</h4>
    <table class="table mx-5">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kos/Kontrakan</th>
                <th scope="col">Foto </th>
                <th scope="col">Lokasi </th>
                <th scope="col">Harga (perbulan) </th>
                <th scope="col">Jenis Properti </th>
                <th scope="col">Jumlah Pengunjung </th>
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
                    <td><?php echo $pecah["jumlah_pengunjung"]; ?> Pengunjung</td>
                </tr>
                <?php $number++; ?>
            <?php }
            ?>
        </tbody>
    </table>
</div>
<?php include "./footer.php" ?>