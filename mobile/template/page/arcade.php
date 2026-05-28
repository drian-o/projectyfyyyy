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
                <div class="page-header">Arcade</div>
                <div class="game-list-container">
                <?php 
                if (empty($id_login)) { 
                    ?>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="Spaceman" alt="Spaceman"
                                src="https://cdn1.epicgames.com/spt-assets/2a3d43b0d0014224a6aec2a36371f276/arcade-fishing-1gu0l.png">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">Arcade Fishing</div>
                                <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="?page=arcade_fishing" >
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="jili" alt="jili"
                                src="https://images.linkcdn.cloud/global/banner/jli_fishing.jpg">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">Arcade jili</div>
                                <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="?page=arcade_jili" >
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
                                <img title="Spaceman" alt="Spaceman"
                                src="https://cdn1.epicgames.com/spt-assets/2a3d43b0d0014224a6aec2a36371f276/arcade-fishing-1gu0l.png">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">Arcade Fishing</div>
                                <div class="game-links main-sekarang-alert">
                                <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('arcade_fishing', '?page=arcade_fishing')">
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="jili" alt="jili"
                                src="https://images.linkcdn.cloud/global/banner/jli_fishing.jpg">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">Arcade jili</div>
                                <div class="game-links main-sekarang-alert">
                                <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('arcade_jili', '?page=arcade_jili')">
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