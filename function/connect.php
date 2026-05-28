<?php

/////////////////////////////////////////
//  LICENSE GAMES BY     : SOFTGAMINGS //
//  SOURCE CODE BUILD BY : ZULHAYKER   //
//  COPYRIGHT @2024------ALL RESERVED  //   
/////////////////////////////////////////

error_reporting(E_ALL ^ E_DEPRECATED);

$host = "mysql-d8b9423-adrnsyah18-eb26.l.aivencloud.com:20528"; //HOST 
$user = "avnadmin"; //USERNAME 
$password = "AVNS_Kd07zXk7c_uNqEYPGn9"; //PASSWORD
$database = "defaultdb"; //DATABASE

$koneksi = mysqli_connect($host,$user,$password,$database) or die(mysqli_error());
if($koneksi){ 
}else{ 
echo "gagal koneksi"; 
}
?>
