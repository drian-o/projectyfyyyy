<?php 

/////////////////////////////////////////
//  LICENSE GAMES BY     : SOFTGAMINGS //
//  SOURCE CODE BUILD BY : ZULHAYKER   //
//  COPYRIGHT @2024------ALL RESERVED  //   
/////////////////////////////////////////

session_start();
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');

$id_login = $_SESSION['id'] ?? null;
$extplayer = $_SESSION['extplayer'] ?? null;

include 'function/connect.php'; 

$query_maintenance = mysqli_query($koneksi, "SELECT mtweb FROM tb_web WHERE id = 1");
$maintenance = mysqli_fetch_array($query_maintenance);

if ($maintenance['mtweb'] == 'active') {
    header("Location: maintenance.php");
    exit();
}

$query1 = mysqli_query($koneksi, "SELECT active FROM tb_saldo WHERE id_user = '$extplayer' ");
$liat = mysqli_fetch_array($query1);

$query2 = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id = '$id_login' ");
$punya_user = mysqli_fetch_array($query2);

$query1010 = mysqli_query($koneksi, "SELECT * FROM tb_contact");
$ssa = mysqli_fetch_array($query1010);

$whatsapp = htmlspecialchars($ssa['no_whatsapp'] ?? '');
$id_livechat = htmlspecialchars($ssa['id_livechat'] ?? '');

$cuk = mysqli_query($koneksi, "SELECT * FROM tb_web");
$cek_web = mysqli_fetch_array($cuk);
$urlweb = htmlspecialchars($cek_web['url'] ?? '');
$logo = htmlspecialchars($cek_web['logo'] ?? '');
$min_depo = htmlspecialchars($cek_web['min_depo'] ?? '');
$min_wd = htmlspecialchars($cek_web['min_wd'] ?? '');
$icon = htmlspecialchars($cek_web['icon_web'] ?? '');
$title = htmlspecialchars($cek_web['title'] ?? '');
$deskripsi = htmlspecialchars($cek_web['deskripsi'] ?? '');
$keyword = htmlspecialchars($cek_web['keyword'] ?? '');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
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
        // Mendeteksi user agent
        var userAgent = navigator.userAgent;

        // Mengecek apakah variabel 'reff' ada dalam URL
        var urlParams = new URLSearchParams(window.location.search);
        var reffParam = urlParams.get('reff');

        // Jika user agent mengindikasikan perangkat seluler
        if (userAgent.match(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i)) {
            if (reffParam) {
                window.location.href = "mobile/index.php?page=daftar&reff=" + reffParam;
            } else {
                window.location.href = "mobile/index.php";
            }
        }
        // Jika bukan perangkat seluler
        else {
            if (reffParam) {
                window.location.href = "dekstop/index.php?page=daftar&reff=" + reffParam;
            } else {
                window.location.href = "dekstop/index.php";
            }
        }
    </script>
</body>
</html>
