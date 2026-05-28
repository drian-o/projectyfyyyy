<?php
if ($c['level'] == "superadmin") {
    ?>
    <?php 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = mysqli_query($koneksi, "UPDATE tb_user SET status = 'Suspend' WHERE id = '$id'  ");
        if ($query) {
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script type="text/javascript">
                Swal.fire({
                    title: "Sukses!",
                    text: "User Berhasil Di-Suspend",
                    icon: "success",
                    confirmButtonText: "Ok",
                }).then(function() {
                    window.location = '?page=user';
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
