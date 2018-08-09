<?

  $sayfa = g("do");
  if($sayfa == ""){

    goto devam;

  }

  if(!session("login")){

      goto devam;

  }

  $atla = array(

    "",
    "profil",
    "cikisyap",
    "dil_sec",
    "erisimhatasi"

  );

  if(in_array($sayfa,$atla)){

    goto devam;

  }

  $uyeler = query("SELECT * FROM uyeler WHERE uye_id = '".session("uye_id")."'");
  $uye = row($uyeler);

  if($uye["tip"] == "admin"){

    goto devam;

  }else{

    $query = query("SELECT * FROM izinler WHERE tip = 'sayfa' AND izin_uye_tip = '".$uye["tip"]."' AND izin_sayfa_url = '$sayfa'");
    if(!mysql_affected_rows()){

      go("index.php?do=erisimhatasi");

    }

  }

  devam:

?>
