<?php
// Mengaktifkan session pada PHP
session_start();

// Menghubungkan PHP dengan koneksi database
include 'koneksi.php';

// Menangkap data yang dikirim dari form registrasi
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];

// Menyiapkan statement untuk mencegah SQL injection
$stmt = mysqli_prepare($koneksi, "INSERT INTO user (nama, username, password, level) VALUES (?, ?, ?, 'pegawai')");
mysqli_stmt_bind_param($stmt, 'sss', $nama, $username, $password);

// Eksekusi statement
$register = mysqli_stmt_execute($stmt);

// Periksa keberhasilan registrasi
if ($register) {
    // Jika registrasi berhasil, lanjutkan dengan proses login atau alihkan ke halaman lain
    header("location: daftar_pegawai.php");
} else {
    // Jika registrasi gagal, alihkan kembali ke halaman registrasi dengan pesan kesalahan
    header("location: register.php?pesan=gagal");
}

// Tutup statement dan koneksi
mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>
