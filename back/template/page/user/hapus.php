<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $extplayer = $_GET['extplayer'];

    $query = mysqli_query($koneksi, "DELETE FROM tb_user WHERE id = '$id' ");
    $query1 = mysqli_query($koneksi, "DELETE FROM tb_transaksi WHERE id_user = '$extplayer' ");
    $query2 = mysqli_query($koneksi, "DELETE FROM tb_turnover WHERE id_user = '$extplayer' ");
    $query3 = mysqli_query($koneksi, "DELETE FROM tb_trxgame WHERE id_user = '$extplayer' ");
    $query4 = mysqli_query($koneksi, "DELETE FROM tb_refferal WHERE id_user = '$extplayer' ");
    $query5 = mysqli_query($koneksi, "DELETE FROM tb_player WHERE id_user = '$extplayer' ");

    if ($query) {
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script type="text/javascript">
            Swal.fire({
                title: "Sukses!",
                text: "User Berhasil Dihapus",
                icon: "success",
                confirmButtonText: "Ok",
            }).then(function() {
                window.location = "?page=user";
            });
        </script>
        <?php
    } else {
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script type="text/javascript">
            Swal.fire({
                title: "Error!",
                text: "User Gagal Dihapus",
                icon: "error",
                confirmButtonText: "Ok",
            }).then(function() {
                window.location = "?page=user";
            });
        </script>
        <?php
    }
}
?>
