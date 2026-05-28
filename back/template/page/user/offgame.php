<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "UPDATE tb_user SET status_game = 'ongame' WHERE id = '$id' ");

    if ($query) {
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script type="text/javascript">
            Swal.fire({
                title: "Sukses!",
                text: "Status Game User Berhasil Diaktifkan",
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
                text: "Status Game User Gagal Diaktifkan",
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
