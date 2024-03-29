<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "warnet");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}
 

function tambah($data) {
	global $conn;

	$kodepegawai = ($data["kodepegawai"]);
	$nama = ($data["nama"]);
	$alamat = ($data["alamat"]);
	$tanggallahir = ($data["tanggallahir"]);
	$jeniskelamin = ($data["jeniskelamin"]);
	$nohp = ($data["nohp"]);
	$email = ($data["email"]);
	$posisi = ($data["posisi"]);

	// upload gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO pegawai
				VALUES
			  ('', '$kodepegawai', '$nama', '$alamat', '$tanggallahir', '$jeniskelamin', '$nohp', '$alamat', '$posisi', '$gambar')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}




function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM pegawai WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["id"];
	$kodepegawai = ($data["kodepegawai"]);
	$nama = ($data["nama"]);
	$alamat = ($data["alamat"]);
	$tanggallahir = ($data["tanggallahir"]);
	$jeniskelamin = ($data["jeniskelamin"]);
	$nohp = ($data["nohp"]);
	$email = ($data["email"]);
	$posisi = ($data["posisi"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	
	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}
	

	$query = "UPDATE pegawai SET
				kodepegawai = '$kodepegawai',
				nama = '$nama',
				alamat = '$alamat',
				tanggallahir = '$tanggallahir',
				jeniskelamin = '$jeniskelamin',
				nohp = '$nohp',
				alamat = '$alamat',
				posisi = '$posisi',
				gambar = '$gambar'
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}


function cari($keyword) {
	$query = "SELECT * FROM pegawai
				WHERE
			  nama LIKE '%$keyword%' OR
			  kodepegawai LIKE '%$keyword%' OR
			  nohp LIKE '%$keyword%' OR
			  posisi LIKE '%$keyword%'
			";
	return query($query);
}


?>
