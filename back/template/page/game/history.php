<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">History Betting Member</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Betting User</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">History</li>
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
                    <h4 class="card-title">Daftar User</h4>
                </div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">session</th>
                                <th scope="col">username</th>
                                <th scope="col">Game Code</th>
                                <th scope="col">Game Provider</th>
                                <th scope="col">Bet</th>
                                <th scope="col">Win</th>
                                <th scope="col">Turnover</th>
                                <th scope="col">betdate</th>
                                <th scope="col">game_vendor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Langkah 2: Query database
                            $query = "SELECT * FROM tb_history"; // Mengganti tb_history menjadi yourtable
                            $result = mysqli_query($koneksi, $query);
                            while ($row = mysqli_fetch_assoc($result)) :
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $row['id']; ?></th>
                                    <td><?php echo $row['session']; ?></td> <!-- Menyesuaikan dengan nama kolom di yourtable -->
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['game_code']; ?></td>
                                    <td><?php echo $row['game_provider']; ?></td>
                                    <td><?php echo $row['bet']; ?></td>
                                    <td><?php echo $row['win']; ?></td>
                                    <td><?php echo $row['turnover']; ?></td>
                                    <td><?php echo $row['betdate']; ?></td>
                                    <td><?php echo $row['game_vendor']; ?></td> <!-- Menyesuaikan dengan nama kolom di yourtable -->
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
