<?php include "./header.php";
?>
<!-- Content -->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card m-2 mt-5">
        <div class="card-header">
          Properti
        </div>
        <div class="card-body">
          <p class="card-text">Mendaftarkan properti berupa kost dan kontrakan yang anda miliki</p>
          <a href="properti.php" class="btn btn-primary">Lihat</a>
          <?php include "../koneksi.php";
          $tampilPeg    = mysqli_query($conn, "SELECT * FROM pemilik WHERE id_pemilik='$_SESSION[id_pemilik]'");
          $peg          = mysqli_fetch_array($tampilPeg);
          $take = $conn->query("SELECT * FROM properti WHERE milik_properti = '$peg[nama_pemilik]'");
          ?>
          <i class="bi bi-house-fill"> <?php echo mysqli_num_rows($take) ?> Properti Telah Terdaftar</i>
        </div>
      </div>
    </div>
    <?php $ambil = $conn->query("SELECT * FROM pengajuan WHERE kepada_pengajuan = '$peg[nama_pemilik]' "); ?>
    <div class="col">
      <div class="card m-2 mt-5">
        <div class="card-header">
          Pesanan
        </div>
        <div class="card-body">
          <p class="card-text">Pesan dari orang-orang yang ingin menyewa kost atau mengontrak rumah anda</p>
          <a href="./pesan.php" class="btn btn-primary">Lihat</a>
          <i class="bi bi-chat-left-text-fill"> <?php echo mysqli_num_rows($ambil) ?> Orang telah memesan properti anda</i>
        </div>
      </div>
    </div>
  </div>
  <?php $trans = $conn->query("SELECT * FROM transaksi WHERE pemilik_properti = '$peg[nama_pemilik]'"); ?>
  <div class="row">
    <div class="col">
      <div class="card m-2 mt-5">
        <div class="card-header">
          Transaksi
        </div>
        <div class="card-body">
          <p class="card-text">Mencatat transaksi yang telah dilakukan kepada penyewa secara langsung </p>
          <a href="./transaksi.php" class="btn btn-primary">Lihat</a>
          <i class="bi bi-cart-check-fill"> <?php echo mysqli_num_rows($trans) ?> Transaksi telah dilakukan</i>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card m-2 mt-5">
        <div class="card-header">
          Laporan
        </div>
        <div class="card-body">
          <p class="card-text">Laporan transaksi yang ingin anda lihat/cetak serta jumlah pengunjung properti anda </p>
          <a href="./laporan.php" class="btn btn-primary">Lihat</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
$tampilPeg    = mysqli_query($conn, "SELECT * FROM pemilik WHERE id_pemilik='$_SESSION[id_pemilik]'");
$peg          = mysqli_fetch_array($tampilPeg);
?>
<div class="card m-5" style="width: 30rem;">
  <div class="card-header">
    Identitas Pemilik Kos/Kontrakan
  </div>
  <div class="card-body">
    <p class="card-text">
    <table>
      <tr>
        <th>Nama </th>
        <th> : </th>
        <td><?php echo $peg['nama_pemilik'] ?> </td>
      </tr>
      <tr>
        <th>Email </th>
        <th> : </th>
        <td><?php echo $peg['email_pemilik'] ?> </td>
      </tr>
      <tr>
        <th>Nomor Telephone </th>
        <th> : </th>
        <td><?php echo $peg['no_pemilik'] ?> </td>
      </tr>
    </table>



    </p>
  </div>
</div>
<!-- Footer -->
<?php
include "./footer.php"
?>

<!-- Button trigger modal -->