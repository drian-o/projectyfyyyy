<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE id = '$id' ");
    $data = mysqli_fetch_array($query);

    $id_user = $data['id_user'];

    $cek_bonus = mysqli_query($koneksi, "SELECT * FROM tb_turnover WHERE id_user = '$id_user' ");
    $hitung = mysqli_num_rows($cek_bonus);

    if ($hitung == 0) {
        $query1 = mysqli_query($koneksi, "UPDATE tb_transaksi SET status = 'Ditolak' WHERE id = '$id' ");
        if ($query1) {
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script type="text/javascript">
                Swal.fire({
                    title: 'Success!',
                    text: 'Transaksi Berhasil Di tolak',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location = "?page=permintaan_deposit";
                });
            </script>
            <?php
        } else {
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script type="text/javascript">
                Swal.fire({
                    title: 'Error!',
                    text: 'Transaksi Gagal Di Tolak',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location = "?page=permintaan_deposit";
                });
            </script>
            <?php
        }
    } else {
        $query1 = mysqli_query($koneksi, "UPDATE tb_transaksi SET status = 'Ditolak' WHERE id = '$id' ");
        $query2 = mysqli_query($koneksi, "DELETE FROM tb_turnover WHERE id_user = '$id_user' ");

        if ($query1) {
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script type="text/javascript">
                Swal.fire({
                    title: 'Success!'
                    text: 'Transaksi Berhasil Di Tolak',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location = "?page=permintaan_deposit";
                });
            </script>
            <?php
        } else {
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script type="text/javascript">
                Swal.fire({
                    title: 'Error!'
                    text: 'Transaksi Gagal Di Tolak',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location = "?page=permintaan_deposit";
                });
            </script>
            <?php
        }
    }
}
?>
