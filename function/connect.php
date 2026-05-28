<?php
error_reporting(0);
ini_set('display_errors', 0);

$host = "mysql-d8b9423-adrnsyah18-eb26.l.aivencloud.com"; 
$user = "avnadmin"; 
$password = "AVNS_Kd07zXk7c_uNqEYPGn9"; 
$database = "defaultdb";
$port = 20528;

// 1. Inisialisasi MySQLi
$koneksi = mysqli_init();

// 2. Set bendera SSL (Biar PHP tahu harus konek lewat jalur aman)
mysqli_ssl_set($koneksi, NULL, NULL, NULL, NULL, NULL);

// 3. Lakukan koneksi dengan menyertakan port dan SSL
if (!mysqli_real_connect($koneksi, $host, $user, $password, $database, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>
