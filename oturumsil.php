<?php

require_once "sistem/cagir.php";

$key = md5($hostname=$_SERVER['HTTP_USER_AGENT'].$_SERVER[REMOTE_ADDR]);

$query = query("DELETE FROM oturumlar WHERE oturum_key = '$key' AND oturum_tip = 'unutma'");

go($_SERVER["HTTP_REFERER"]);

?>