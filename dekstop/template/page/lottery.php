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
    <div class="main-content game">
        <div class="container">
            <div class="game__list">
                <div class="page-header">Lottery</div>
                <div class="game-list-container">
                <?php 
                if (empty($id_login)) { 
                    ?>
                            <div class="game-holder">
                                <div class="game-img">
                                    <img title="NEXT4D" alt="NEXT4D"
                                    src="<?php echo $urlweb?>/uploads/provider/nex4d.png">
                                </div>
                                <div class="game-bottom">
                                    <div class="game-name">
                                        NEXT4D
                                    </div>
                                    <div class="game-links main-sekarang-alert">
                                        <a class="btn-custom" href="?page=lottery_next4d">
                                            Main Sekarang</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="game-holder">
                                <div class="game-img">
                                    <img title="QQKENO" alt="QQKENO"
                                    src="<?php echo $urlweb?>/uploads/provider/qqkeno.jpg">
                                </div>
                                <div class="game-bottom">
                                    <div class="game-name">
                                        QQKENO
                                    </div>
                                    <div class="game-links main-sekarang-alert">
                                        <a class="btn-custom" href="?page=lottery_qqkeno">
                                            Main Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }else{
                        ?>
                        <script>
                        var gameMaintenanceStatus = <?php echo json_encode($game_maintenance_status); ?>;
                        </script>
                            <div class="game-holder">
                                <div class="game-img">
                                    <img title="NEXT4D" alt="NEXT4D"
                                    src="<?php echo $urlweb?>/uploads/provider/nex4d.png">
                                </div>
                                <div class="game-bottom">
                                    <div class="game-name">
                                        NEXT4D
                                    </div>
                                    <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('lottery_next4d', '?page=lottery_next4d')">
                                            Main Sekarang</a>
                                    </div>
                                </div>
                            </div>
                            <div class="game-holder">
                                <div class="game-img">
                                    <img title="QQKENO" alt="QQKENO"
                                    src="<?php echo $urlweb?>/uploads/provider/qqkeno.jpg">
                                </div>
                                <div class="game-bottom">
                                    <div class="game-name">
                                        QQKENO
                                    </div>
                                    <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('lottery_qqkeno', '?page=lottery_qqkeno')">
                                            Main Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                    ?>

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