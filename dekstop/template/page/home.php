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
              <img src="../uploads/fotobanner/<?php echo $data['gambar'] ?>" >
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
<section class="home__menu">
  <div class="container">
   <div class="menu-container">
    <div class="download-border item-download">
      <a href="../uploads/apk/Dewa MPO_1_1.0.apk">
        <div class="menu-download">
          <img id="template-download" src="../assets/img/img/gameapp.png" width="226" height="226" alt="game app">
          <h4>DOWNLOAD SEKARANG</h4>
        </a>
      </div>
    </div>
    <div class="menu-right item-right">
     <div class="menu-games">
      <a href="?page=sport">
       <div class="games-item">
        <img id="template-image" src="../assets/img/img/sports_1.png" width="193" height="150" alt="sportsbook">
        <div class="games-border">
         <div class="games-name">SPORTSBOOK</div>
       </div>
     </div>
   </a>

   <a href="?page=slot">
     <div class="games-item">
      <img id="template-image" src="../assets/img/img/slots_1.png" width="193" height="150" alt="slot">
      <div class="games-border">
       <div class="games-name">SLOT</div>
     </div>
   </div>
 </a>

 <a href="?page=casino">
   <div class="games-item">
    <img id="template-image" src="../assets/img/img/casino_1.png" width="193" height="150" alt="casino">
    <div class="games-border">
     <div class="games-name">CASINO</div>
   </div>
 </div>
</a>
<a href="?page=lottery">
 <div class="games-item">
  <img id="template-image" src="../assets/img/img/lottery_1.png" width="193" height="150" alt="lottery">
  <div class="games-border">
   <div class="games-name">LOTTERY</div>
 </div>
</div>
</a>
</div>
<div class="menu-slider">
  <div class="row">
   <div class="col-lg-4 col-md-6">
    <div class="slider-cstmr swiper-container">
     <div class="swiper-wrapper">
      <div class="swiper-slide">
       <div class="slider-cstmr__holder cstmr-service">
        <div class="slider-cstmr-title">Layanan Customer</div>
        <div class="cstmr-item">
         <img src="https://images.linkcdn.cloud/global/default/contact/whatsapp.png" alt="whatsapp" width="31" height="31">
         <a href="https://wa.me/<?php echo $whatsapp ?>" target="_blank" rel="noreferrer">
           <div class="cstmr-content">
            +<?php echo $whatsapp ?>
          </div>
        </a>
      </div>
      <div class="cstmr-item">


      </div>
    </div>
  </div>
  <div class="swiper-slide">
   <div class="slider-cstmr__holder service-game">
    <div class="slider-cstmr-title">Layanan Product</div>
    <div class="service-item">
     <div class="service-icon">
      <img src="https://images.linkcdn.cloud/global/default/contact/vider.png">
    </div>
    <div class="service-item-desc">Permainan Terlengkap dalam seluruh platform</div>
  </div>
</div>
</div>
<div class="swiper-slide">
 <div class="slider-cstmr__holder service-game">
  <div class="slider-cstmr-title">Lisensi Game</div>
  <div class="service-item">
   <div class="service-icon">
    <img src="https://images.linkcdn.cloud/global/default/contact/vider2.png">
  </div>
  <div class="service-item-desc">lisensi Resmi &amp; Aman oleh PAGCOR
  </div>
