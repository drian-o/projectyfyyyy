<?php
if ($c['level'] == "superadmin") {
	?>


	<?php 
	if(isset($_POST['upload'])){
		$ekstensi_diperbolehkan	= array('png','jpg','jpeg','gif');
		$nama = $_FILES['file']['name'];
		$x = explode('.', $nama);
		$id = $_POST['id'];
		$ekstensi = strtolower(end($x));
		$status = 'active';
		$ukuran	= $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];	
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran < 1044070){			
				move_uploaded_file($file_tmp, '../../uploads/fotobanner/'.$nama);
				$query = mysqli_query($koneksi, "UPDATE tb_banner SET gambar = '$nama' WHERE id = '$id' ");
				if($query){
					?>
					<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
					<script type="text/javascript">
						Swal.fire({
							title: "Sukses!",
							text: "Berhasil Mengubah Gambar",
							icon: "success",
							confirmButtonText: "Ok",
						}).then(function() {
							window.location = "?page=banner";
						});
					</script>
					<?php
				}else{
					?>
					<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
					<script type="text/javascript">
						Swal.fire({
							title: "Error!",
							text: "Gagal Mengupload Gambar",
							icon: "error",
							confirmButtonText: "Ok",
						}).then(function() {
							window.location = "?page=banner";
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
						text: "Ukuran File Terlalu Besar",
						icon: "error",
						confirmButtonText: "Ok",
					}).then(function() {
						window.location = "?page=banner";
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
					text: "Hanya Bisa Mengupload Ekstensi PNG, JPG, dan GIF",
					icon: "error",
					confirmButtonText: "Ok",
				}).then(function() {
					window.location = "?page=banner";
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
