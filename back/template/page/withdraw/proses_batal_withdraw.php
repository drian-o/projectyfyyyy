<?php
include (__DIR__.'/../../../main/integration.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "UPDATE tb_transaksi SET status = 'Ditolak' WHERE id = '$id' ");

    $query1 = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE id = '$id' ");
    $cek_user = mysqli_fetch_array($query1);

    $id_user = $cek_user['id_user'];
    $nominal = $cek_user['total'];

    $ZH->Transaksi($id_user,$nominal,'deposit');
    
    $updateBalance = mysqli_query($koneksi, "UPDATE `tb_saldo` SET `pending` = pending - '$nominal', `active` = active + '$nominal' WHERE `id_user` = '$id_user'") or die(mysqli_error($koneksi));

    if ($query) {
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script type="text/javascript">
            Swal.fire({
                title: "Sukses!",
                text: "Konfirmasi Tolak Withdraw Berhasil",
                icon: "success",
                confirmButtonText: "Ok",
            }).then(function() {
                window.location = "?page=permintaan_withdraw";
            });
        </script>
        <?php
    } else {
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script type="text/javascript">
            Swal.fire({
                title: "Error!",
                text: "Konfirmasi Tolak Withdraw Gagal",
                icon: "error",
                confirmButtonText: "Ok",
            }).then(function() {
                window.location = "?page=permintaan_withdraw";
            });
        </script>
        <?php
    }
}
?>
