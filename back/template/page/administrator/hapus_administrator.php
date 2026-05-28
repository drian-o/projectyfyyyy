<?php
if ($c['level'] == "superadmin") {
    ?>
<?php

	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		 $query = mysqli_query($koneksi, "DELETE FROM tb_admin WHERE id = '$id' ");
		 if ($query) {
		 	?>
				<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
				<script type="text/javascript">
					Swal.fire({
						title: 'Success!',
						text : 'Data Admin Berhasil Dihapus',
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
		 }else{
		 	?>
				<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
				<script type="text/javascript">
					Swal.fire({
						title: 'Error!',
						text : 'Data Admin Gagal Dihapus',
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