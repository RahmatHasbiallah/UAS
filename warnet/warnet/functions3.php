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

	$keterangan = ($data["keterangan"]);
	$pemasukan = ($data["pemasukan"]);
	$pengeluaran = ($data["pengeluaran"]);
	

	$query = "INSERT INTO keuangan
				VALUES
			  ('', '$keterangan', '$pemasukan', '$pengeluaran')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}



function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM keuangan WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["id"];
	$keterangan = ($data["keterangan"]);
	$pemasukan = ($data["pemasukan"]);
	$pengeluaran = ($data["pengeluaran"]);
	

	$query = "UPDATE keuangan SET
				keterangan = '$keterangan',
				pemasukan = '$pemasukan',
				pengeluaran = '$pengeluaran'
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}


function cari($keyword) {
	$query = "SELECT * FROM keuangan
				WHERE
			  pemasukan LIKE '%$keyword%' OR
			  keterangan LIKE '%$keyword%' OR
			  pengeluaran LIKE '%$keyword%'
			";
	return query($query);
}


?>
