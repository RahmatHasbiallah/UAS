<?php 
session_start();
 
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
}

require 'functions.php';
$pegawai = query("SELECT * FROM pegawai");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $pegawai = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hasbi</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
</head>
<style type="text/css">
  /* Add your custom styles here */
body {
  padding-top: 20px; /* Adjust based on the height of your navbar */
}

footer {
  position: fixed;
  bottom: 0;
  width: 100%;
}
th {
        background-color: lightgreen;
        color: black;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
}

</style>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="logout.php">Logout</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="halaman_pemilik.php">Beranda</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="komputer3.php">Komputer</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="keuangan3.php">Keuangan</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Content -->
  <div class="container mt-4">
    <h1>Daftar Pegawai</h1>
<center>
  <!-- Tambahkan ikon tambah -->
    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off">
        <button type="submit" name="cari" class="btn btn-primary"><i class="fas fa-search"></i> Cari!</button> 
    </form>
    <br/>
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
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
        </thead>
        <tbody>
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
                <td><img src="img/<?= $row["gambar"]; ?>" width="70" height="85"></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p><a href="cetak.php" target="_blank" class="btn btn-primary">CETAK</a>
      <a href="unduh.php" class="btn btn-primary">UNDUH</a></p>
  </div>
      </br>
  <br/>
</br>


  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2023 Hasbi </p>
  </footer>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
