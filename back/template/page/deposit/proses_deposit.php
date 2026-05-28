<?php
include (__DIR__.'/../../../main/integration.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $tanggal = date('Y-m-d H:i:s');
    $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE id = '$id' ");
    $data = mysqli_fetch_array($query);

    if ($data) { // Memastikan data ditemukan
        $id_user = $data['id_user'];
        $total = $data['total'];

        $persen = $total * 0.1;

        $cek_reff = mysqli_query($koneksi, "SELECT * FROM tb_refferal WHERE id_user = '$id_user' ");
        $liat = mysqli_fetch_array($cek_reff);

        $reff = $liat['user_refferal'];

        $hitung_reff = mysqli_num_rows($cek_reff);

        if ($hitung_reff > 0) {
            $query3 = mysqli_query($koneksi, "UPDATE tb_refferal SET bonus = '1' WHERE id_user = '$id_user' ");
            
            $ZH->Transaksi($reff,$persen,'deposit');
			
            $query4 = mysqli_query($koneksi, "UPDATE tb_saldo SET active = active + $persen WHERE id_user = '$reff'");

            $query100 = mysqli_query($koneksi, "INSERT INTO tb_transaksi(id,gambar,tanggal,transaksi,total,dari_bank,metode,bonus,keterangan,status,id_user) VALUES (NULL, '', '$tanggal','Bonus Refferal','$persen','','Bonus Refferal','','Bonus','Sukses','$reff')");

            $sajnsa = mysqli_query($koneksi, "UPDATE tb_refferal SET bonus = bonus + '$persen' WHERE user_refferal = '$reff' ");
        }
        
        $Transaksi = json_decode($ZH->Transaksi($id_user, $total, 'deposit'), true);

        if ($Transaksi['status'] == 'success') {
            $query1 = mysqli_query($koneksi, "UPDATE tb_saldo SET active = active + $total WHERE id_user = '$id_user'");
            $query2 = mysqli_query($koneksi, "UPDATE tb_transaksi SET status = 'Sukses' WHERE id_user = '$id_user' AND id = '$id'");

            if ($query2) {
                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                <script type="text/javascript">
                    Swal.fire({
                        title: "<?php echo isset($Transaksi['status']) ? $Transaksi['status'] : ''; ?>",
                        text: "<?php echo isset($Transaksi['msg']) ? $Transaksi['msg'] : ''; ?>",
                        icon: "success",
                        confirmButtonText: "Ok",
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
                        title: "Error",
                        text: "Konfirmasi Deposit Gagal",
                        icon: "error",
                        confirmButtonText: "Ok",
                    }).then(function() {
                        window.location = "?page=permintaan_deposit";
                    });
                </script>
                <?php
            }
        } else {
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script type="text/javascript">
                Swal.fire({
                    title: "<?php echo isset($Transaksi['status']) ? $Transaksi['status'] : ''; ?>",
                    text: "<?php echo isset($Transaksi['msg']) ? $Transaksi['msg'] : ''; ?>",
                    icon: "error",
                    confirmButtonText: "Ok",
                }).then(function() {
                    window.location = "?page=permintaan_deposit";
                });
            </script>
            <?php
        }
    } else {
        // Data tidak ditemukan, lakukan penanganan kasus ini
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script type="text/javascript">
            Swal.fire({
                title: "Not Found",
                text: "Data Tidak Ditemukan",
                icon: "question",
                confirmButtonText: "Ok",
            }).then(function() {
                window.location = "?page=permintaan_deposit";
            });
        </script>
        <?php
    }
}
?>