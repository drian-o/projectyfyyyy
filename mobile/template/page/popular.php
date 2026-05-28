<!-- Account Balance -->
<?php
// Mendapatkan status maintenance per game
$result = mysqli_query($koneksi, "SELECT * FROM game_maintenance");
$game_maintenance_status = [];
while ($row = mysqli_fetch_assoc($result)) {
    $game_maintenance_status[$row['game_code']] = $row['is_maintenance'];
}
?>
<main id="main-route">
    <div class="main-content slot-game">
        <div class="container">
            <div class="slot-game__container">
                <div class="page-header">POPULAR</div>
                <div class="slot-game-list">
                    <?php
                    $id_provider = 'PR';
                    $categories = 'SL';
                    $user = $_SESSION['username'];
                    $getUser = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$user'");
                    $infouser = mysqli_fetch_array($getUser);
                    $extplayer = $infouser['extplayer'];
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_games WHERE game_type = '$categories' limit 12");
                    function generateRandomRTP()
                    {
                        $minRTP = 60;
                        $maxRTP = 99;

                        // Menghasilkan nilai acak antara 80 dan 96
                        $randomRTP = rand($minRTP, $maxRTP);

                        return $randomRTP;
                    }
                    $randomRTP = $_SESSION['rtp_values'][$row['game_code']] = generateRandomRTP();

                    while ($row = mysqli_fetch_array($query)) {
                        if (isset($_SESSION['username'])) {
                          $que = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE extplayer = '$extplayer' AND status_game = 'offgame' ");

                          $cek = mysqli_num_rows($que);

                          if($cek > 0){
                            $link_url = 'index.php?pesan=22';
                        }else{
                            if ($id_login == '') {
                                $link_url = 'index.php?pesan=28';
                            }else{
                                $link_url = $urlweb . "/main/PlayGame.php?p=".$extplayer."&id=".$row['game_code'];
                            }

                        }
                        ?>
                        <div class="slot-game-item slot-tg" style="display: block;">
                            <div class="slot-game-img">
                                <img src="<?php echo $row['game_image'] ?>" style="">
                            </div>
                            <script>
                            var gameMaintenanceStatus = <?php echo json_encode($game_maintenance_status); ?>;
                            </script>
                            <div class="slot-game-name"><?php echo $row['game_name']; ?></div>
                            <div class="slot-game-hover">
                                <a class="main sekarang main-sekarang-alert" href="javascript:;" onclick="gameMaintenance('slot_pragmatic', '<?php echo $link_url ?>')">
                                    Main Sekarang
                                </a>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                                <div class="slot-game-item slot-tg xbonus-buy-slot-games show" style="">
                                <div class="slot-game-img">
                                    <img src="<?php echo $row['game_image'] ?>" style="">
                                </div>
                                <div class="slot-game-name"><?= $row['game_name'] ?></div>
                                <div class="progress baradjust">
                                    <?php
                                    $randomRTP = $_SESSION['rtp_values'][$row['game_code']] = generateRandomRTP();
                                    $progressColor = ($randomRTP < 70) ? 'bg-danger' : (($randomRTP < 85) ? 'bg-primary' : 'bg-success');
                                    ?>
                                    <div class="progress-bar progress-bar-striped progress-bar-animated <?php echo $progressColor; ?>" id="progress-rtp" role="progressbar" style="width:<?= $randomRTP ?>%;" aria-valuenow="<?= $randomRTP ?>" aria-valuemin="0" aria-valuemax="100">RTP <?php echo $randomRTP; ?>%</div>
                                </div>
                                <div class="slot-game-hover">
                                    <a class="main sekarang main-sekarang-alert" onclick='gameAlert()'>Main Sekarang</a>
                                </div>
                            </div>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>

</main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function gameMaintenance(gameCode, url) {
        if (gameMaintenanceStatus[gameCode] === '1') {
            Swal.fire({
                title: 'Maintenance',
                text: 'Game ini sedang dalam perbaikan. Harap coba lagi nanti.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        } else {
            window.location.href = url;
        }
    }
</script>