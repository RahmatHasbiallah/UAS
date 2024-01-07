<?php
include('koneksi.php'); // Hubungkan ke database jika diperlukan

// Set header untuk memberitahu browser bahwa ini adalah file CSV yang akan diunduh
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="daftar_komputer.csv"');

// Buka output file untuk menulis data CSV
$output = fopen('php://output', 'w');

// Header CSV (nama kolom)
fputcsv($output, array('No', 'Kode Komputer', 'Jenis Komputer', 'Harga', 'Lokasi'));

// Ambil data komputer dari database
$data = mysqli_query($koneksi, "SELECT * FROM komputer");

// Tulis data komputer ke dalam file CSV
$no = 1;
while ($d = mysqli_fetch_array($data)) {
    fputcsv($output, array(
        $no++,
        $d['kodekomputer'],
        $d['jeniskomputer'],
        $d['harga'],
        $d['lokasi']
    ));
}

// Tutup file CSV
fclose($output);
?>
