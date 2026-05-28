<?php

/////////////////////////////////////////
//  LICENSE GAMES BY     : SOFTGAMINGS //
//  SOURCE CODE BUILD BY : ZULHAYKER   //
//  COPYRIGHT @2024------ALL RESERVED  //   
/////////////////////////////////////////

require 'function/connect.php'; //lokasi file koneksi database

$agent    = "";
$provider = ""; // Cek Provider Code di Backoffice 
$sign     = "";
$endpoint = "https://lvapi.asia/API/Production/connection.do";

$url = "$endpoint?cmd=gamelist&agent_code=$agent&provider_code=$provider&signature=$sign";

$json = file_get_contents($url);
$decode = json_decode($json, true);

$inserted = 0;

for ($i = 0; $i < count($decode['gamelist']); $i++) {
    $data = $decode['gamelist'][$i];

    $game_code = $data['game_code'];
    $game_name = $data['game_name'];
    $game_provider = $data['game_provider'];
    $game_type = $data['game_type'];
    $game_image = $data['game_image'];
    $game_status = $data['game_status'];
    $game_vendor = $data['game_vendor'];

    $sql = "INSERT INTO tb_games (game_code, game_name, game_provider, game_type, game_image, game_status, game_vendor) 
            VALUES ('$game_code', '$game_name', '$game_provider', '$game_type', '$game_image', '$game_status', '$game_vendor')";

    if ($koneksi->query($sql) === TRUE) {
        $inserted++;
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

echo "Successfully inserted $inserted records.";

$koneksi->close();

?>