</div>
</div>
</div>
</div>
<!-- Add Paginaton -->
<div class="swiper-pagination"></div>
</div>
</div>
<div class="col-lg-4 col-md-6">
  <div class="slider-provider">
   <div class="slider-provider-title">Game Favorit</div>
   <div class="slide-game-favorit swiper-container">
    <div class="swiper-wrapper">
     <?php
     $id_provider = 'PR';
     $user = $_SESSION['username'];
     $getUser = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$user'");
     $infouser = mysqli_fetch_array($getUser);
     $extplayer = $infouser['extplayer'];
     $query = mysqli_query($koneksi, "SELECT * FROM tb_games WHERE game_provider = '$id_provider' LIMIT 8");

    while ($row = mysqli_fetch_array($query)) {
      if (isset($_SESSION['username'])) {
        $link_url = $urlweb . "/main/PlayGame.php?p=".$extplayer."&id=".$row['game_code'];
        ?>
        <a class="swiper-slide" href="<?php echo $link_url ?>">
          <img src="<?php echo $row['game_image'] ?>" width="193" height="150">
        </a>
        <?php

      }else{
        ?>
        <a class="swiper-slide" href="index.php?pesan=28">
          <img src="<?= $row['game_image'] ?>" width="193" height="150">
        </a>
        <?php
      }
    }
      ?>


    </div>
    <!-- Add Paginaton -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-prev"
    style="background-image: url(https://images.linkcdn.cloud/global/default/icon/arrow-left.png);"></div>
    <div class="swiper-button-next"
    style="background-image: url(https://images.linkcdn.cloud/global/default/icon/arrow-right.png);">
  </div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6">
  <div class="slider-provider">
   <div class="slider-provider-title">Provider Favorit</div>
   <?php
   if ($id_login == "") {
     ?>
     <div class="slide-prov-favorit swiper-container">
      <div class="swiper-wrapper">
       <a class="swiper-slide" href="javascript:;" onclick="gameAlert()">
        <img src="https://images.linkcdn.cloud/global/default/provider-favorit/pra.jpg">
      </a>
      <a class="swiper-slide" href="javascript:;" onclick="gameAlert()">
        <img src="https://images.linkcdn.cloud/global/default/provider-favorit/hbn.jpg">
      </a>
      <a class="swiper-slide" href="javascript:;" onclick="gameAlert()">
        <img src="https://images.linkcdn.cloud/global/default/provider-favorit/afb.jpg">
      </a>
    </div>
    <?php
  }else{
    ?>
    <div class="slide-prov-favorit swiper-container">
      <div class="swiper-wrapper">
        <a class="swiper-slide" href="?page=slot_pragmatic">
          <img src="https://images.linkcdn.cloud/global/default/provider-favorit/pra.jpg">
        </a>
        <a class="swiper-slide" href="javascript:;" onclick="gamemaintenance()">
          <img src="https://images.linkcdn.cloud/global/default/provider-favorit/hbn.jpg">
        </a>
        <a class="swiper-slide" href="javascript:;" onclick="gamemaintenance()">
          <img src="https://images.linkcdn.cloud/global/default/provider-favorit/afb.jpg">
        </a>
      </div>
      <?php
    }
    ?>

    <!-- Add Paginaton -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-prev"
    style="background-image: url(https://images.linkcdn.cloud/global/default/icon/arrow-left.png);"></div>
    <div class="swiper-button-next"
    style="background-image: url(https://images.linkcdn.cloud/global/default/icon/arrow-right.png);">
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<?php
// Fungsi untuk mendapatkan hari secara otomatis
function getDay() {
    $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    $dayIndex = date('w');
    return $days[$dayIndex];
}

// Fungsi untuk menghasilkan nomor lotto secara acak
function generateLottoNumber() {
    return rand(1000, 9999);
}

