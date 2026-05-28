<?php
include (__DIR__.'/../../../main/integration.php');

// Pastikan form telah disubmit
if (isset($_POST['submit'])) {
	// Ambil data dari form dan lakukan sanitasi
	$id_user = mysqli_real_escape_string($koneksi, $_POST['id_user']);
	$nominal = mysqli_real_escape_string($koneksi, $_POST['nominal']);
	$jenis = mysqli_real_escape_string($koneksi, $_POST['jenis']);

	// Dapatkan saldo aktif pengguna
	$getBalance = mysqli_query($koneksi, "SELECT * FROM `tb_saldo` WHERE id_user = '$id_user'") or die(mysqli_error($koneksi));
	$gb = mysqli_fetch_array($getBalance);
	$saldoAktif = $gb['active'];

	// Waktu transaksi
	$created_date = date('Y-m-d H:i:s');

	// Proses transaksi berdasarkan jenis
	if ($jenis == "0") {
        // Deposit saldo
        $Transaksi = json_decode($ZH->Transaksi($id_user, $nominal, 'deposit'), true);
        if ($Transaksi['status'] == 'success') {
            // Tambahkan transaksi ke database
            $query100 = mysqli_query($koneksi, "INSERT INTO tb_transaksi(id, gambar, tanggal, transaksi, total, dari_bank, metode, bonus, keterangan, status, id_user) VALUES (NULL, '', '$created_date', 'Top Up Saldo', '$nominal', '', 'System', '', 'Top Up', 'Sukses', '$id_user')");

            // Update saldo
            $query4 = mysqli_query($koneksi, "UPDATE tb_saldo SET active = active + $nominal WHERE id_user = '$id_user'");

            if ($query4) {
                // Redirect jika berhasil
                $statusText = isset($Transaksi['status']) ? $Transaksi['status'] : '';
                $msgText = isset($Transaksi['msg']) ? $Transaksi['msg'] : '';
                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                <script type="text/javascript">
                    Swal.fire({
                        title: "<?php echo $statusText; ?>",
                        text: "<?php echo $msgText; ?>",
                        icon: "success",
                        confirmButtonText: "Ok",
                    }).then(function() {
                        window.location = "?page=saldo_member";
                    });
                </script>
                <?php
            }
        } else {
            // Gagal transaksi deposit
            $statusText = isset($Transaksi['status']) ? $Transaksi['status'] : '';
            $msgText = isset($Transaksi['msg']) ? $Transaksi['msg'] : '';
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script type="text/javascript">
                Swal.fire({
                    title: "<?php echo $statusText; ?>",
                    text: "<?php echo $msgText; ?>",
                    icon: "error",
                    confirmButtonText: "Ok",
                }).then(function() {
                    window.location = "?page=saldo_member";
                });
            </script>
            <?php
        }
    } else {
        // Kurangi saldo
        $Transaksi = json_decode($ZH->Transaksi($id_user, $nominal, 'withdraw'), true);
        if ($Transaksi['status'] == 'success') {
            $query100 = mysqli_query($koneksi, "INSERT INTO tb_transaksi(id, gambar, tanggal, transaksi, total, dari_bank, metode, bonus, keterangan, status, id_user) VALUES (NULL, '', '$created_date', 'Saldo Dikurangi', '$nominal', '', 'System', '', 'Top Up', 'Sukses', '$id_user')");

            // Update saldo
            $query4 = mysqli_query($koneksi, "UPDATE tb_saldo SET active = active - $nominal WHERE id_user = '$id_user'");

            if ($query4) {
                // Redirect jika berhasil
                $statusText = isset($Transaksi['status']) ? $Transaksi['status'] : '';
                $msgText = isset($Transaksi['msg']) ? $Transaksi['msg'] : '';
                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                <script type="text/javascript">
                    Swal.fire({
                        title: "<?php echo $statusText; ?>",
                        text: "<?php echo $msgText; ?>",
                        icon: "success",
                        confirmButtonText: "Ok",
                    }).then(function() {
                        window.location = "?page=saldo_member";
                    });
                </script>
                <?php
            }
        } else {
            // Gagal transaksi withdraw
            $statusText = isset($Transaksi['status']) ? $Transaksi['status'] : '';
            $msgText = isset($Transaksi['msg']) ? $Transaksi['msg'] : '';
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script type="text/javascript">
                Swal.fire({
                    title: "<?php echo $statusText; ?>",
                    text: "<?php echo $msgText; ?>",
                    icon: "error",
                    confirmButtonText: "Ok",
                }).then(function() {
                    window.location = "?page=saldo_member";
                });
            </script>
            <?php
        }
    }
}
?>
