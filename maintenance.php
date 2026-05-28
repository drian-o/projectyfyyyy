<?php

/////////////////////////////////////////
//  LICENSE GAMES BY     : SOFTGAMINGS //
//  SOURCE CODE BUILD BY : ZULHAYKER   //
//  COPYRIGHT @2024------ALL RESERVED  //   
/////////////////////////////////////////

include_once 'function/connect.php';
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
$query = mysqli_prepare($koneksi, "SELECT * FROM tb_web");
mysqli_stmt_execute($query);
$result = mysqli_stmt_get_result($query);
$data = mysqli_fetch_assoc($result);
if (!$data) {
    die("Data web tidak ditemukan.");
}

$status_maintenance = $data['mtweb'];
$logo = isset($data['logo']) ? $data['logo'] : '';
$title = htmlspecialchars($data['title'] ?? '');
$pisah = explode('|', $title);
$judul = isset($pisah[0]) ? trim($pisah[0]) : '';

if ($status_maintenance === 'not') {
    header('Location: index.php');
    exit;
}
header(($_SERVER['SERVER_PROTOCOL'] ?? 'HTTP/1.0') . ' 503 Service Temporarily Unavailable', true, 503);
header('Retry-After: 3600');
header('X-Powered-By:');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $title; ?></title>
<style type="text/css">
* {
  box-sizing: border-box;
}
html, body {
  height: 100%;
  margin: 0;
}
main {
  height: 100%;
  margin: 0 auto;
  max-width: 700px;
  padding: 30px;
  display: table;
  text-align: center;
}
main > * {
  display: table-cell;
  vertical-align: middle;
}
body {
  font: 20px Helvetica, sans-serif;
  color: #333;
}
@keyframes blink {
  50% { color: transparent; }
}
.dot {
  animation: 1s blink infinite;
}
.dot:nth-child(2) {
  animation-delay: 250ms;
}
.dot:nth-child(3) {
  animation-delay: 500ms;
}
</style>
</head>
<body>
<main>
<div>
  <?php if (!empty($logo)): ?>
    <img src="assets/img/<?php echo $logo ?>" alt="Logo Web">
  <?php endif; ?>
  <h1><?php echo $judul ?></h1>
  <h1>Maintenance sedang berlangsung<span class="dot">.</span><span class="dot">.</span><span class="dot">.</span></h1>
  <p>Maaf atas ketidaknyamanan ini, namun saat ini kami sedang melakukan beberapa pemeliharaan. Silakan periksa kembali nanti.</p>
</div>
</main>
</body>
</html>
