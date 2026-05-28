<!-- Account Balance -->
<main id="main-route">
    <div class="main-content slot-game">
        <div class="container">
            <div class="slot-game__container">
                <div class="page-header">ADVANT PLAY</div>
                <div class="component-pills-tab" id="game-filter">
                    <div class="filter-tab" onclick="filterGameSelection('all')">All Games</div>
                    <div class="filter-tab" onclick="filterGameSelection('video-slots')"> Video Slots</div>
                    <div class="filter-tab" onclick="filterGameSelection('bonus-buy-slot-games')"> Bonus Buy Slot Games</div>
                    <div class="filter-tab" onclick="filterGameSelection('classic-slots')"> Classic Slots</div>
                    <div class="slot-game__search-cont">
                        <div class="game-search">
                            <input class="form-control-sm" type="text" onkeyup="searchGames(this)" placeholder="Cari ...">
                            <a href="#" class="search-btn">
                                <i class="fas fa-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="slot-game-list">
                    <?php
                    $id_provider = 'AD';
                    $categories = 'SL';
                    $user = $_SESSION['username'];
                    $getUser = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$user'");
                    $infouser = mysqli_fetch_array($getUser);
                    $extplayer = $infouser['extplayer'];
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_games WHERE game_provider = '$id_provider' AND game_type = '$categories'");

                    function generateRandomRTP() {
                        $minRTP = 60;
                        $maxRTP = 99;
                        return rand($minRTP, $maxRTP);
                    }

                    $displayedGames = array();

                    while ($row = mysqli_fetch_array($query)) {
                        if (in_array($row['game_code'], $displayedGames)) {
                            continue; // Skip if game already displayed
                        }
                        
                        if (!isset($_SESSION['rtp_update_time']) || (time() - $_SESSION['rtp_update_time']) > 1800) { // 30 minutes = 1800 seconds
                        $_SESSION['rtp_values'] = [];
                        while ($row = mysqli_fetch_array($query)) {
                            $_SESSION['rtp_values'][$row['game_code']] = generateRandomRTP();
                        }
                        $_SESSION['rtp_update_time'] = time();
                        }
                        
                        $displayedGames[] = $row['game_code'];

                        if (isset($_SESSION['username'])) {
                            $que = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE extplayer = '$extplayer' AND status_game = 'offgame'");
                            $cek = mysqli_num_rows($que);
                            $link_url = ($cek > 0) ? 'index.php?pesan=22' : (($id_login == '') ? 'index.php?pesan=28' : $urlweb . "/main/PlayGame.php?p=" . $extplayer . "&id=" . $row['game_code']);
                        ?>
                            <div class="slot-game-item slot-tg" style="display: block;">
                                <div class="slot-game-img">
                                    <img src="<?php echo $row['game_image'] ?>" style="">
                                </div>
                                <div class="slot-game-name"><?php echo $row['game_name']; ?></div>
                                <div class="slot-game-hover">
                                    <a class="main sekarang main-sekarang-alert" href="<?php echo $link_url ?>">Main Sekarang</a>
                                </div>
                            </div>
                        <?php } else { ?>
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
<script>
    function filterGameSelection(category) {
        var slotGameItems = document.querySelectorAll('.slot-game-item');

        slotGameItems.forEach(function(gameItem) {
            if (category === 'all') {
                gameItem.style.display = 'block';
            } else {
                var gameType = gameItem.dataset.category;
                gameItem.style.display = (gameType === category) ? 'block' : 'none';
            }
        });
    }

    function searchGames(input) {
        var searchTerm = input.value.toLowerCase();
        var slotGameList = document.querySelectorAll('.slot-game-item');

        slotGameList.forEach(function(gameItem) {
            var gameName = gameItem.querySelector('.slot-game-name').textContent.toLowerCase();
            gameItem.style.display = gameName.includes(searchTerm) ? 'block' : 'none';
        });
    }
     setInterval(function() {
            location.reload();
        }, 1800000);
</script>
