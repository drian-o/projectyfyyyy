<?php
error_reporting(0);
ini_set('display_errors', 0);

$host = "b7do8xx2dh5kezbxp7dj-mysql.services.clever-cloud.com"; 
$user = "uomezv2z4qcb83vr"; 
$password = "MIIhphhlZevgkoiaixbO"; 
$database = "b7do8xx2dh5kezbxp7dj";

// Pakai fungsi standar ini, langsung tembus tanpa loading!
$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Gagal konek database");
}
?>
