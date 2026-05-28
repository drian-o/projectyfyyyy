<?php

/////////////////////////////////////////
//  LICENSE GAMES BY     : SOFTGAMINGS //
//  SOURCE CODE BUILD BY : ZULHAYKER   //
//  COPYRIGHT @2024------ALL RESERVED  //   
/////////////////////////////////////////

include 'function/connect.php';

$agent  = "";
$sign   = "";

$url    = "https://lvapi.asia/API/Production/connection.do?cmd=history&agent_code=$agent&signature=$sign";

$json = file_get_contents($url);
$decode = json_decode($json, true);

if ($decode === null) {
    die("Failed to decode JSON.");
}

$inserted = 0;

foreach ($decode['history'] as $data) {
    $history_trx = $data['trx_id'];
    $history_username = $data['username'];
    $history_game = $data['game_code'];
    $history_provider = $data['game_provider'];
    $history_bet = $data['bet_money'];
    $history_win = $data['win_money'];
    $history_turnover = $data['turnover'];
    $history_created = $data['created'];
    $agent_code = $data['agent_code'];

    $sql = "INSERT INTO tb_history (trx_id, username, game_code, game_provider, bet_money, win_money, turnover, created, agent_code) 
            VALUES ('$history_trx', '$history_username', '$history_game', '$history_provider', '$history_bet', '$history_win', '$history_turnover', '$history_created', '$agent_code')";

    if ($koneksi->query($sql) === TRUE) {
        $inserted++;
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

echo "Successfully inserted $inserted records.";

$koneksi->close();
?>