// Mendapatkan hari
$day = getDay();
?>
<section class="home__lotto">
    <div class="container">
        <div class="swiper-container lotto-swiper swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
            <div class="swiper-wrapper" id="swiper-wrapper-8d1d2dd6c4ae42aa" aria-live="off" style="transition-duration: 0ms; transform: translate3d(-910px, 0px, 0px);">

                <!-- Bagian lotto pertama -->
                <div class="swiper-slide lotto-slide" role="group" aria-label="6 / 30" style="width: 250px; margin-right: 10px;" data-swiper-slide-index="0">
                    <div class="lotto-border">
                        <a href="?page=lottery">
                            <div class="lotto-item">
                                <h4 class="lotto-country">Kampot 4D</h4>
                                <h6 class="lotto-date"><?php echo $day . ', ' . date('Y-m-d'); ?></h6>
                                <div class="lotto-number"><?php echo generateLottoNumber(); ?></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Bagian lotto kedua -->
                <div class="swiper-slide lotto-slide" role="group" aria-label="7 / 30" style="width: 250px; margin-right: 10px;" data-swiper-slide-index="1">
                    <div class="lotto-border">
                        <a href="?page=lottery">
                            <div class="lotto-item">
                                <h4 class="lotto-country">Beijing</h4>
                                <h6 class="lotto-date"><?php echo $day . ', ' . date('Y-m-d'); ?></h6>
                                <div class="lotto-number"><?php echo generateLottoNumber(); ?></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30" style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                    <div class="lotto-border">
                        <a href="?page=lottery">
                            <div class="lotto-item">
                                <h4 class="lotto-country">Tokyo</h4>
                                <h6 class="lotto-date"><?php echo $day . ', ' . date('Y-m-d'); ?></h6>
                                <div class="lotto-number"><?php echo generateLottoNumber(); ?></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30" style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                    <div class="lotto-border">
                        <a href="?page=lottery">
                            <div class="lotto-item">
                                <h4 class="lotto-country">Manila</h4>
                                <h6 class="lotto-date"><?php echo $day . ', ' . date('Y-m-d'); ?></h6>
                                <div class="lotto-number"><?php echo generateLottoNumber(); ?></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30" style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                    <div class="lotto-border">
                        <a href="?page=lottery">
                            <div class="lotto-item">
                                <h4 class="lotto-country">Magnum4D</h4>
                                <h6 class="lotto-date"><?php echo $day . ', ' . date('Y-m-d'); ?></h6>
                                <div class="lotto-number"><?php echo generateLottoNumber(); ?></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30" style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                    <div class="lotto-border">
                        <a href="?page=lottery">
                            <div class="lotto-item">
                                <h4 class="lotto-country">SydneyPools</h4>
                                <h6 class="lotto-date"><?php echo $day . ', ' . date('Y-m-d'); ?></h6>
                                <div class="lotto-number"><?php echo generateLottoNumber(); ?></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30" style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                    <div class="lotto-border">
                        <a href="?page=lottery">
                            <div class="lotto-item">
                                <h4 class="lotto-country">BullsEye</h4>
                                <h6 class="lotto-date"><?php echo $day . ', ' . date('Y-m-d'); ?></h6>
                                <div class="lotto-number"><?php echo generateLottoNumber(); ?></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30" style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                    <div class="lotto-border">
                        <a href="?page=lottery">
                            <div class="lotto-item">
                                <h4 class="lotto-country">Hongkong47</h4>
                                <h6 class="lotto-date"><?php echo $day . ', ' . date('Y-m-d'); ?></h6>
                                <div class="lotto-number"><?php echo generateLottoNumber(); ?></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30" style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                    <div class="lotto-border">
                        <a href="?page=lottery">
                            <div class="lotto-item">
                                <h4 class="lotto-country">4DRome</h4>
                                <h6 class="lotto-date"><?php echo $day . ', ' . date('Y-m-d'); ?></h6>
                                <div class="lotto-number"><?php echo generateLottoNumber(); ?></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30" style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                    <div class="lotto-border">
                        <a href="?page=lottery">
                            <div class="lotto-item">
                                <h4 class="lotto-country">Amsterdam</h4>
                                <h6 class="lotto-date"><?php echo $day . ', ' . date('Y-m-d'); ?></h6>
                                <div class="lotto-number"><?php echo generateLottoNumber(); ?></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30" style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                    <div class="lotto-border">
                        <a href="?page=lottery">
                            <div class="lotto-item">
                                <h4 class="lotto-country">Barcelona</h4>
                                <h6 class="lotto-date"><?php echo $day . ', ' . date('Y-m-d'); ?></h6>
                                <div class="lotto-number"><?php echo generateLottoNumber(); ?></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30" style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                    <div class="lotto-border">
                        <a href="?page=lottery">
                            <div class="lotto-item">
                                <h4 class="lotto-country">Seoul</h4>
                                <h6 class="lotto-date"><?php echo $day . ', ' . date('Y-m-d'); ?></h6>
                                <div class="lotto-number"><?php echo generateLottoNumber(); ?></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30" style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                    <div class="lotto-border">
                        <a href="?page=lottery">
                            <div class="lotto-item">
                                <h4 class="lotto-country">Timor</h4>
                                <h6 class="lotto-date"><?php echo $day . ', ' . date('Y-m-d'); ?></h6>
                                <div class="lotto-number"><?php echo generateLottoNumber(); ?></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30" style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                    <div class="lotto-border">
                        <a href="?page=lottery">
                            <div class="lotto-item">
                                <h4 class="lotto-country">SiberiaPools</h4>
                                <h6 class="lotto-date"><?php echo $day . ', ' . date('Y-m-d'); ?></h6>
                                <div class="lotto-number"><?php echo generateLottoNumber(); ?></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-slide lotto-slide" role="group" aria-label="8 / 30" style="width: 250px; margin-right: 10px;" data-swiper-slide-index="2">
                    <div class="lotto-border">
                        <a href="?page=lottery">
                            <div class="lotto-item">
                                <h4 class="lotto-country">Bangkok</h4>
                                <h6 class="lotto-date"><?php echo $day . ', ' . date('Y-m-d'); ?></h6>
                                <div class="lotto-number"><?php echo generateLottoNumber(); ?></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </div>
