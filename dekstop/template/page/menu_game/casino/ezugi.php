<!-- Account Balance -->
<main id="main-route">
	<div class="main-content slot-game">
		<div class="container">
			<div class="slot-game__container">
				<div class="page-header">EZUGI</div>
				<div class="slot-game-list">
					<?php 

					$id_provider = 'EZ';
					$query = mysqli_query($koneksi, "SELECT * FROM tb_games WHERE game_provider = '$id_provider' AND game_type = 'LC'");
					while ($data = mysqli_fetch_array($query)) {
						$que = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE extplayer = '$extplayer' AND status_game = 'offgame' ");

						$cek = mysqli_num_rows($que);

						if($cek > 0){
							$playUrl = 'index.php?page=casino_pragmatic&pesan=22';
						}else{
							$idgame = $data['gameid'];
							if ($id_login == '') {
								$playUrl = 'index.php?pesan=28';
							}else{
								$externalPlayerId = $extplayer;
								$playUrl = $urlweb . "/main/PlayGame.php?p=".$extplayer."&id=".$row['game_code'];
							} 
						}
						?>


						<div class="slot-game-item slot-tg" style="display: block;">
							<div class="slot-game-img">
								<img src="<?php echo $data['game_image'] ?>" style="">
							</div>
							<div class="slot-game-name"><?php echo $data['game_name']; ?></div>
							<div class="slot-game-hover">
								<a class="main sekarang main-sekarang-alert" target="_blank" href="<?php echo $playUrl ?>" >
									Main Sekarang
								</a>
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