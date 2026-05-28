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
                <div class="page-header">Poker</div>
                <div class="game-list-container">
                <?php 
                if (empty($id_login)) { 
                    ?>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="FUN GAMING" alt="FUN GAMING"
                                src="https://play-lh.googleusercontent.com/0DeNTMrKq3nWTlMDUf2IsY0NK7BwK_pQS8YJW2PU2VxPEk8IH0A-QE83yXsFGhQF9w" style="height: 50px">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">FUN GAMING POKER</div>
                                <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="?page=poker_FunGamingPoker" >
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
                                <img title="FUN GAMING" alt="FUN GAMING"
                                src="https://play-lh.googleusercontent.com/0DeNTMrKq3nWTlMDUf2IsY0NK7BwK_pQS8YJW2PU2VxPEk8IH0A-QE83yXsFGhQF9w" style="height: 50px">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">FUN GAMING POKER</div>
                                <div class="game-links main-sekarang-alert">
                                <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('poker_FunGamingPoker', '?page=poker_FunGamingPoker')">
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