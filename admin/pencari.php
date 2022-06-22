<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Data Pencari Kos/Kontrakan</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor_hp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../koneksi.php";
            $number = 1; ?>
            <?php $ambil = $conn->query("SELECT * FROM pencari"); ?>
            <?php while ($pecah = $ambil->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $pecah["nama_pencari"]; ?></td>
                    <td><?php echo $pecah["email_pencari"]; ?></td>
                    <td><?php echo $pecah["no_pencari"]; ?></td>
                    <td>
                        <a href="index.php?halaman=hapuspencari&id=<?php echo $pecah['id_pencari'] ?>" class="btn-primary btn">Hapus Account</a>
                    </td>
                </tr>
                <?php $number++; ?>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>