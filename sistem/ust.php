<?php
/*  lydSoft by Tayyip Oto GMBH
    www.lydsoft.net
    Ömer Necmi KAYHAN - Genel Müdür
    Copyright 2017   */
?>

<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">

<?

    $gelen = $_SERVER['REQUEST_URI'];

    $gelen = explode("&",$gelen)[0];

    $gelen = explode("?",$gelen)[1];

    $gelen = explode("=",$gelen)[1];

    $sayfaadi = query("SELECT * FROM sayfalar WHERE sayfa_url = '$gelen' AND sayfa_dil = '$dil'");

    $row = row($sayfaadi); $sayfaadi = ss($row["sayfa"]);

?>

<title><? if($sayfaadi == ""){ echo sirket("anaad")." | ".site("ad"); }else{ echo $sayfaadi." | ".site("ad"); } ?></title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="dosyalar/css/bootstrap.min.css">

<!-- Customizable CSS -->
<link rel="stylesheet" href="dosyalar/css/main.css">
<link rel="stylesheet" href="dosyalar/css/navy.css">
<link rel="stylesheet" href="dosyalar/css/owl.carousel.css">
<link rel="stylesheet" href="dosyalar/css/owl.transitions.css">
<link rel="stylesheet" href="dosyalar/css/animate.min.css">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="dosyalar/css/font-awesome.min.css">

<!-- Favicon -->
<link rel="shortcut icon" href="<?= site("icon"); ?>">

<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
<!--[if lt IE 9]>
<script src="dosyalar/js/html5shiv.js"></script>
<script src="dosyalar/js/respond.min.js"></script>
<![endif]-->