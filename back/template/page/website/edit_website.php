<?php
session_start();
error_reporting(E_ALL); 
ini_set('display_errors', 1);
if ($c['level'] == "superadmin") {
    if (isset($_POST['upload'])) {
        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg', 'gif');
        $nama = $_FILES['file']['name'];
        $x = explode('.', $nama);
        $id = $_POST['id'];
        $ekstensi = strtolower(end($x));
        $ukuran = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $judul = $_POST['judul'];   
        $deskripsi = $_POST['deskripsi'];   
        $keyword = $_POST['keyword'];
        $url_web = $_POST['url_web'];
        $mt_web = $_POST['maintenance_status'];

        if ($nama == "") {
            $query = mysqli_query($koneksi, "UPDATE tb_web SET title = '$judul', deskripsi = '$deskripsi', keyword = '$keyword', url = '$url_web', mtweb = '$mt_web' WHERE id = '$id'");

            if ($query) {
                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                <script type="text/javascript">
                    Swal.fire({
                        title: "Sukses!",
                        text: "Data Website Berhasil Diubah",
                        icon: "success",
                        confirmButtonText: "Ok",
                    }).then(function() {
                        window.location = "?page=website";
                    });
                </script>
                <?php
            } else {
                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                <script type="text/javascript">
                    Swal.fire({
                        title: "Error!",
                        text: "Data Website Gagal Diubah",
                        icon: "error",
                        confirmButtonText: "Ok",
                    }).then(function() {
                        window.location = "?page=website";
                    });
                </script>
                <?php
            }
        } else {
            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if ($ukuran < 1044070) {         
                    move_uploaded_file($file_tmp, '../../assets/img/' . $nama);
                    $query = mysqli_query($koneksi, "UPDATE tb_web SET logo = '$nama', icon_web = '$nama', title = '$judul', deskripsi = '$deskripsi', keyword = '$keyword', url = '$url_web', mtweb = '$mt_web' WHERE id = '$id'");
                    if ($query) {
                        ?>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                        <script type="text/javascript">
                            Swal.fire({
                                title: "Sukses!",
                                text: "Data Website Berhasil Diubah",
                                icon: "success",
                                confirmButtonText: "Ok",
                            }).then(function() {
                                window.location = "?page=website";
                            });
                        </script>
                        <?php
                    } else {
                        ?>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                        <script type="text/javascript">
                            Swal.fire({
                                title: "Error!",
                                text: "Gagal Mengubah Data",
                                icon: "error",
                                confirmButtonText: "Ok",
                            }).then(function() {
                                window.location = "?page=website";
                            });
                        </script>
                        <?php
                    }
                } else {
                    ?>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                    <script type="text/javascript">
                        Swal.fire({
                            title: "Error!",
                            text: "Ukuran File Terlalu Besar",
                            icon: "error",
                            confirmButtonText: "Ok",
                        }).then(function() {
                            window.location = "?page=website";
                        });
                    </script>
                    <?php
                }
            } else {
                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                <script type="text/javascript">
                    Swal.fire({
                        title: "Error!",
                        text: "Hanya Bisa Mengupload Ekstensi PNG, JPG, dan GIF",
                        icon: "error",
                        confirmButtonText: "Ok",
                    }).then(function() {
                        window.location = "?page=website";
                    });
                </script>
                <?php
            }
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
