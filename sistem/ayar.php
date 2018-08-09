<?php
/*  lydSoft by Tayyip Oto GMBH
    www.lydsoft.net
    Ömer Necmi KAYHAN - Genel Müdür
    Copyright 2017   */

    ob_start("ob_gzhandler");

	session_start();

	## Hata ##
	error_reporting(0);

	## Değişkenler ##

	$host = "94.73.146.33";			//online natro server
	$user = "u7451818_userF9A";
	$pass = "GSnx51P2";
	$db = "u7451818_berika";
/*
	$host = "localhost";			//local ali
	$user = "root";
	$pass = "";
	$db = "u7451818_berika";

	$host = "localhost";			//local ömer
	$user = "root";
	$pass = "";
	$db = "ticaretplus";*/


	## Mysql Bağlantısı ##
	$baglan = mysql_connect($host, $user, $pass) or die ("#0003" . mysql_Error());

	try {
		$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", "$user", "$pass");
	} catch ( PDOException $e ){
		print $e->getMessage();
	}


	## Veritabanı Seçimi ##
	mysql_select_db($db, $baglan) or die (mysql_Error());

	## Karakter ##
	mysql_query("SET CHARACTER SET 'utf8'");
	mysql_query("SET NAMES 'utf8'");

	## Genel Ayarlar ##
	$query = mysql_query("SELECT * FROM ayarlar");
	$ayar = mysql_fetch_array($query);

	function ayar($gelen){

		return mysql_fetch_array(mysql_query("SELECT * FROM ayarlar"))[$gelen];

	}

		## Sabitler ##
        define("THIS", "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);


?>
