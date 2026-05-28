<?php
include "../../function/connect.php";

if(isset($_POST['username']) && !empty($_POST['username'])) {
    $user = mysqli_real_escape_string($koneksi, $_POST['username']);
    
    $q = mysqli_query($koneksi, "SELECT * FROM `tb_user` WHERE username = '$user'") or die(mysqli_error($koneksi));
    $user_data = mysqli_fetch_array($q, MYSQLI_ASSOC);
    
    if($user_data) {
        $usersID = $user_data['id_user'];
        $extplayer = $user_data['extplayer'];
        
        $sql = mysqli_query($koneksi, "SELECT * FROM `tb_saldo` WHERE id_user = '$usersID'") or die(mysqli_error($koneksi));
        $userbalance = mysqli_fetch_array($sql, MYSQLI_ASSOC);
        
        if ($userbalance) {
            $saldo = $userbalance['active'];
            
            echo json_encode(array("active" => $saldo));
        }
    }
}
?>
