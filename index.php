
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?> </title>                                  
    <meta name="description" content="<?php echo $deskripsi ?>">
    <meta name="keywords" content="<?php echo $keyword ?>">
    <meta property="og:description" content="<?php echo $deskripsi ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo $urlweb ?>">
    <meta property="og:image" content="<?php echo $urlweb ?>/assets/img/<?php echo $logo ?>">
    <meta name="robots" content="index, follow">
    <meta name="author" content="<?php echo $urlweb ?>">
</head>
<body>
    <script>
        var userAgent = navigator.userAgent;

        var urlParams = new URLSearchParams(window.location.search);
        var reffParam = urlParams.get('reff');

        if (userAgent.match(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i)) {
            if (reffParam) {
                window.location.href = "mobile/index.php?page=daftar&reff=" + reffParam;
            } else {
                window.location.href = "mobile/index.php";
            }
        }
        else {
            if (reffParam) {
                window.location.href = "dekstop/index.php?page=daftar&reff=" + reffParam;
            } else {
                window.location.href = "dekstop/index.php";
            }
        }
    </script>
</body>
</html>
