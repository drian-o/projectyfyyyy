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
                <div class="page-header">Slot</div>
                <div class="game-list-container">
                <?php 
                if (empty($id_login)) { 
                    ?>
                            <div class="game-holder">
                            <div class="game-img">
                                <img title="PRAGMATIC PLAY" alt="PRAGMATIC PLAY"
                                src="https://images.linkcdn.cloud/global/banner/paramatic_20play.jpg">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">PRAGMATIC PLAY</div>
                                <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="?page=slot_pragmatic">
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="PG SOFT" alt="PG SOFT" src="https://images.linkcdn.cloud/global/banner/pgsoftegame.jpg">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">PGSOFT</div>
                                <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="?page=slot_pgsoft">
                                        Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="Microgaming" alt="Microgaming" src="https://images.linkcdn.cloud/global/banner/microgamming.jpg">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">MICROGAMING</div>
                                <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="?page=slot_microgaming">
                                        Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="Habanero" alt="Habanero"
                                src="https://images.linkcdn.cloud/global/banner/habanero.jpg">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">HABANERO</div>
                                <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="?page=slot_habanero">
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="Play Star" alt="Play Star"
                                src="https://images.linkcdn.cloud/global/banner/playstar.jpg">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">PLAY STAR</div>
                                <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="?page=slot_playstar">
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="No limit city" alt="No limit City"
                                src="https://images.linkcdn.cloud/global/banner/nlc.jpg">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">NO LIMIT CITY</div>
                                <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="?page=slot_nolimitcity">
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="Play N Go" alt="Play N Go"
                                src="https://images.linkcdn.cloud/global/banner/playngo.jpg">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">Play N GO</div>
                                <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="?page=slot_playngo">
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                         <div class="game-holder">
                            <div class="game-img">
                                <img title="CQ9" alt="CQ9"
                                src="https://images.linkcdn.cloud/global/banner/cq9.jpg" style="height: 50px">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">CQ9</div>
                                <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="?page=slot_cq9" >
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                         <div class="game-holder">
                            <div class="game-img">
                                <img title="Joker" alt="Joker"
                                src="https://images.linkcdn.cloud/global/banner/joker_20gaming.jpg" style="height: 50px">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">JOKER GAMING</div>
                                <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="?page=slot_joker" >
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                         <div class="game-holder">
                            <div class="game-img">
                                <img title="Spade" alt="Spade"
                                src="https://images.linkcdn.cloud/global/banner/spade.jpg" style="height: 50px">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">SPADE GAMING</div>
                                <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="?page=slot_spadegaming" >
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="ADVANT PLAY" alt="ADVANT PLAY"
                                src="https://images.linkcdn.cloud/global/banner/advantplay.jpg" style="height: 50px">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">ADVANT PLAY</div>
                                <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="?page=slot_advantplay" >
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="EVO PLAY" alt="EVO PLAY"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlUz4sgvaPBD_5_V9drPDE9LzVZM2K0dJn3g&usqp=CAU" style="height: 50px">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">EVO PLAY</div>
                                <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="?page=slot_evoplay" >
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>

                        <div class="game-holder">
                            <div class="game-img">
                                <img title="JILI" alt="JILI"
                                src="https://images.linkcdn.cloud/global/banner/jli.jpg" style="height: 50px">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">JILI</div>
                                <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="?page=slot_jili" >
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="YGGDRASIL" alt="YGGDRASIL"
                                src="<?php echo $urlweb?>/uploads/provider/yggdrasil.webp" style="height: 50px">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">YGGDRASIL</div>
                                <img alt="YGGDRASIL" class="new-provider" src="https://images.linkcdn.cloud/global/nav-addons/new_icon.webp">
                                <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="?page=slot_yggdrasil" >
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="FUN GAMING" alt="FUN GAMING"
                                src="https://play-lh.googleusercontent.com/0DeNTMrKq3nWTlMDUf2IsY0NK7BwK_pQS8YJW2PU2VxPEk8IH0A-QE83yXsFGhQF9w" style="height: 50px">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">FUN GAMING</div>
                                <img alt="YGGDRASIL" class="new-provider" src="https://images.linkcdn.cloud/global/nav-addons/new_icon.webp">
                                <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="?page=slot_fungaming" >
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="BBIN" alt="BBIN"
                                src="<?php echo $urlweb?>/uploads/provider/bbin.webp" style="height: 50px">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">BBIN</div>
                                <img alt="YGGDRASIL" class="new-provider" src="https://images.linkcdn.cloud/global/nav-addons/new_icon.webp">
                                <div class="game-links main-sekarang-alert">
                                    <a class="btn-custom" href="?page=slot_bbin" >
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
                                <img title="PRAGMATIC PLAY" alt="PRAGMATIC PLAY"
                                src="https://images.linkcdn.cloud/global/banner/paramatic_20play.jpg">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">PRAGMATIC PLAY</div>
                                <div class="game-links main-sekarang-alert">
                                <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('slot_pragmatic', '?page=slot_pragmatic')">
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="PG SOFT" alt="PG SOFT" src="https://images.linkcdn.cloud/global/banner/pgsoftegame.jpg">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">PGSOFT</div>
                                <div class="game-links main-sekarang-alert">
                                <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('slot_pgsoft', '?page=slot_pgsoft')">
                                        Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="Microgaming" alt="Microgaming" src="https://images.linkcdn.cloud/global/banner/microgamming.jpg">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">MICROGAMING</div>
                                <div class="game-links main-sekarang-alert">
                                <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('slot_microgaming', '?page=slot_microgaming')">
                                        Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="Habanero" alt="Habanero"
                                src="https://images.linkcdn.cloud/global/banner/habanero.jpg">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">HABANERO</div>
                                <div class="game-links main-sekarang-alert">
                                <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('slot_habanero', '?page=slot_habanero')">
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="Play Star" alt="Play Star"
                                src="https://images.linkcdn.cloud/global/banner/playstar.jpg">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">PLAY STAR</div>
                                <div class="game-links main-sekarang-alert">
                                <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('slot_playstar', '?page=slot_playstar')">
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="No limit city" alt="No limit City"
                                src="https://images.linkcdn.cloud/global/banner/nlc.jpg">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">NO LIMIT CITY</div>
                                <div class="game-links main-sekarang-alert">
                                <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('slot_nolimitcity', '?page=slot_nolimitcity')">
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="Play N Go" alt="Play N Go"
                                src="https://images.linkcdn.cloud/global/banner/playngo.jpg">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">Play N GO</div>
                                <div class="game-links main-sekarang-alert">
                                <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('slot_playngo', '?page=slot_playngo')">
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                         <div class="game-holder">
                            <div class="game-img">
                                <img title="CQ9" alt="CQ9"
                                src="https://images.linkcdn.cloud/global/banner/cq9.jpg" style="height: 50px">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">CQ9</div>
                                <div class="game-links main-sekarang-alert">
                                <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('slot_cq9', '?page=slot_cq9')">
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                         <div class="game-holder">
                            <div class="game-img">
                                <img title="Joker" alt="Joker"
                                src="https://images.linkcdn.cloud/global/banner/joker_20gaming.jpg" style="height: 50px">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">JOKER GAMING</div>
                                <div class="game-links main-sekarang-alert">
                                <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('slot_joker', '?page=slot_joker')">
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                         <div class="game-holder">
                            <div class="game-img">
                                <img title="Spade" alt="Spade"
                                src="https://images.linkcdn.cloud/global/banner/spade.jpg" style="height: 50px">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">SPADE GAMING</div>
                                <div class="game-links main-sekarang-alert">
                                <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('slot_spadegaming', '?page=slot_spadegaming')">
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="ADVANT PLAY" alt="ADVANT PLAY"
                                src="https://images.linkcdn.cloud/global/banner/advantplay.jpg" style="height: 50px">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">ADVANT PLAY</div>
                                <div class="game-links main-sekarang-alert">
                                <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('slot_advantplay', '?page=slot_advantplay')">
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="EVO PLAY" alt="EVO PLAY"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlUz4sgvaPBD_5_V9drPDE9LzVZM2K0dJn3g&usqp=CAU" style="height: 50px">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">EVO PLAY</div>
                                <div class="game-links main-sekarang-alert">
                                <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('slot_evoplay', '?page=slot_evoplay')">
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="JILI" alt="JILI"
                                src="https://images.linkcdn.cloud/global/banner/jli.jpg" style="height: 50px">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">JILI</div>
                                <div class="game-links main-sekarang-alert">
                                <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('slot_jili', '?page=slot_jili')">
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="YGGDRASIL" alt="YGGDRASIL"
                                src="<?php echo $urlweb?>/uploads/provider/yggdrasil.webp" style="height: 50px">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">YGGDRASIL</div>
                                <div class="game-links main-sekarang-alert">
                                <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('slot_yggdrasil', '?page=slot_yggdrasil')">
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="FUN GAMING" alt="FUN GAMING"
                                src="https://play-lh.googleusercontent.com/0DeNTMrKq3nWTlMDUf2IsY0NK7BwK_pQS8YJW2PU2VxPEk8IH0A-QE83yXsFGhQF9w" style="height: 50px">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">FUN GAMING</div>
                                <div class="game-links main-sekarang-alert">
                                <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('slot_fungaming', '?page=slot_fungaming')">
                                    Main Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-holder">
                            <div class="game-img">
                                <img title="BBIN" alt="BBIN"
                                src="<?php echo $urlweb?>/uploads/provider/bbin.webp" style="height: 50px">
                            </div>
                            <div class="game-bottom">
                                <div class="game-name">BBIN</div>
                                <div class="game-links main-sekarang-alert">
                                <a class="btn-custom" href="javascript:;" onclick="gameMaintenance('slot_bbin', '?page=slot_bbin')">
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