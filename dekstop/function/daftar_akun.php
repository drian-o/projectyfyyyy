<?php
ob_start();
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$id_login = isset($_SESSION['id']) ? $_SESSION['id'] : '';

include '../../function/connect.php';
include '../../main/integration.php';
include '../../vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php';

if ($id_login == '') {
    if (isset($_POST['submit'])) {
        // Memeriksa apakah token CSRF ada dan valid
        if(isset($_POST['csrf_token']) && $_SESSION['csrf_token'] === $_POST['csrf_token']) {
            // Menghapus token CSRF setelah digunakan
            unset($_SESSION['csrf_token']);
            
        $config = HTMLPurifier_Config::createDefault();
        $hayker = new HTMLPurifier($config);
        
        $username = strtolower(mysqli_real_escape_string($koneksi, $_POST['username']));
        $password = md5(mysqli_real_escape_string($koneksi, $_POST['password']));
        $konfirmasi_password = md5(mysqli_real_escape_string($koneksi, $_POST['konfirmasi_pass']));
        $email = filter_var(mysqli_real_escape_string($koneksi, $_POST['email']), FILTER_SANITIZE_EMAIL);
        $no_whatsapp = mysqli_real_escape_string($koneksi, $_POST['no_whatsapp']);
        $bank = mysqli_real_escape_string($koneksi, $_POST['bank']);
        $pemilik_rekening = mysqli_real_escape_string($koneksi, $_POST['pemilik_rekening']);
        $norek = mysqli_real_escape_string($koneksi, $_POST['norek']);
        $refferal = mysqli_real_escape_string($koneksi, $_POST['refferal']);
        $captcha_asli = mysqli_real_escape_string($koneksi, $_POST['captcha_asli']);
        $captcha = mysqli_real_escape_string($koneksi, $_POST['captcha']);
        $status = 'Active';
        $level = 'user';
        $user = str_replace('', '', $username);
        $pemilik_rekening = str_replace(array('&','<','>','/',':','"','=','*','{','}'), array('&amp;','&lt;','&gt;','&sol;','&colon;','&quot;','&equals;','&ast;','&lcub;','&rcub;'), $pemilik_rekening);
        $kode_unik = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890'), 0, 4);
        $extplayer = 'ab' . $user . $kode_unik;
        $game_status = 'ongame';

        // Bersihkan input dari potensi injeksi skrip
        $username = strip_tags(htmlspecialchars($hayker->purify($username, ENT_QUOTES, 'UTF-8')));
        $email = strip_tags(htmlspecialchars($hayker->purify($email, ENT_QUOTES, 'UTF-8')));
        $no_whatsapp = strip_tags(htmlspecialchars($hayker->purify($no_whatsapp, ENT_QUOTES, 'UTF-8')));
        $pemilik_rekening = strip_tags(htmlspecialchars($hayker->purify($pemilik_rekening, ENT_QUOTES, 'UTF-8')));
        $norek = strip_tags(htmlspecialchars($hayker->purify($norek, ENT_QUOTES, 'UTF-8')));
        $refferal = strip_tags(htmlspecialchars($hayker->purify($refferal, ENT_QUOTES, 'UTF-8')));

        $cek_username = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username' ");
        $liat_username = mysqli_num_rows($cek_username);

        if ($liat_username == 1) {
            header("Location: ../index.php?page=daftar&pesan=30");
            exit();
        } elseif ($captcha != $captcha_asli) {
            header("Location: ../index.php?page=daftar&pesan=2");
            exit();
        } else {
            if (stripos($username, 'script') !== false || stripos($email, 'script') !== false  || stripos($no_whatsapp, 'script') !== false || stripos($pemilik_rekening, 'script') !== false || stripos($norek, 'script') !== false || stripos($refferal, 'script') !== false) {
                ?>
                <script type="text/javascript">
                    alert('Wah Ada Heker');
                    window.location = "https://www.youtube.com/watch?v=_KK6kzd_gCg";
                </script>
                <?php
                exit();
            }
            if ($password == $konfirmasi_password) {
                $createAccountMember = $ZH->Create($extplayer);
                $query = mysqli_prepare($koneksi, "INSERT INTO tb_user (extplayer, username, password, nama_lengkap, email, no_hp, level, refferal, status, status_game) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                mysqli_stmt_bind_param($query, "ssssssssss", $extplayer, $username, $password, $pemilik_rekening, $email, $no_whatsapp, $level, $extplayer, $status, $game_status);
                mysqli_stmt_execute($query);

                // Check if insertion was successful
                if (mysqli_stmt_affected_rows($query) == 1) {
                    $query2 = mysqli_query($koneksi, "INSERT INTO tb_saldo (id, id_user, active, transfer, pending, payout) VALUES (NULL, '$extplayer', '0','0','0','0') ");
                    $query3 = mysqli_query($koneksi, "INSERT INTO tb_bank (id, icon, nama_bank, nomor_rekening, nama_pemilik, id_user, level) VALUES (NULL,'', '$bank', '$norek', '$pemilik_rekening', '$extplayer','') ");

                    $query5 = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE refferal = '$refferal' ");
                    $cek_reff = mysqli_num_rows($query5);

                    if ($cek_reff > 0 && $refferal != "") {
                        $query4 = mysqli_query($koneksi, "INSERT INTO tb_refferal (id, user_refferal, keterangan, bonus, id_user) VALUES (NULL, '$refferal','Downline','0','$extplayer') ");
                    }
                        header("Location:../index.php?pesan=3");
                        exit();
                    } else {
                        // Redirect with error message
                        header("Location: ../index.php?page=daftar");
                        exit();
                    }
                } else {
                    header("Location: ../index.php?page=daftar&pesan=4");
                    exit();
                }
            }
        } else {
            // Jika token CSRF tidak valid, arahkan kembali ke halaman pendaftaran
            header("Location: ../index.php?page=daftar");
            exit();
        }
    } else {
        header("Location: ../index.php?page=daftar&pesan=5");
        exit();
    }
} else {
    header("Location:../index.php");
    exit();
}
?>