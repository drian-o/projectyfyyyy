
	<?php 
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$query = mysqli_query($koneksi, "DELETE FROM tb_turnover WHERE id = '$id' ");

		if ($query) {
			?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
			<script type="text/javascript">
				Swal.fire({
					title: "Sukses!",
					text: "Bonus berhasil dibatalkan",
					icon: "success",
					confirmButtonText: "Ok",
				}).then(function() {
					window.location = "?page=bonus";
				});
			</script>
			<?php
		}
	}
	?>

