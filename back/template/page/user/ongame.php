<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "UPDATE tb_user SET status_game = 'offgame' WHERE id = '$id' ");

    if ($query) {
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script type="text/javascript">
            Swal.fire({
                title: "Sukses!",
                text: "Status Game User Berhasil Dinonaktifkan",
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
                text: "Status Game User Gagal Dinonaktifkan",
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
