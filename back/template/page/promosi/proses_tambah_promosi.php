<?php
if ($c['level'] == "superadmin") {
	?>
	<?php 
	if(isset($_POST['upload'])){
		$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
		$nama = $_FILES['file']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];
		$judul = $_POST['judul'];	
		$deskripsi = $_POST['deskripsi'];	
		$minimal_depo = $_POST['minimal_depo'];	
		$bonus = $_POST['bonus'];	
		$to = $_POST['to'];	
		$status = $_POST['status'];	
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran < 1044070){			
				move_uploaded_file($file_tmp, '../../uploads/fotopromosi/'.$nama);
				$query = mysqli_query($koneksi, "INSERT INTO tb_bonus VALUES(NULL, '$nama','$judul','$deskripsi','$minimal_depo','$bonus','$to','$status')");
				if($query){
					?>
					<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
					<script type="text/javascript">
						Swal.fire({
							title: "Sukses!",
							text: "Data Promosi Berhasil Ditambahkan",
							icon: "success",
							confirmButtonText: "Ok",
						}).then(function() {
							window.location = "?page=promosi";
						});
					</script>
					<?php
				}else{
					?>
					<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
					<script type="text/javascript">
						Swal.fire({
							title: "Error!",
							text: "Gagal Mengupload Gambar Promosi",
							icon: "error",
							confirmButtonText: "Ok",
						}).then(function() {
							window.location = "?page=promosi";
						});
					</script>
					<?php
				}
			}else{
				?>
				<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
				<script type="text/javascript">
					Swal.fire({
						title: "Error!",
						text: "Ukuran Gambar Terlalu Besar",
						icon: "error",
						confirmButtonText: "Ok",
					}).then(function() {
						window.location = "?page=promosi";
					});
				</script>
				<?php
			}
		}else{
			?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script type="text/javascript">
				Swal.fire({
					title: "Error!",
					text: "Hanya Bisa Mengupload Ekstensi PNG, JPG",
					icon: "error",
					confirmButtonText: "Ok",
				}).then(function() {
					window.location = "?page=promosi";
				});
			</script>
			<?php
		}
	}
	?>

	<?php
}else{
	?>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script type="text/javascript">
		Swal.fire({
			title: "Error!",
			text: "Anda tidak memiliki akses!",
			icon: "error",
			confirmButtonText: "Ok",
		}).then(function() {
			window.location = "?page=dashboard";
		});
	</script>
	<?php
}
?>
