<?php
// Mengaktifkan session pada PHP
session_start();

// Menghubungkan PHP dengan koneksi database
include 'koneksi.php';

// Menangkap data yang dikirim dari form login
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password_from_form = mysqli_real_escape_string($koneksi, $_POST['password']);

// Menyeleksi data user dengan username yang sesuai
$login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
$data = mysqli_fetch_assoc($login);

// Mengecek apakah username ditemukan dalam database
if ($data) 
    // Mengecek apakah password cocok dengan password di database
    if (password_verify($password_from_form, $data['password'])) 
        // Buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $data['level'];

        // Redirect ke halaman dashboard sesuai dengan level user
        if ($data['level'] == "admin") {
            header("location: halaman_admin.php");
        } elseif ($data['level'] == "pegawai") {
            header("location: halaman_pegawai.php");
        } elseif ($data['level'] == "pemilik") {
            header("location: halaman_pemilik.php");
    } else {
    // Username tidak ditemukan
    header("location: index.php?pesan=gagal&error=Username tidak ditemukan");

    } 
?>
