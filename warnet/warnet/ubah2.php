<?php
require 'functions2.php';

// ambil data di URL
$id = $_GET["id"];

// query data komputer berdasarkan id
$mhs = query("SELECT * FROM komputer WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'komputer2.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'komputer2.php';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah datakomputer</title>
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
	<h1>Ubah datakomputer</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<ul>
			<li>
				<label for="kodekomputer">Kode komputer : </label>
				<input type="text" name="kodekomputer" id="kodekomputer" required value="<?= $mhs["kodekomputer"]; ?>">
			</li>
      <li>
        <label for="jeniskomputer">Jenis Komputer</label>
    <select id="jeniskomputer" name="jeniskomputer" value="<?= $mhs["jeniskomputer"]; ?>">
      <option value="Reguler">Reguler</option>
      <option value="VIP">VIP</option>
    </select>
      </li>
      <li>
        <label for="harga">harga :</label>
        <input type="text" name="harga" id="harga"value="<?= $mhs["harga"]; ?>">
      </li>
      <li>
        <label for="lokasi">Lokasi</label>
    <select id="lokasi" name="lokasi" value="<?= $mhs["lokasi"]; ?>">
      <option value="Lantai1">Lantai1</option>
      <option value="Lantai2">Lantai2</option>
    </select>
      </li>
			<li>
				<button type="submit" name="submit">Ubah Data!</button>
				<button type="submit" name="submit"><a href="logout.php">LOGOUT</a></button>
			</li>
		</ul>

	</form>
</body>
</html>
