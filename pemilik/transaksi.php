<?php include "./header.php" ?>
<!-- Content -->
<div style="min-height:400px ;">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama </th>
                <th scope="col">Nama Kost/Kontrakan </th>
                <th scope="col">Tanggal Pertemuan </th>
                <th scope="col">Tanggal Mulai Sewa </th>
                <th scope="col">Tanggal Selesai Sewa </th>
                <th scope="col">Jangka Waktu Sewa </th>
                <th scope="col">Biaya </th>
                <th scope="col">Status </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $number = 1;
            $tampilPeg    = mysqli_query($conn, "SELECT * FROM pemilik WHERE id_pemilik='$_SESSION[id_pemilik]'");
            $peg          = mysqli_fetch_array($tampilPeg);
            $take = $conn->query("SELECT * FROM transaksi WHERE pemilik_properti = '$peg[nama_pemilik]'");
            while ($pecah = $take->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $pecah["nama_transaksi"]; ?></td>
                    <td><?php echo $pecah["nama_kos"]; ?></td>
                    <td><?php echo $pecah["tanggal_pertemuan"]; ?></td>
                    <td><?php echo $pecah["tanggal_mulai_sewa"]; ?></td>
                    <td><?php echo $pecah["tanggal_selesai_sewa"]; ?></td>
                    <td><?php echo $pecah["jangka_waktu"]; ?></td>
                    <td><?php echo $pecah["biaya_transaksi"]; ?></td>
                    <td>
                        <?php if ($pecah['status_transaksi'] == "0") { ?>
                            <a c;ass href="berhasil_transaksi.php?id=<?php echo $pecah['id_transaksi'] ?>" class="btn-primary btn mb-1">Transaksi Berhasil</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Transaksi Dibatalkan
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Apakah yakin transaksi dibatalkan ?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a href="batalkan_transaksi.php?id=<?php echo $pecah['id_transaksi'] ?>">
                                                    <button name="yes" type="button" class="btn btn-primary">Saya yakin</button>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else if ($pecah['status_transaksi'] == "1") { ?>
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
    <button type="button" class="btn btn-primary m-3"><a href="tambahtransaksi.php" style="text-decoration: none; color: white;"> Tambah Transaksi </a></button>
</div>


<?php include "./footer.php" ?>