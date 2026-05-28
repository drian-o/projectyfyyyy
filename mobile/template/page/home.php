  <!-- Account Balance -->
  <main id="main-route">
      <div class="main-content home">
          <section class="home__slider">
              <div class="swiper-container main-slider">
                  <div class="swiper-wrapper">
                      <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_banner WHERE status = 'active' ");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                          <div class="swiper-slide">
                              <a href="#">
                                  <img src="../uploads/fotobanner/<?php echo $data['gambar'] ?>" class="img-fluid w-100">
                              </a>
                          </div>
                      <?php
                        }
                        ?>
                  </div>
                  <div class="swiper-pagination"></div>
                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div>
              </div>
          </section>
          <section class="home__jackpot">
              <div class="container">
                  <div class="jackpot-gif">
                      <div class="jackpot-amount">IDR <span id="amount"></span></div>
                  </div>
              </div>
          </section>
          <section class="mobile__category">
              <div class="container">
                  <div class="category-container">
                      <a href="?page=popular">
                          <div class="category-item">
                              <div class="icon">
                                  <img src="themes/default/img/mobile-home-icon/mobile-popular.svg" width="30" height="30" alt="popular">
                              </div>
                              <div class="name">Popular</div>
                          </div>
                      </a>
                      <a href="?page=slot">
                          <div class="category-item">
                              <div class="icon">
                                  <img src="themes/default/img/mobile-home-icon/mobile-slot.svg" width="30" height="30" alt="slot">
                              </div>
                              <div class="name">
                                  Slot
                              </div>
                          </div>
                      </a>
                      <a href="?page=livegame">
                          <div class="category-item">
                              <img src="https://images.linkcdn.cloud/global/nav-addons/hot_category.png" width="30" height="12" style="position: absolute; z-index:9; animation: 0.25s ease 0s infinite alternate none running beat;">
                              <div class="icon">
                                  <img src="themes/default/img/mobile-home-icon/mobile-livegames.svg" width="30" height="30" alt="livegames">
                              </div>
                              <div class="name">
                                  Live Game
                              </div>
                          </div>
                      </a>
                      <a href="?page=casino">
                          <div class="category-item">
                              <div class="icon">
                                  <img src="themes/default/img/mobile-home-icon/mobile-casino.svg" width="30" height="30" alt="casino">
                              </div>
                              <div class="name">
                                  Casino
                              </div>
                          </div>
                      </a>
                      <a href="?page=sport">
                          <div class="category-item">
                              <div class="icon">
                                  <img src="themes/default/img/mobile-home-icon/mobile-sport.svg" width="30" height="30" alt="sport">
                              </div>
                              <div class="name">
                                  Sportsbook
                              </div>
                          </div>
                      </a>
                      <a href="?page=lottery">
                          <div class="category-item">
                              <div class="icon">
                                  <img src="themes/default/img/mobile-home-icon/mobile-lottery.svg" width="30" height="30" alt="lottery">
                              </div>
                              <div class="name">
                                  Lottery
                              </div>
                          </div>
                      </a>
                      <a name="gamesPicker" data-menu="poker" href="?page=poker">
                          <div class="category-item">
                              <div class="icon">
                                  <img src="themes/default/img/mobile-home-icon/mobile-poker.svg" width="30" height="30" alt="poker">
                              </div>
                              <div class="name">
                                  Poker
                              </div>
                          </div>
                      </a>
                      <a href="?page=arcade">
                          <div class="category-item">
                              <div class="icon">
                                  <img src="themes/default/img/mobile-home-icon/mobile-arcade.svg" width="30" height="30" alt="arcade">
                              </div>
                              <div class="name">
                                  Arcade
                              </div>
                          </div>
                      </a>
                  </div>
              </div>
          </section>
          <section class="mobile__popular">
              <div class="container">
                  <div class="popular-title">
                      <i class="fab fa-hotjar"></i>
                      <span>Game Terpopuler</span>
                  </div>
              </div>
          </section>
          <section class="mobile__games">
              <div class="container">
                  <div class="games-list">
                      <?php
                        $hayker = 'SL';
                        $user = $_SESSION['username'];
                        $getUser = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$user'");
                        $infouser = mysqli_fetch_array($getUser);
                        $extplayer = $infouser['extplayer'];
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_games WHERE game_type = '$hayker' AND game_name IN (
                        'Gates of Olympus',
                        'Gates of Olympus 1000',
                        'Sugar Rush',
                        'Gates of Gatot Kaca 1000',
                        'Sweet Bonanza',
                        'Starlight Princess',
                        'Starlight Princess 1000',
                        'Mahjong Ways',
                        'Mahjong Ways 2',
                        'Tsar Treasures',
                        'Mafia Mayhem',
                        'Dragon Hatch2',
                        'MAHJONG WAYS 3+',
                        'MAHJONG WAYS 3',
                        'TREASURES OF AZTEC Z'
                        ) ORDER BY RAND() LIMIT 9");
                        while ($row = mysqli_fetch_array($query)) {
                            if (isset($_SESSION['username'])) {
                                $link_url = $urlweb . "/main/PlayGame.php?p=".$extplayer."&id=".$row['game_code'];
                        ?>
                              <div class="games-holder">
                                  <div class="games-img">
                                      <a class="main sekarang main-sekarang-alert" target="_blank" href="<?php echo $link_url ?>">
                                          <img src="<?php echo $row['game_image'] ?>" width="110" height="80" alt="S-RH02" loading="lazy">
                                      </a>
                                  </div>
                                  <div class="games-name"><?php echo $row['game_name']; ?></div>
                              </div>

                          <?php
                            } else { ?>
                              <div class="games-holder">
                                  <div class="games-img">
                                      <a class="main sekarang main-sekarang-alert" href="#" onclick=''>
                                          <img src="<?php echo $row['game_image'] ?>" width="110" height="80" alt="S-RH02" loading="lazy">
                                      </a>
                                  </div>
                                  <div class="games-name"><?php echo $row['game_name']; ?></div>
                              </div>
                      <?php }
                        } ?>
                  </div>
                  <div class="games-button my-1 text-center">
                      <a href="?page=popular" class="btn-custom-sm">Show More <i class="fas fa-arrow-alt-circle-right ml-1"></i></a>
                  </div>
              </div>
          </section>
          <section class="mobile__download-bannner">
              <div class="container">
                  <div class="mobile-download-container">
                      <div class="download-icon">
                          <img src="../assets/img/<?php echo $logo ?>" width="40" height="40" alt="android">
                      </div>
                      <div class="download-title">
                          <h5><?php echo $judul; ?></h5>
                          <h6>DOWNLOAD SEKARANG</h6>
                      </div>
                      <div class="download-button">
                          <a class="btn-custom-sm" href="../uploads/apk/">Download</a>
                      </div>
                  </div>
              </div>
          </section>
          <?php include('zulhayker.php'); ?>
      </div>
  </main>