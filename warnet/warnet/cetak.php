<?php 
    session_start();
 
    // cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['level']==""){
        header("location:index.php?pesan=gagal");
    }
 
    ?>
    <?php 
require 'functions.php';
$pegawai = query("SELECT * FROM pegawai");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $pegawai = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Pemilik</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<h1>Daftar Pegawai</h1>
<center>
<br>
<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
        <th>Kode Pegawai</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>No Hp</th>
        <th>Email</th>
        <th>Posisi</th>
        <th>Gambar</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach( $pegawai as $row ) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $row["kodepegawai"]; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["alamat"]; ?></td>
        <td><?= $row["tanggallahir"]; ?></td>
        <td><?= $row["jeniskelamin"]; ?></td>
        <td><?= $row["nohp"]; ?></td>
        <td><?= $row["email"]; ?></td>
        <td><?= $row["posisi"]; ?></td>
        <td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
    
</table>
</center>
<script>
    window.print();
    </script>
</body>
</html>

</body>
</html>