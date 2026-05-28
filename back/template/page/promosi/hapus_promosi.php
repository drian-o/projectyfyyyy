<?php
if ($c['level'] == "superadmin") {
	?>
	<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$query = mysqli_query($koneksi, "DELETE FROM tb_bonus WHERE id = '$id' ");
		if ($query) {
			?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script type="text/javascript">
				Swal.fire({
					title: "Sukses!",
					text: "Data Berhasil Dihapus",
					icon: "success",
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
