<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Riwayat Transaksi Member</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Riwayat Transaksi</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Menu Riwayat Transaksi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Riwayat Total Deposit dan Withdraw Member</h4>
                </div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Total Deposit</th>
                                <th scope="col">Total Withdraw</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Query to get all users
                        $query_users = mysqli_query($koneksi, "SELECT * FROM tb_user ORDER BY username ASC");
                        $no = 1;
                        while ($user = mysqli_fetch_array($query_users)) {
                            $id_user = $user['extplayer'];
                            $username = $user['username'];

                            // Query to calculate total deposit per user
                            $query_deposit = mysqli_query($koneksi, "SELECT SUM(total) as total_deposit FROM tb_transaksi WHERE id_user = '$id_user' AND transaksi = 'Top Up' AND status = 'Sukses'");
                            $data_deposit = mysqli_fetch_array($query_deposit);
                            $total_deposit = $data_deposit['total_deposit'] ? $data_deposit['total_deposit'] : 0;

                            // Query to calculate total withdraw per user
                            $query_withdraw = mysqli_query($koneksi, "SELECT SUM(total) as total_withdraw FROM tb_transaksi WHERE id_user = '$id_user' AND transaksi = 'Withdraw' AND status = 'Sukses'");
                            $data_withdraw = mysqli_fetch_array($query_withdraw);
                            $total_withdraw = $data_withdraw['total_withdraw'] ? $data_withdraw['total_withdraw'] : 0;
                            ?>
                            <tr>
                                <th scope="row"><?php echo $no++; ?></th>
                                <td><?php echo $username; ?></td>
                                <td>Rp. <?php echo number_format($total_deposit); ?></td>
                                <td>Rp. <?php echo number_format($total_withdraw); ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
