<?php require_once "icerik/ust.php"; ?>

<?php

  $do = g("do");
  if($do == ""){
   //require_once "icerik/anasayfa.php";
  }else{
    require_once "icerik/lyd_$do.php";
  }

?>

<?php require_once "icerik/alt.php"; ?>
