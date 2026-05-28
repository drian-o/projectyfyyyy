<?php
/////////////////////////////////////////
//   LICENSE GAMES BY     : SOFTGAMINGS //
//   SOURCE CODE BUILD BY : ZULHAYKER   //
//   COPYRIGHT @2024------ALL RESERVED  //   
/////////////////////////////////////////

error_reporting(0);
ini_set('display_errors', 0);

// Panggil file koneksi database lu
include "function/connect.php"; 

// Mengambil data settingan dari database (Tanpa cek lisensi domain anjing itu lagi)
$query = mysqli_query($koneksi, "SELECT * FROM setting WHERE id = '1'");
if ($query) {
    $row = mysqli_fetch_array($query);
    $title     = isset($row['title']) ? $row['title'] : "Game Online";
    $deskripsi = isset($row['deskripsi']) ? $row['deskripsi'] : "Selamat datang di game online terpercaya";
    $keyword   = isset($row['keyword']) ? $row['keyword'] : "game, online";
    $logo      = isset($row['logo']) ? $row['logo'] : "logo.png";
    $urlweb    = isset($row['urlweb']) ? $row['urlweb'] : "https://projectyfyyyy.onrender.com";
} else {
    $title     = "Game Online";
    $deskripsi = "Selamat datang";
    $keyword   = "game";
    $logo      = "logo.png";
    $urlweb    = "https://projectyfyyyy.onrender.com";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?> </title>                                         
    <meta name="description" content="<?php echo $deskripsi ?>">
    <meta name="keywords" content="<?php echo $keyword ?>">
    <meta property="og:description" content="<?php echo $deskripsi ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo $urlweb ?>">
    <meta property="og:image" content="<?php echo $urlweb ?>/assets/img/<?php echo $logo ?>">
    <meta name="robots" content="index, follow">
    <meta name="author" content="<?php echo $urlweb ?>">
</head>
<body>
    <script>
        var userAgent = navigator.userAgent;
        var urlParams = new URLSearchParams(window.location.search);
        var reffParam = urlParams.get('reff');

        if (userAgent.match(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i)) {
            if (reffParam) {
                window.location.href = "mobile/index.php?page=daftar&reff=" + reffParam;
            } else {
                window.location.href = "mobile/index.php";
            }
        }
        else {
            if (reffParam) {
                window.location.href = "desktop/index.php?page=daftar&reff=" + reffParam; // Pastikan foldernya 'desktop' atau 'dekstop' sesuai isi berkas lu
            } else {
                window.location.href = "desktop/index.php";
            }
        }
    </script>
</body>
</html>
