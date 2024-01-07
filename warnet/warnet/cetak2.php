<?php 
    session_start();
 
    // cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['level']==""){
        header("location:index.php?pesan=gagal");
    }
 
    ?>
    <?php 
require 'functions.php';
$komputer = query("SELECT * FROM komputer");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $komputer = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Pemilik</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<h1>Daftar Komputer</h1>
<center>
<br>
<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
        <th>Kode Komputer</th>
        <th>Jenis Komputer</th>
        <th>Harga</th>
        <th>Lokasi</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach( $komputer as $row ) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $row["kodekomputer"]; ?></td>
        <td><?= $row["jeniskomputer"]; ?></td>
        <td><?= $row["harga"]; ?></td>
        <td><?= $row["lokasi"]; ?></td>
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