</section>
<section class="home__payment">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <div class="payment-border">
          <div class="payment-content">
            <div class="payment-header">
              <img src="https://images.linkcdn.cloud/global/default/icon/servicemeter.svg" width="50" height="50">
              <div class="payment-title">Layanan Member</div>
            </div>
            <div class="payment-service">
              <div class="service-average">
                <div class="service-title">Tambah Dana</div>
                <div class="service-subtitle">Waktu</div>
                <div class="progress">
                  <div id="depositTimeBar" class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="background: #e4d00a; width: 20%"></div>
                </div>
              </div>
              <div class="service-time">
                <div class="time-number" id="depositTime">2</div>
                <div class="time-title">Menit</div>
              </div>
            </div>
            <div class="payment-service">
              <div class="service-average">
                <div class="service-title">WITHDRAW</div>
                <div class="service-subtitle">Waktu</div>
                <div class="progress">
                  <div id="withdrawTimeBar" class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="background: #e4d00a; width: 20%"></div>
                </div>
              </div>
              <div class="service-time">
                <div class="time-number" id="withdrawTime">2</div>
                <div class="time-title">Menit</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12">
        <div class="payment-border">
          <div class="payment-content">
            <div class="payment-header">
              <img src="https://images.linkcdn.cloud/global/default/icon/payment.svg" width="50" height="50">
              <div class="payment-title">Sistem Pembayaran</div>
            </div>

            <div class="swiper-container pembarayan-swiper">
              <div class="swiper-wrapper">
                <?php
                $bank_online = mysqli_query($koneksi, "SELECT * FROM tb_bank WHERE level = 'admin' ");
                while ($dambe = mysqli_fetch_array($bank_online)) {
                  ?>
                  <div class="swiper-slide">
                    <div class="bank-content">
                      <div class="bank-logo">
                        <img src="../uploads/bank/<?php echo $dambe['icon'] ?>" alt="<?php echo $dambe['nama_bank'] ?>">
                      </div>
                      <div class="bank-status online">ONLINE</div>
                    </div>
                  </div>

                  <?php
                }
                ?>

              </div>
              <!-- Add Pagination -->
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="home__seo">
  <div class="container">
   <div class="game__seo">
    <div hidden id="title-seo"><?php echo $judul; ?> Link <?php echo $urlweb; ?> | WA <?php echo $whatsapp; ?> Situs Slot Gacor</div>
    <div class="seo-content showFooter" >
     <h1>
      <strong>Mainkan dan Menangkan Slot di <?php echo $judul; ?>-Situs kasino online nomor 1 di Indonesia</strong>
    </h1>
    <p>
      Selamat datang di <?php echo $judul; ?>, situs slot online nomor 1 di Indonesia! Kami bangga menjadi pilihan utama bagi para pecinta slot online yang mencari pengalaman bermain yang tak terlupakan dan kesempatan untuk menangkan hadiah besar. Di <?php echo $judul; ?>, Anda dapat menikmati berbagai macam permainan slot yang menarik dengan fitur-fitur yang inovatif.
    Kami memiliki tim ahli yang bekerja keras untuk memastikan pengalaman bermain Anda selalu menyenangkan dan memberikan peluang menang yang baik. Selain itu, kami juga menawarkan layanan pelanggan yang responsif dan ramah, sehingga Anda dapat merasa nyaman dan aman saat bermain di situs kami.
    Jika Anda mencari situs slot online terpercaya dengan permainan slot yang berkualitas dan hadiah besar,<?php echo $judul; ?> adalah pilihan yang tepat. Bergabunglah dengan kami sekarang dan rasakan sensasi bermain slot online di situs terbaik di Indonesia!
    </p>
    <br>
    <h3>POIN PENTING <?php echo $judul; ?></h3>
    <ul><li><strong>Slot di <?php echo $judul; ?></strong> merupakan pilihan terbaik bagi para pecinta slot online di Indonesia.</li><li><?php echo $judul; ?> adalah situs slot online nomor 1 di Indonesia dengan permainan slot Mpo yang menarik.</li><li>Kami menawarkan peluang menang besar dan layanan pelanggan yang responsif dan ramah.</li><li>Bergabunglah dengan kami sekarang dan rasakan sensasi bermain slot online di situs terbaik di Indonesia!</li></ul>
    <p>&nbsp;</p>
    <h2>
      Nikmati Peluang Menang Besar dengan Bermain Slot di <?php echo $judul; ?>
    </h2>
    <p>Kami bangga memberikan pengalaman bermain <strong>Slot <?php echo $judul; ?></strong> yang tidak hanya menyenangkan, tetapi juga memberikan peluang menang besar. Dalam permainan slot online, peluang menang adalah kuncinya, dan di <?php echo $judul; ?>, kami menawarkan peluang yang baik untuk meraih kemenangan dan hadiah besar.</p>
    <p>Kami menawarkan berbagai macam permainan slot yang menarik dan menghibur, dan setiap permainan memiliki peluang menang yang berbeda-beda. Dari permainan klasik hingga permainan terbaru dan paling inovatif, kami memastikan pemain kami memiliki banyak opsi untuk dipilih.</p>
    <h2>
      Bergabunglah Bersama Kami dan Rasakan Sensasi Bermain Slot di <?php echo $judul; ?>
    </h2>
    <p>
        Untuk bergabung dengan kami dan merasakan sensasi bermain Slot di <?php echo $judul; ?>, Anda hanya perlu mengikuti beberapa langkah mudah. Pertama-tama, Anda perlu mendaftar akun dengan mengisi formulir pendaftaran yang tersedia di situs kami.
    </p>
    <p>
        Setelah mendaftar, Anda dapat melakukan deposit untuk memulai permainan. Kami menyediakan berbagai pilihan metode pembayaran yang mudah dan aman untuk memudahkan Anda melakukan deposit.
    </p>
    <p>
        Setelah deposit berhasil dilakukan, Anda dapat memilih permainan Slot Mpo yang Anda inginkan dan mulai bermain. Nikmati grafis yang menarik dan fitur-fitur bonus yang menggiurkan untuk meraih kemenangan dan hadiah besar.
    </p>
    <p>
        Selain itu, dengan bergabung bersama kami, Anda juga dapat menikmati berbagai keuntungan seperti bonus deposit, cashback, dan promo-promo menarik lainnya. Jangan lewatkan kesempatan untuk memenangkan hadiah besar dan merasakan sensasi bermain Slot Mpo di <?php echo $judul; ?>.
    </p>
</div>
</div>
</div>
</section>
</div>
<?php include 'popup.php'; ?>
</main>