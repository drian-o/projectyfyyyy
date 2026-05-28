<?php
include 'function/connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$bot_token = '6750230488:AAHpCKOx9wwvPV6_luhUKZyryybiAEIV0As'; // MOHON JANGAN DI UBAH BAGIAN

$TeleID = '@fuckingshit19'; // HANYA INI YANG DI UBAH

function kirimPesanTelegram($chat_id, $pesan, $bot_token) {
    $url = "https://api.telegram.org/bot$bot_token/sendMessage";
    $data = array('chat_id' => $chat_id, 'text' => $pesan);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

$query_deposit = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE status = 'Pending' AND transaksi = 'Top Up' ORDER BY id DESC LIMIT 1");
$data_deposit = mysqli_fetch_assoc($query_deposit);

if ($data_deposit) {
    $id_user_deposit = $data_deposit['id_user'];
    $query_user_deposit = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE extplayer = '$id_user_deposit'");
    $data_user_deposit = mysqli_fetch_assoc($query_user_deposit);

    $chat_id_deposit = $TeleID;
    $pesan_deposit = $data_user_deposit['username'] . " Melakukan Top Up Saldo Senilai Rp. " . number_format($data_deposit['total']) . ". Silakan konfirmasi."; // Pesan yang akan dikirim
    kirimPesanTelegram($chat_id_deposit, $pesan_deposit, $bot_token);
}

$query_withdraw = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE status = 'Pending' AND transaksi = 'Withdraw' ORDER BY id DESC LIMIT 1");
$data_withdraw = mysqli_fetch_assoc($query_withdraw);

if ($data_withdraw) {
    $id_user_withdraw = $data_withdraw['id_user'];
    $query_user_withdraw = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE extplayer = '$id_user_withdraw'");
    $data_user_withdraw = mysqli_fetch_assoc($query_user_withdraw);

    $chat_id_withdraw = $TeleID;
    $pesan_withdraw = $data_user_withdraw['username'] . " Melakukan Penarikan Saldo Senilai Rp. " . number_format($data_withdraw['total']) . ". Silakan konfirmasi."; // Pesan yang akan dikirim
    kirimPesanTelegram($chat_id_withdraw, $pesan_withdraw, $bot_token);
}
?>
