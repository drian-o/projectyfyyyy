<?php
if ($c['level'] == "superadmin") {
	?>

	<?php
	if (isset($_POST['upload'])) {
		$id = $_POST['id'];
		$id_livechat = $_POST['id_livechat'];
		$no_whatsapp = $_POST['no_whatsapp'];

		$query = mysqli_query($koneksi, "UPDATE tb_contact SET id_livechat = '$id_livechat', no_whatsapp = '$no_whatsapp' ");

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
					window.location = "?page=contact";
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
					window.location = "?page=contact";
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
