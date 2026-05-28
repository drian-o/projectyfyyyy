<?php
if ($c['level'] == "superadmin") {
    if (isset($_POST['upload'])) {
        $id = $_POST['id'];
        $warna = $_POST['warna'];

        $query = mysqli_query($koneksi, "UPDATE tb_web SET warna = '$warna' WHERE id = '$id' ");

        if ($query) {
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script type="text/javascript">
                Swal.fire({
                    title: "Sukses!",
                    text: "Warna Berhasil Diubah",
                    icon: "success",
                    confirmButtonText: "Ok",
                }).then(function() {
                    window.location = "?page=warna";
                });
            </script>
            <?php
        } else {
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script type="text/javascript">
                Swal.fire({
                    title: "Error!",
                    text: "Warna Gagal Diubah",
                    icon: "error",
                    confirmButtonText: "Ok",
                }).then(function() {
                    window.location = "?page=warna";
                });
            </script>
            <?php
        }
    }
} else {
    ?>
    <script type="text/javascript">
        window.location = "?page=dashboard";
    </script>
    <?php
}
?>
