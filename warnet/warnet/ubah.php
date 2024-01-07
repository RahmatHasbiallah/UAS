<?php
require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM pegawai WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'halaman_admin.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'halaman_admin.php';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah data mahasiswa</title>
</head>
 <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    h1 {
      text-align: center;
    }

    form {
      max-width: 600px;
      margin: 20px auto;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    ul {
      list-style-type: none;
      padding: 0;
    }

    li {
      margin-bottom: 15px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input,
    select {
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
      margin-top: 5px;
    }

    button {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    button a {
      color: #fff;
      text-decoration: none;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
<body>
	<h1>Ubah data mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
		<ul>
			<li>
				<label for="kodepegawai">Kode pegawai : </label>
				<input type="text" name="kodepegawai" id="kodepegawai" required value="<?= $mhs["kodepegawai"]; ?>">
			</li>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" value="<?= $mhs["nama"]; ?>">
			</li>
			<li>
				<label for="alamat">Alamat :</label>
				<input type="text" name="alamat" rows="4" value="<?= $mhs["alamat"]; ?>"></textarea>
			</li>
			<li>
			<label for="tanggallahir">Tanggal Lahir</label>
   		    <input type="date" id="tanggallahir" name="tanggallahir" value="<?= $mhs["tanggallahir"]; ?>">
			</li>
			<li>
				<label for="jeniskelamin">Jenis Kelamin</label>
    		<select id="jeniskelamin" name="jeniskelamin" value="<?= $mhs["jeniskelamin"]; ?>">
      		<option value="pria">pria</option>
      		<option value="wanita">wanita</option>
    		</select>
			</li>
			<li>
				<label for="nohp">nohp :</label>
				<input type="text" name="nohp" id="nohp" value="<?= $mhs["nohp"]; ?>">
			</li>
			<li>
				<label for="email">email :</label>
				<input type="text" name="email" id="email" value="<?= $mhs["email"]; ?>">
			</li>
			<li>
				<label for="posisi">Posisi</label>
    	<select id="posisi" name="posisi" value="<?= $mhs["posisi"]; ?>">
      		<option value="kasir">Kasir</option>
      		<option value="ob">Ob</option>
      		<option value="teknisi">Teknisi</option>
    	</select>
			</li>
			<li>
				<label for="gambar">Gambar :</label> <br>
				<img src="img/<?= $mhs['gambar']; ?>" width="40"> <br>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Ubah Data!</button>
				<button type="submit" name="submit"><a href="logout.php">LOGOUT</a></button>
			</li>
		</ul>

	</form>
</body>
</html>
