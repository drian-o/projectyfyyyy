<?php
if ($c['level'] == "superadmin") {
	?>


	<?php
	if (isset($_POST['upload'])) {
		$id = $_POST['id'];
		$min_depo = $_POST['min_depo'];
		$min_wd = $_POST['min_wd'];
		$kode_unik = $_POST['kode_unik'];


		$query = mysqli_query($koneksi, "UPDATE tb_web SET min_depo = '$min_depo', min_wd = '$min_wd', kode_unik = '$kode_unik' ");

		if ($query) {
			?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script type="text/javascript">
				Swal.fire({
					title: "Sukses!",
					text: "Data Berhasil Diubah",
					icon: "success",
					confirmButtonText: "Ok",
				}).then(function() {
					window.location = "?page=depowd";
				});
			</script>
			<?php
		}else{
			?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script type="text/javascript">
				Swal.fire({
					title: "Error!",
					text: "Data Gagal Diubah",
					icon: "error",
					confirmButtonText: "Ok",
				}).then(function() {
					window.location = "?page=depowd";
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
