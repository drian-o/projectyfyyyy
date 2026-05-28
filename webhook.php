<?php

/////////////////////////////////////////
//  LICENSE GAMES BY     : SOFTGAMINGS //
//  SOURCE CODE BUILD BY : ZULHAYKER   //
//  COPYRIGHT @2024------ALL RESERVED  //   
/////////////////////////////////////////

require 'function/connect.php';

// Enable error reporting for debugging purposes
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Read the raw input data
$json = file_get_contents("php://input");

$file = fopen("debug.json", "w");
fwrite($file, $json);
fclose($file);

// Convert JSON to an associative array
$data = json_decode($json, true);

// Check if data is valid JSON
if ($data !== null) {
    $count = count($data);
    for ($i = 0; $i < $count; $i++) {
        // Capture parameters
        $param = $data[$i];
        $session = $param['session'];
        $username = $param['username'];
        $game_code = $param['game_code'];
        $game_provider = $param['game_provider'];
        $bet = $param['bet'];
        $win = $param['win'];
        $turnover = $param['turnover'];
        $betdate = $param['betdate'];
        $game_vendor = $param['vendor'];

        // Validate data in the database
        $cek_to = mysqli_query($koneksi, "SELECT * FROM tb_history WHERE session = '$session'");
        if (mysqli_num_rows($cek_to) > 0) {
            // If session data already exists, update the data
            $update_query = "
                UPDATE tb_history
                SET username = '$username', game_code = '$game_code', game_provider = '$game_provider', bet = '$bet', win = '$win', turnover = '$turnover', betdate = '$betdate', game_vendor = '$game_vendor'
                WHERE session = '$session'
            ";
            if (mysqli_query($koneksi, $update_query)) {
                echo 'Sukses memperbarui TO untuk session ' . $session . '<br>';
            } else {
                echo 'Gagal memperbarui TO untuk session ' . $session . '. Error: ' . mysqli_error($koneksi) . '<br>';
            }
        } else {
            // If session data does not exist, insert into the database
            $insert_query = "
                INSERT INTO tb_history (session, username, game_code, game_provider, bet, win, turnover, betdate, game_vendor)
                VALUES ('$session', '$username', '$game_code', '$game_provider', '$bet', '$win', '$turnover', '$betdate', '$game_vendor')
            ";
            if (mysqli_query($koneksi, $insert_query)) {
                echo 'Sukses menyimpan TO untuk session ' . $session . '<br>';
            } else {
                echo 'Gagal menyimpan TO untuk session ' . $session . '. Error: ' . mysqli_error($koneksi) . '<br>';
            }
        }
    }
} else {
    echo 'Data JSON tidak valid.<br>';
}

?>
