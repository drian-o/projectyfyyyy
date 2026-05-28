<?php
if ($c['level'] == "superadmin") {
	?>

	<?php
	if (isset($_POST['upload'])) {
		$id = $_POST['id'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$nama_lengkap = $_POST['nama_lengkap'];
		$level = $_POST['level'];

		$new_password = md5($password);

		if ($password == "") {
			$query = mysqli_query($koneksi, "UPDATE tb_admin SET username = '$username', nama_lengkap = '$nama_lengkap', level = '$level' WHERE id = '$id' ");
			if ($query) {
				?>
				<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
				<script type="text/javascript">
					Swal.fire({
						title: 'Error',
						text: 'Data Admin Gagal Diubah',
						icon: 'error',
						showCancelButton: false,
						confirmButtonText: 'OK',
					}).then((result) => {
						if (result.isConfirmed) {
							window.location = "?page=administrator";
						}
					});
				</script>
				<?php
			}
		}else{
			$query = mysqli_query($koneksi, "UPDATE tb_admin SET username = '$username',password = '$new_password', nama_lengkap = '$nama_lengkap', level = '$level' WHERE id = '$id' ");
			if ($query) {
				?>
				<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
				<script type="text/javascript">
					Swal.fire({
						title : 'success!',
						text: 'Data Admin Berhasil Diubah',
						icon: 'success',
						showCancelButton: false,
						confirmButtonText: 'OK',
					}).then((result) => {
						if (result.isConfirmed) {
							window.location = "?page=administrator";
						}
					});
				</script>
				<?php
			}
		}
	}
	?>

	<?php
}else{
	?>
	<script type="text/javascript">
		window.location = "?page=dashboard";
	</script>
	<?php
}
?>
