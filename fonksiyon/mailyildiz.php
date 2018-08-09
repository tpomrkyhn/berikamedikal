<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  $query = query("SELECT * FROM yildizlar WHERE yildiz_tip = 'mail' AND yildiz_uye_id = '".session("uye_id")."' AND yildiz = '".p("id")."'");
  if(mysql_affected_rows()){

    $sil = query("DELETE FROM yildizlar WHERE yildiz_tip = 'mail' AND yildiz_uye_id = '".session("uye_id")."' AND yildiz = '".p("id")."'");
    if($sil){

      echo "bos";

    }else{

        echo "hata";

    }

  }else{

    $ekle = query("INSERT INTO yildizlar SET yildiz_tip = 'mail', yildiz_uye_id = '".session("uye_id")."', yildiz = '".p("id")."'");
    if($ekle){

        echo "dolu";

    }else{

        echo "hata";

    }

  }

?>
