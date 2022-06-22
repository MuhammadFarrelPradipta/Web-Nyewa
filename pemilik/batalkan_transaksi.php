<?php
include "../koneksi.php";
if ($_POST['yes'] = 'Saya yakin') {
    $conn->query("UPDATE transaksi SET status_transaksi = '2'  WHERE id_transaksi='$_GET[id]'");

    echo "<div class='alert alert-info'> Data Telah Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=transaksi.php'>";
}
?>
<!--  -->