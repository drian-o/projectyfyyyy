<?php
$showPopup = false; // Default, tidak menampilkan popup

// Periksa apakah cookie popup_closed sudah ada
if (!isset($_COOKIE['popup_closed'])) {
    // Query untuk mendapatkan data popup yang memiliki status active
    $query = mysqli_query($koneksi, "SELECT * FROM tb_popup WHERE status = 'active'");
    
    // Periksa apakah ada data yang memiliki status active
    if (mysqli_num_rows($query) > 0) {
        $showPopup = true; // Menampilkan popup jika ada data dengan status active
    }
}

if ($showPopup) {
    // Ambil data popup sekali saja untuk menghindari pengulangan query
    $popupData = mysqli_fetch_array($query);
?>
<div class="modal fade show" id="homePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true" style="padding-right: 17px; display: block;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
            <div class="announcement-title">
                <div class="icon"><i class="fas fa-bullhorn"></i></div>
                <h3 class="text-uppercase">Perhatian.</h3>
            </div>
            <div class="modal-body">
                <div class="announcement-content">
                    <figure class="image">
                        <img src="../uploads/fotobanner/<?php echo $popupData['gambar'] ?>" alt="announcement-title">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var closeButton = document.querySelector("#homePopup .close");
        if (closeButton) {
            closeButton.addEventListener("click", function() {
                document.cookie = "popup_closed=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
                document.getElementById('homePopup').style.display = 'none';
            });
        }
    });
</script>
