<?php 
    session_start();
 
    // cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['level']==""){
        header("location:index.php?pesan=gagal");
    }
 
    ?>
    <?php 
require 'functions.php';
$keuangan = query("SELECT * FROM keuangan");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $keuangan = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Pemilik</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<h1>Daftar Keuangan</h1>
<center>
<br>
<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
        <th>Keterangan</th>
        <th>Pemasukan</th>
        <th>Pengeluaran</th>
        
    </tr>

    <?php $i = 1; ?>
    <?php foreach( $keuangan as $row ) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $row["keterangan"]; ?></td>
        <td><?= $row["pemasukan"]; ?></td>
        <td><?= $row["pengeluaran"]; ?></td>
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