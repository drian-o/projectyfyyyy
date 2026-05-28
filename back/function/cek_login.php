<?php
ob_start();
session_start();
include '../../function/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi token CSRF
    if (isset($_POST['csrf_token']) && isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] === $_POST['csrf_token']) {
        // Menghapus token CSRF setelah digunakan
        unset($_SESSION['csrf_token']);

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $stmt = $koneksi->prepare("SELECT * FROM tb_admin WHERE username=? AND password=?");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();

            $result = $stmt->get_result();
            $cek = $result->num_rows;

            if ($cek > 0) {
                $_SESSION['username'] = $username;
                $_SESSION['status'] = "login";
                $_SESSION['level'] = "admin";
                header("location:../template/");
                exit(); // Pastikan keluar setelah redirect
            } else {
                header("location:../index.php");
                exit(); // Pastikan keluar setelah redirect
            }

            $stmt->close();
        } else {
            // Jika tidak ada username dan password yang dikirimkan, redirect ke halaman login
            header("location:../../index.php");
            exit(); // Pastikan keluar setelah redirect
        }
    } else {
        // Jika token CSRF tidak valid, tampilkan pesan kesalahan
        die('CSRF token tidak valid.');
    }
} else {
    // Jika bukan metode POST, redirect ke halaman login
    header("location:../../index.php");
    exit(); // Pastikan keluar setelah redirect
}
?>
