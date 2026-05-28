<?php

/////////////////////////////////////////
//  LICENSE GAMES BY     : SOFTGAMINGS //
//  SOURCE CODE BUILD BY : ZULHAYKER   //
//  COPYRIGHT @2024------ALL RESERVED  //   
/////////////////////////////////////////

require 'function/connect.php'; //lokasi file koneksi database

$agent    = "";
$sign     = "";
$endpoint = "https://lvapi.asia/API/Production/connection.do";

$url = "$endpoint?cmd=providerlist&agent_code=$agent&signature=$sign";

$json = file_get_contents($url);
$decode = json_decode($json, true);

$inserted = 0;

for ($i = 0; $i < count($decode['providerlist']); $i++) {
    $data = $decode['providerlist'][$i];

    $provider_code = $data['provider_code'];
    $provider_name = $data['provider_name'];
    $provider_type = $data['provider_type'];
    $provider_status = $data['provider_status'];
    $provider_image = $data['provider_image'];

    $sql = "INSERT INTO tb_provider (provider_code, provider_name, provider_type, provider_status, provider_image) 
            VALUES ('$provider_code', '$provider_name', '$provider_type', '$provider_status', '$provider_image')";

    if ($koneksi->query($sql) === TRUE) {
        $inserted++;
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

echo "Successfully inserted $inserted records.";

$koneksi->close();

?>
