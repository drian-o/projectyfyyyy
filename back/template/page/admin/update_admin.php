<?php
	if (isset($_POST['upload'])) {
		$id = $_POST['id'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$nama_lengkap = $_POST['nama_lengkap'];

		$password_baru = md5($password);

		if ($password == "") {
			$query = mysqli_query($koneksi, "UPDATE tb_admin SET username = '$username', nama_lengkap = '$nama_lengkap' WHERE id = '$id' ");
			if ($query) {
				session_start();
				session_destroy();
				?>
					<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                    <script type="text/javascript">
						Swal.fire({
							title: 'Success!',
							text: 'Data Admin Berhasil Diubah',
							icon: 'success',
							showCancelButton: false,
							confirmButtonText: 'OK',
						}).then((result) => {
							if (result.isConfirmed) {
								window.location = "../index.php";
							}
						});
					</script>
				<?php
			}
		}else{
			$query = mysqli_query($koneksi, "UPDATE tb_admin SET username = '$username', password = '$password_baru', nama_lengkap = '$nama_lengkap' WHERE id = '$id' ");
			if ($query) {
				session_start();
				session_destroy();
				?>
					<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
					<script type="text/javascript">
						Swal.fire({
							title: 'Success!',
							text: 'Data Admin Berhasil Diubah',
							icon: 'success',
							showCancelButton: false,
							confirmButtonText: 'OK',
						}).then((result) => {
							if (result.isConfirmed) {
								window.location = "../index.php";
							}
						});
					</script>
				<?php
			}
		}
	}
?>
