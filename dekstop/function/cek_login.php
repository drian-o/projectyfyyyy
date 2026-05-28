<?php
	include '../../function/connect.php';
	session_start();

	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		// Menggunakan prepared statement untuk mencegah SQL Injection
		$query = mysqli_prepare($koneksi, "SELECT * FROM tb_user WHERE username = ? AND password = ?");
		mysqli_stmt_bind_param($query, "ss", $username, $password);
		mysqli_stmt_execute($query);
		$result = mysqli_stmt_get_result($query);

		if ($hitung = mysqli_num_rows($result) == 1) {
			$data = mysqli_fetch_array($result);
			$status = $data['status'];

			if ($status == 'Active') {
				$id = $data['id'];
				$level = $data['level'];
				$_SESSION['username'] = $data['username'];
				$_SESSION['extplayer'] = $data['extplayer'];
				$_SESSION['id'] = $id;

				header("Location:../index.php");
			} else {
				header("Location: ../index.php?pesan=6");
			}
		} else {
			header("Location:../index.php?pesan=7");
		}
	}
?>
