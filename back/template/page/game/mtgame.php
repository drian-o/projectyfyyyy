<?php
if ($c['level'] == "superadmin") {

    if (isset($_POST['game_maintenance'])) {
        foreach ($_POST['game_maintenance'] as $game_code => $status) {
            $status = $status ? 1 : 0;
            mysqli_query($koneksi, "UPDATE game_maintenance SET is_maintenance = $status WHERE game_code = '$game_code'");
        }
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script type='text/javascript'>
                window.addEventListener('load', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Game maintenance status updated successfully.',
                        showConfirmButton: true
                    });
                });
              </script>";
    }

    $result = mysqli_query($koneksi, "SELECT * FROM game_maintenance");
    $game_maintenance_status = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $game_maintenance_status[$row['game_code']] = $row['is_maintenance'];
    }
    ?>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Game Maintenance</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Maintenance</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Game Maintenance</li>
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
                        <h4 class="card-title">Manage Game Maintenance</h4>
                        <input type="text" id="searchInput" class="form-control" placeholder="Search game...">
                        <br>
                        <select id="categoryFilter" class="form-control">
                            <option value="">All Categories</option>
                            <option value="casino">Casino</option>
                            <option value="slot">Slot</option>
                            <option value="arcade">Arcade</option>
                            <option value="poker">Poker</option>
                            <option value="sports">Sports</option>
                            <option value="lottery">Lottery</option>
                        </select>
                        <br>
                        <form method="post" id="gameForm">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Game Name</th>
                                            <th>Status</th>
                                            <th>Change Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="gameTableBody">
                                        <?php
                                        $games = [
                                            "casino_ezugi" => ["category" => "casino", "name" => "EZUGI CASINO"],
                                            "casino_pragmatic" => ["category" => "casino", "name" => "PRAGMATIC LC"],
                                            "casino_evolution" => ["category" => "casino", "name" => "EVOLUTION GAMING"],
                                            "slot_pragmatic" => ["category" => "slot", "name" => "PRAGMATIC PLAY"],
                                            "slot_pgsoft" => ["category" => "slot", "name" => "PGSOFT"],
                                            "slot_microgaming" => ["category" => "slot", "name" => "MICROGAMING"],
                                            "slot_habanero" => ["category" => "slot", "name" => "HABANERO"],
                                            "slot_cq9" => ["category" => "slot", "name" => "CQ9"],
                                            "slot_playstar" => ["category" => "slot", "name" => "PLAYSTAR"],
                                            "slot_playngo" => ["category" => "slot", "name" => "PLAYNGO"],
                                            "slot_evoplay" => ["category" => "slot", "name" => "EVOPLAY"],
                                            "slot_joker" => ["category" => "slot", "name" => "JOKER"],
                                            "slot_spadegaming" => ["category" => "slot", "name" => "SPADEGAMING"],
                                            "slot_advantplay" => ["category" => "slot", "name" => "ADVANTPLAY"],
                                            "slot_fungaming" => ["category" => "slot", "name" => "FUN GAMING"],
                                            "slot_nolimitcity" => ["category" => "slot", "name" => "NO LIMIT CITY"],
                                            "slot_yggdrasil" => ["category" => "slot", "name" => "YGGDRASIL"],
                                            "slot_jili" => ["category" => "slot", "name" => "JILI"],
                                            "slot_bbin" => ["category" => "slot", "name" => "BBIN"],
                                            "arcade_jili" => ["category" => "arcade", "name" => "JILI ARCADE"],
                                            "arcade_fishing" => ["category" => "arcade", "name" => "FUNGAMING ARCADE"],
                                            "poker_FunGamingPoker" => ["category" => "poker", "name" => "FUNGAMING POKER"],
                                            "sports_afb" => ["category" => "sports", "name" => "AFB88"],
                                            "lottery_next4d" => ["category" => "lottery", "name" => "NEX4D"],
                                            "lottery_qqkeno" => ["category" => "lottery", "name" => "QQ KENO"]
                                        ];

                                        $number = 1;
                                        foreach ($games as $game_code => $game_details) {
                                            $status = $game_maintenance_status[$game_code] ? 'red' : 'green';
                                            $status_text = $game_maintenance_status[$game_code] ? 'Maintenance' : 'Active';
                                            ?>
                                            <tr class="game-item" data-category="<?php echo $game_details['category']; ?>">
                                                <td class="number"><?php echo $number; ?></td>
                                                <td><?php echo $game_details['name']; ?></td>
                                                <td>
                                                    <div class="status-indicator" style="display: inline-block; width: 10px; height: 10px; background-color: <?php echo $status; ?>;"></div>
                                                    <span><?php echo $status_text; ?></span>
                                                </td>
                                                <td>
                                                    <select class="custom-select col-12" id="<?php echo $game_code; ?>" name="game_maintenance[<?php echo $game_code; ?>]">
                                                        <option value="1" <?php if ($game_maintenance_status[$game_code]) echo 'selected'; ?>>Maintenance</option>
                                                        <option value="0" <?php if (!$game_maintenance_status[$game_code]) echo 'selected'; ?>>Active</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-success m-r-10">Submit</button>
                                                </td>
                                            </tr>
                                            <?php
                                            $number++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <script type="text/javascript">
        window.location = "?page=dashboard";
    </script>
    <?php
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function updateNumbering() {
        var gameItems = document.querySelectorAll('.game-item');
        var number = 1;
        gameItems.forEach(function(item) {
            if (item.style.display !== 'none') {
                item.querySelector('.number').textContent = number;
                number++;
            }
        });
    }

    document.getElementById('searchInput').addEventListener('input', function() {
        var filter = this.value.toUpperCase();
        var gameItems = document.querySelectorAll('.game-item');
        gameItems.forEach(function(item) {
            var label = item.querySelector('td:nth-child(2)').textContent.toUpperCase();
            if (label.indexOf(filter) > -1) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
        updateNumbering();
    });

    document.getElementById('categoryFilter').addEventListener('change', function() {
        var category = this.value;
        var gameItems = document.querySelectorAll('.game-item');
        gameItems.forEach(function(item) {
            if (category === "" || item.getAttribute('data-category') === category) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
        updateNumbering();
    });

    window.addEventListener('load', updateNumbering);
</script>

<style>
    @media (max-width: 768px) {
        .table-responsive {
            overflow-x: auto; /* Aktifkan pengguliran horizontal pada tabel */
        }
    }
</style>
