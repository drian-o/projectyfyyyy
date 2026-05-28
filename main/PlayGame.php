<?php

/////////////////////////////////////////
//  LICENSE GAMES BY     : SOFTGAMINGS //
//  SOURCE CODE BUILD BY : ZULHAYKER   //
//  COPYRIGHT @2024------ALL RESERVED  //   
/////////////////////////////////////////

ob_start();
include "../function/connect.php";
include "integration.php";

error_reporting(0);
ini_set('display_errors', 0);

if(isset($_GET['id']) && isset($_GET['p'])) {
    $getGamesid = $_GET['id'];
    $getSession = $_GET['p'];

    $getbalance = json_decode($ZH->GetBalance($getSession), true);
    if(isset($getbalance)) { // Tambahkan pemeriksaan null di sini
        var_dump($getbalance);

        if(isset($getbalance['msg']) && $getbalance['msg'] == 'Username Tidak Terdaftar') {
            $ZH->Create($getSession);
        }

        $openurl = json_decode($ZH->OpenGame($getSession, $getGamesid), true);

        if(isset($openurl) && isset($openurl['status']) && $openurl['status'] == "success" && isset($openurl['gameUrl'])) {
            header('Location:'.$openurl['gameUrl']);
            exit;
        } else {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
            echo "<script>";
            echo "Swal.fire({
                icon: 'error',
                title: 'Gagal membuka permainan',
                text: '".(isset($openurl['msg']) ? $openurl['msg'] : "")."', // Tambahkan pemeriksaan null di sini
                confirmButtonText: 'OK'
                }).then(function() {
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                });";
                echo "</script>";
            exit;
        }
    } else {
        die("Data saldo tidak ditemukan.");
    }
} else {
    die("ID atau session tidak ditemukan.");
}
?>
