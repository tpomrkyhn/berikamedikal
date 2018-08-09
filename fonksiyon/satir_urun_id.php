<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  $query = query("SELECT * FROM urunhareketleri WHERE hareket_id = '".p("id")."'");
  if($query){

    $hareket = row($query);

    $query04 = query("SELECT * FROM urunler WHERE urun_id = '".$hareket["hareket_urun_id"]."'");
    if(mysql_affected_rows()){

      echo $hareket["hareket_urun_id"];

    }else{

      $query02 = query("SELECT * FROM urunadlari WHERE ad = '".$hareket["hareket_urun_aciklama"]."'");
      $ad = row($query02);
      $ad_id = $ad["ad_urun_id"];

      $query03 = query("SELECT * FROM urunkodlari WHERE kod = '".$hareket["hareket_urun_no"]."'");
      $kod = row($query03);
      $kod_id = $kod["kod_urun_id"];

      if($kod_id == $ad_id){

        echo $kod_id;

      }else{

        echo "urunyok";

      }

    }

  }else{

    echo "urunyok";

  }

?>
