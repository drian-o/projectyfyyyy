<?php
include "../../function/connect.php";
include '../../main/integration.php';

if(isset($_POST['username']) && !empty($_POST['username'])) {
    $user = mysqli_real_escape_string($koneksi, $_POST['username']);
    
    $q = mysqli_query($koneksi, "SELECT * FROM `tb_user` WHERE username = '$user'") or die(mysqli_error($koneksi));
    $user_data = mysqli_fetch_array($q, MYSQLI_ASSOC);
    
    if($user_data) {
        $extplayer = $user_data['extplayer'];
        $usersID = $user_data['extplayer'];
        
        $qs = mysqli_query($koneksi, "SELECT * FROM `tb_saldo` WHERE id_user = '$usersID'") or die(mysqli_error($koneksi));
        $userbalance = mysqli_fetch_array($qs, MYSQLI_ASSOC);
        $balance_db = $userbalance['active'];
        
        $balance = $ZH->GetBalance($extplayer);
        $json_obj = json_decode($balance, true);
        
        if(isset($json_obj['balance'])) {
            $cash_value = intval($json_obj['balance']);
            
            $updateBalance = mysqli_query($koneksi, "UPDATE `tb_saldo` SET `active` = '$cash_value' WHERE id_user = '$usersID'") or die(mysqli_error($koneksi));
        }
    }
}
?>
