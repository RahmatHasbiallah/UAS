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

	$kodekomputer = ($data["kodekomputer"]);
	$jeniskomputer = ($data["jeniskomputer"]);
	$harga = ($data["harga"]);
	$lokasi = ($data["lokasi"]);
	

	$query = "INSERT INTO komputer
				VALUES
			  ('', '$kodekomputer', '$jeniskomputer', '$harga', '$lokasi')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}



function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM komputer WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["id"];
	$kodekomputer = ($data["kodekomputer"]);
	$jeniskomputer = ($data["jeniskomputer"]);
	$harga = ($data["harga"]);
	$lokasi = ($data["lokasi"]);
	

	$query = "UPDATE komputer SET
				kodekomputer = '$kodekomputer',
				jeniskomputer = '$jeniskomputer',
				harga = '$harga',
				lokasi = '$lokasi'
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}


function cari($keyword) {
	$query = "SELECT * FROM komputer
				WHERE
			  jeniskomputer LIKE '%$keyword%' OR
			  kodekomputer LIKE '%$keyword%' OR
			  harga LIKE '%$keyword%' OR
			  lokasi LIKE '%$keyword%'
			";
	return query($query);
}


?>
