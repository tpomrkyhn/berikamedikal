<?php

require_once "sistem/cagir.php";


?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>lydSoft</title>

    <link rel="shortcut icon" href="http://lydsoft.net/lydicon.png" type="image/x-icon"/>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/core/libraries/jquery_ui/full.min.js"></script>
    <script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/ui/nicescroll.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/ui/drilldown.js"></script>
    <!-- /core JS files -->

    <?php require_once "icerik/ustcagir.php"; ?>

    <script src="assets/js/md5.min.js"></script>

    <?php require_once "sistem/baslik.php"; ?>
    <!-- /theme JS files -->

</head>

<body class="<?

if (session("login")) {
} else {
    echo "login-container";
}

?>">

<?

$grup = "tum";

if (session("login")) {

    require_once "icerik/ana.php";

} else {

    if (g("do") == "dil_sec") {
        require_once "icerik/ana.php";
    } else {
        require_once "icerik/giris.php";
    }

}


if(strpos($grup,uye("tip",session("uye_id"))) || $grup == "tum"){



}else{
    if (uye("tip",session("uye_id")) == "admin"){


      
    }else{

       go("index.php?do=erisimhatasi");
    }



}

?>


</body>
</html>
