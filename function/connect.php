<?php

/////////////////////////////////////////
//  LICENSE GAMES BY     : SOFTGAMINGS //
//  SOURCE CODE BUILD BY : ZULHAYKER   //
//  COPYRIGHT @2024------ALL RESERVED  //   
/////////////////////////////////////////

error_reporting(E_ALL ^ E_DEPRECATED);

$host = "Localhost"; //HOST 
$user = "u263618555_newsoftgaming"; //USERNAME 
$password = "Hayker191205"; //PASSWORD
$database = "u263618555_newsoftgaming"; //DATABASE

$koneksi = mysqli_connect($host,$user,$password,$database) or die(mysqli_error());
if($koneksi){ 
}else{ 
echo "gagal koneksi"; 
}
?>