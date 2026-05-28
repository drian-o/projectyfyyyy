<?php
if ($c['level'] == "superadmin") {
    ?>


    <?php 
    if(isset($_POST['upload'])){
        $id = $_POST['id'];
        $ekstensi_diperbolehkan    = array('png','jpg','jpeg');
        $nama = $_FILES['file']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $level = 'admin';
        $ukuran    = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $nama_bank = $_POST['nama_bank'];    
        $nomor_rekening = $_POST['nomor_rekening'];    
        $nama_pemilik = $_POST['nama_pemilik'];    

        if ($nama == "") {
            $query = mysqli_query($koneksi, "UPDATE tb_bank SET nama_bank = '$nama_bank', nomor_rekening = '$nomor_rekening', nama_pemilik = '$nama_pemilik' WHERE id = '$id' ");
            if($query){
                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                <script type="text/javascript">
                    Swal.fire({
                        title: "Sukses!",
                        text: "Data Bank Berhasil Diubah",
                        icon: "success",
                        confirmButtonText: "Ok",
                    }).then(function() {
                        window.location = "?page=bank";
                    });
                </script>
                <?php
            }else{
                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                <script type="text/javascript">
                    Swal.fire({
                        title: "Error!",
                        text: "Gagal Mengubah Gambar",
                        icon: "error",
                        confirmButtonText: "Ok",
                    }).then(function() {
                        window.location = "?page=bank";
                    });
                </script>
                <?php
            }
        }else{
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 1044070){            
                    move_uploaded_file($file_tmp, '../../uploads/bank/'.$nama);
                    $query = mysqli_query($koneksi, "UPDATE tb_bank SET icon = '$nama', nama_bank = '$nama_bank', nomor_rekening = '$nomor_rekening', nama_pemilik = '$nama_pemilik' WHERE id = '$id' ");
                    if($query){
                        ?>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                        <script type="text/javascript">
                            Swal.fire({
                                title: "Sukses!",
                                text: "Data Bank Berhasil Ditambahkan",
                                icon: "success",
                                confirmButtonText: "Ok",
                            }).then(function() {
                                window.location = "?page=bank";
                            });
                        </script>
                        <?php
                    }else{
                        ?>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                        <script type="text/javascript">
                            Swal.fire({
                                title: "Error!",
                                text: "Gagal Mengupload Icon Bank",
                                icon: "error",
                                confirmButtonText: "Ok",
                            }).then(function() {
                                window.location = "?page=bank";
                            });
                        </script>
                        <?php
                    }
                }else{
                    ?>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                    <script type="text/javascript">
                        Swal.fire({
                            title: "Error!",
                            text: "Ukuran Icon Gambar Terlalu Besar",
                            icon: "error",
                            confirmButtonText: "Ok",
                        }).then(function() {
                            window.location = "?page=bank";
                        });
                    </script>
                    <?php
                }
            }else{
                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                <script type="text/javascript">
                    Swal.fire({
                        title: "Error!",
                        text: "Hanya Bisa Mengupload Ekstensi PNG, JPG",
                        icon: "error",
                        confirmButtonText: "Ok",
                    }).then(function() {
                        window.location = "?page=bank";
                    });
                </script>
                <?php
            }
        }


    }
    ?>

    <?php
}else{
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript">
        Swal.fire({
            title: "Error!",
            text: "Anda tidak memiliki akses!",
            icon: "error",
            confirmButtonText: "Ok",
        }).then(function() {
            window.location = "?page=dashboard";
        });
    </script>
    <?php
}
?>
