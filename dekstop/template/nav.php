<?php
// Mendapatkan status maintenance per game
$result = mysqli_query($koneksi, "SELECT * FROM game_maintenance");
$game_maintenance_status = [];
while ($row = mysqli_fetch_assoc($result)) {
    $game_maintenance_status[$row['game_code']] = $row['is_maintenance'];
}
?>
<?php 
if (empty($id_login)) { 
    ?>
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <div class="nav-item">
                <a class="nav-link" href="?page=home">
                  <i class="fas fa-home" style="font-size: 130%"></i>
                </a>
              </div>
              <div class="nav-item">
                <a class="nav-link" href="?page=slot" style="cursor: pointer;">
                  Slot
                  <i class="fas fa-caret-down"></i>
                </a>
                <div class="nav-item__game">
                  <div class="container text-center justify-content-center">

                    <div class="game-item ">
                      <a href="?page=slot_pragmatic">
                        <img title="Pragmatic Play" alt="Pragmatic Play" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/pp.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                      <a href="?page=slot_microgaming">
                        <img title="Microgaming" alt="Microgaming" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/microgaming.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                      <a href="?page=slot_habanero">
                        <img title="Habanero" alt="Habanero" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/habanero.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                      <a href="?page=slot_pgsoft">
                        <img title="PG Soft" alt="PG Soft" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/pgsoft.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                      <a  href="?page=slot_playngo">
                        <img title="Play N Go" alt="Play N Go" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/playngo.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                      <a href="?page=slot_playstar">
                        <img title="PLAYSTAR" alt="PLAYSTAR" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/playstar.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                      <a href="?page=slot_nolimitcity">
                        <img title="NO LIMIT CITY" alt="NO LIMIT CITY" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/nolimitcity.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                      <a href="?page=slot_cq9">
                        <img title="CQ9" alt="CQ9" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/sbocq9.webp?v=20240430" width="120px">

                      </a>
                    </div>

                    <div class="game-item ">
                      <a href="?page=slot_joker">
                        <img title="JOKER" alt="JOKER" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/joker.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                      <a href="?page=slot_spadegaming">
                        <img title="SPADEGAMING" alt="SPADEGAMING" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/spadegaming.webp?v=20240430" width="120px">

                      </a>
                    </div>

                    <div class="game-item ">
                      <a href="?page=slot_advantplay">
                        <img title="ADVANTPLAY" alt="ADVANTPLAY" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/advantplay.webp?v=20240430" width="120px">

                      </a>
                    </div>

                     <div class="game-item ">
                      <a href="?page=slot_evoplay">
                        <img title="EVOPLAY" alt="EVOPLAY" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/evoplay_slot.png?v=0.1" width="180px">

                      </a>
                    </div>
                    <div class="game-item ">
                      <a href="?page=slot_fungaming">
                        <img title="FUNGAMING" alt="FUNGAMING" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/fungaming.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                      <a href="?page=slot_yggdrasil">
                        <img title="YGGDRASIL" alt="YGGDRASIL" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/yggdrasil.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                      <a href="?page=slot_jili">
                        <img title="JILI" alt="JILI" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/jili.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                      <a href="?page=slot_bbin">
                        <img title="BBIN" alt="BBIN" src="<?php echo $urlweb?>/uploads/provider/bbin.png" width="120px">
                      </a>
                    </div>

                  </div>
                </div>

              </div>
              <div class="nav-item">
                <a class="nav-link" href="?page=livegame" style="cursor: pointer;">
                  <img src="https://images.linkcdn.cloud/global/nav-addons/hot_category.png" width="30" height="12" style="position: absolute; z-index:999; animation: 0.25s ease 0s infinite alternate none running beat; top:0px;">
                  Live Game
                  <i class="fas fa-caret-down"></i>
                </a>
                <div class="nav-item__game">
                  <div class="container text-center justify-content-center">
                    <div class="game-item ">
                      <a href="javascript:;" onclick="gameAlert()">
                        <img title="WS168" alt="WS168" src="https://images.linkcdn.cloud/global/navbar/othergame/ws1.webp">
                        <div class="game-name">WS168</div>

                      </a>
                    </div>
                    
                  </div>
                </div>

              </div>
              <div class="nav-item">
                <a class="nav-link" href="?page=casino" style="cursor: pointer;">
                  Casino
                  <i class="fas fa-caret-down"></i>
                </a>
                <div class="nav-item__game">
                  <div class="container text-center justify-content-center">
                    <div class="game-item ">
                      <a href="?page=casino_pragmatic">
                        <img title="PRAGMATIC PLAY" alt="PRAGMATIC PLAY" src="https://dmwl0ca1bvnm.cloudfront.net/common/dark/casino/pragmaticplay.png" width="100px">

                      </a>
                    </div>
                    <div class="game-item ">
                      <a href="?page=casino_ezugi">
                        <img title="EZUGI" alt="EZUGI" src="https://dmwl0ca1bvnm.cloudfront.net/common/dark/casino/ezugi-gaming.png" width="100px">

                      </a>
                    </div>
                    <div class="game-item ">
                      <a href="?page=casino_evolution">
                        <img title="EVOLUTION" alt="EVOLUTION" src="https://dmwl0ca1bvnm.cloudfront.net/common/dark/casino/evolution.png" width="100px">

                      </a>
                    </div>
                  </div>
                </div>

              </div>
              <div class="nav-item">
                <a class="nav-link" href="?page=sport" style="cursor: pointer;">
                  Sportsbook
                  <i class="fas fa-caret-down"></i>
                </a>
                <div class="nav-item__game">
                  <div class="container text-center justify-content-center">
                    <div class="game-item ">
                      <a href="javascript:;" onclick="gameAlert()">
                        <img title="AFB88" alt="AFB88" src="https://images.linkcdn.cloud/global/navbar/sportbook/afb.webp">
                        <div class="game-name">AFB88</div>

                      </a>
                    </div>
                    
                  </div>
                </div>

              </div>
              <div class="nav-item">
                <a class="nav-link" href="?page=lottery" style="cursor: pointer;">
                  Lottery
                  <i class="fas fa-caret-down"></i>
                </a>
                <div class="nav-item__game">
                  <div class="container text-center justify-content-center">
                    <div class="game-item ">
                      <a onclick="gameAlert()" href="javascript:;">
                        <img title="4D" alt="4D" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/balak4d.webp?v=20240430" width="180px">

                      </a>
                    </div>
                  </div>
                </div>

              </div>
              <div class="nav-item">
                <a class="nav-link" href="?page=poker" style="cursor: pointer;">
                  Poker
                  <i class="fas fa-caret-down"></i>
                </a>
                <div class="nav-item__game">
                  <div class="container text-center justify-content-center">
                    <div class="game-item ">
                      <a href="?page=poker_FunGamingPoker">
                        <img title="FUN GAMING" alt="FUN GAMING" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/fungaming.webp?v=20240430" width="100px">

                      </a>
                    </div>
                  </div>
                </div>

              </div>
              <div class="nav-item">
                <a class="nav-link" href="?page=arcade" style="cursor: pointer;">
                  Arcade
                  <i class="fas fa-caret-down"></i>
                </a>
                <div class="nav-item__game">
                  <div class="container text-center justify-content-center">

                    <div class="game-item ">
                      <a href="?page=arcade_fishing">
                        <img title="Arcade Fishing" alt="Arcade Fishing" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/fungamingfishing.webp?v=20240430" width="180px">

                      </a>
                    </div>
                    <div class="game-item ">
                      <a href="?page=arcade_jili">
                        <img title="Arcade Fishing" alt="Arcade Fishing" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/jilifishing.webp?v=20240430" width="180px">

                      </a>
                    </div>
                  </div>
                </div>

              </div>
              <div class="nav-item">
                <a class="nav-link" href="?page=promosi">
                  Promosi
                </a>
              </div>
              <div class="nav-item">
                <a class="nav-link" href="#"><img src="https://images.linkcdn.cloud/global/nav-addons/event.webp" alt="Event" width="70px"></a>
              </div>
            </div>
          </div>
        </div>
      </nav>

    <?php
    } else {
    ?>
      <script>
    var gameMaintenanceStatus = <?php echo json_encode($game_maintenance_status); ?>;
      </script>
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <div class="nav-item">
                <a class="nav-link" href="?page=home">
                  <i class="fas fa-home" style="font-size: 130%"></i>
                </a>
              </div>
              <div class="nav-item">
                <a class="nav-link" href="?page=slot" style="cursor: pointer;">
                  Slot
                  <i class="fas fa-caret-down"></i>
                </a>
                <div class="nav-item__game">
                  <div class="container text-center justify-content-center">

                  <div class="game-item ">
                  <a href="javascript:;" onclick="gameMaintenance('slot_pragmatic', '?page=slot_pragmatic')">
                        <img title="Pragmatic Play" alt="Pragmatic Play" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/pp.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                    <a href="javascript:;" onclick="gameMaintenance('slot_microgaming', '?page=slot_microgaming')">
                        <img title="Microgaming" alt="Microgaming" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/microgaming.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                    <a href="javascript:;" onclick="gameMaintenance('slot_habanero', '?page=slot_habanero')">
                        <img title="Habanero" alt="Habanero" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/habanero.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                    <a href="javascript:;" onclick="gameMaintenance('slot_pgsoft', '?page=slot_pgsoft')">
                        <img title="PG Soft" alt="PG Soft" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/pgsoft.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                    <a href="javascript:;" onclick="gameMaintenance('slot_playngo', '?page=slot_playngo')">
                        <img title="Play N Go" alt="Play N Go" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/playngo.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                    <a href="javascript:;" onclick="gameMaintenance('slot_playstar', '?page=slot_playstar')">
                        <img title="PLAYSTAR" alt="PLAYSTAR" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/playstar.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                    <a href="javascript:;" onclick="gameMaintenance('slot_nolimitcity', '?page=slot_nolimitcity')">
                        <img title="NO LIMIT CITY" alt="NO LIMIT CITY" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/nolimitcity.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                    <a href="javascript:;" onclick="gameMaintenance('slot_cq9', '?page=slot_cq9')">
                        <img title="CQ9" alt="CQ9" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/sbocq9.webp?v=20240430" width="120px">

                      </a>
                    </div>

                    <div class="game-item ">
                    <a href="javascript:;" onclick="gameMaintenance('slot_joker', '?page=slot_joker')">
                        <img title="JOKER" alt="JOKER" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/joker.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                    <a href="javascript:;" onclick="gameMaintenance('slot_spadegaming', '?page=slot_spadegaming')">
                        <img title="SPADEGAMING" alt="SPADEGAMING" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/spadegaming.webp?v=20240430" width="120px">

                      </a>
                    </div>

                    <div class="game-item ">
                    <a href="javascript:;" onclick="gameMaintenance('slot_advantplay', '?page=slot_advantplay')">
                        <img title="ADVANTPLAY" alt="ADVANTPLAY" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/advantplay.webp?v=20240430" width="120px">

                      </a>
                    </div>

                     <div class="game-item ">
                     <a href="javascript:;" onclick="gameMaintenance('slot_evoplay', '?page=slot_evoplay')">
                        <img title="EVOPLAY" alt="EVOPLAY" src="https://files.sitestatic.net/assets/imgs/game_logos/100x70/evoplay_slot.png?v=0.1" width="180px">

                      </a>
                    </div>
                    <div class="game-item ">
                    <a href="javascript:;" onclick="gameMaintenance('slot_fungaming', '?page=slot_fungaming')">
                        <img title="FUNGAMING" alt="FUNGAMING" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/fungaming.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                    <a href="javascript:;" onclick="gameMaintenance('slot_yggdrasil', '?page=slot_yggdrasil')">
                        <img title="YGGDRASIL" alt="YGGDRASIL" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/yggdrasil.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                    <a href="javascript:;" onclick="gameMaintenance('slot_jili', '?page=slot_jili')">
                        <img title="JILI" alt="JILI" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/jili.webp?v=20240430" width="120px">

                      </a>
                    </div>
                    <div class="game-item ">
                    <a href="javascript:;" onclick="gameMaintenance('slot_bbin', '?page=slot_bbin')">
                        <img title="BBIN" alt="BBIN" src="<?php echo $urlweb?>/uploads/provider/bbin.png" width="120px">
                      </a>
                    </div>
                  </div>
                </div>

              </div>
              <div class="nav-item">
                <a class="nav-link" href="?page=livegame" style="cursor: pointer;">
                  <img src="https://images.linkcdn.cloud/global/nav-addons/hot_category.png" width="30" height="12" style="position: absolute; z-index:999; animation: 0.25s ease 0s infinite alternate none running beat; top:0px;">
                  Live Game
                  <i class="fas fa-caret-down"></i>
                </a>
                <div class="nav-item__game">
                  <div class="container text-center justify-content-center">
                    <div class="game-item ">
                      <a href="javascript:;" onclick="gameMaintenance()">
                        <img title="WS168" alt="WS168" src="https://images.linkcdn.cloud/global/navbar/othergame/ws1.webp">
                        <div class="game-name">WS168</div>

                      </a>
                    </div>
                    
                  </div>
                </div>

              </div>
              <div class="nav-item">
                <a class="nav-link" href="?page=casino" style="cursor: pointer;">
                  Casino
                  <i class="fas fa-caret-down"></i>
                </a>
                <div class="nav-item__game">
                  <div class="container text-center justify-content-center">
                    <div class="game-item ">
                    <a href="javascript:;" onclick="gameMaintenance('casino_pragmatic', '?page=casino_pragmatic')">
                        <img title="PRAGMATIC PLAY" alt="PRAGMATIC PLAY" src="https://dmwl0ca1bvnm.cloudfront.net/common/dark/casino/pragmaticplay.png" width="100px">

                      </a>
                    </div>
                    <div class="game-item ">
                    <a href="javascript:;" onclick="gameMaintenance('casino_ezugi', '?page=casino_ezugi')">
                        <img title="EZUGI" alt="EZUGI" src="https://dmwl0ca1bvnm.cloudfront.net/common/dark/casino/ezugi-gaming.png" width="100px">

                      </a>
                    </div>
                    <div class="game-item ">
                    <a href="javascript:;" onclick="gameMaintenance('casino_evolution', '?page=casino_evolution')">
                        <img title="EVOLUTION" alt="EVOLUTION" src="https://dmwl0ca1bvnm.cloudfront.net/common/dark/casino/evolution.png" width="100px">

                      </a>
                    </div>
                  </div>
                </div>

              </div>
              <div class="nav-item">
                <a class="nav-link" href="?page=sport" style="cursor: pointer;">
                  Sportsbook
                  <i class="fas fa-caret-down"></i>
                </a>
                <div class="nav-item__game">
                  <div class="container text-center justify-content-center">
                    <div class="game-item ">
                    <a href="javascript:;" onclick="gameMaintenance('sports_afb', '?page=sports_afb')">
                        <img title="AFB88" alt="AFB88" src="https://images.linkcdn.cloud/global/navbar/sportbook/afb.webp">
                        <div class="game-name">AFB88</div>

                      </a>
                    </div>
                    
                  </div>
                </div>

              </div>
              <div class="nav-item">
                <a class="nav-link" href="?page=lottery" style="cursor: pointer;">
                  Lottery
                  <i class="fas fa-caret-down"></i>
                </a>
                <div class="nav-item__game">
                  <div class="container text-center justify-content-center">
                    <div class="game-item ">
                    <a href="javascript:;" onclick="gameMaintenance('lottery_next4d', '?page=lottery_next4d')">
                        <img title="4D" alt="4D" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/balak4d.webp?v=20240430" width="180px">

                      </a>
                    </div>
                  </div>
                </div>

              </div>
              <div class="nav-item">
                <a class="nav-link" href="?page=poker" style="cursor: pointer;">
                  Poker
                  <i class="fas fa-caret-down"></i>
                </a>
                <div class="nav-item__game">
                  <div class="container text-center justify-content-center">
                    <div class="game-item ">
                      <a href="javascript:;" onclick="gameMaintenance('poker_FunGamingPoker', '?page=poker_FunGamingPoker')">
                        <img title="FUN GAMING" alt="FUN GAMING" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/fungaming.webp?v=20240430" width="100px">

                      </a>
                    </div>
                  </div>
                </div>

              </div>
              <div class="nav-item">
                <a class="nav-link" href="?page=arcade" style="cursor: pointer;">
                  Arcade
                  <i class="fas fa-caret-down"></i>
                </a>
                <div class="nav-item__game">
                  <div class="container text-center justify-content-center">

                    <div class="game-item ">
                      <a href="javascript:;" onclick="gameMaintenance('arcade_fishing', '?page=arcade_fishing')">
                        <img title="Arcade Fishing" alt="Arcade Fishing" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/fungamingfishing.webp?v=20240430" width="180px">

                      </a>
                    </div>
                    <div class="game-item ">
                      <a href="javascript:;" onclick="gameMaintenance('arcade_jili', '?page=arcade_jili')">
                        <img title="Arcade Fishing" alt="Arcade Fishing" src="https://d2rzzcn1jnr24x.cloudfront.net/Images/nexus-beta/dark-purple/desktop/providers/shortcuts/jilifishing.webp?v=20240430" width="180px">

                      </a>
                    </div>
                  </div>
                </div>

              </div>
              <div class="nav-item">
                <a class="nav-link" href="?page=promosi">
                  Promosi
                </a>
              </div>
              <div class="nav-item">
                <a class="nav-link" href="#"><img src="https://images.linkcdn.cloud/global/nav-addons/event.webp" alt="Event" width="70px"></a>
              </div>
            </div>
          </div>
        </div>
      </nav>
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
    <?php
    }
    ?>