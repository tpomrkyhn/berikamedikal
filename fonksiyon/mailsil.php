<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  $query = query("SELECT * FROM siller WHERE sil_tip = 'mail' AND sil_uye_id = '".session("uye_id")."' AND sil = '".p("id")."' AND sil_durum >= '1'");
  if(!mysql_affected_rows()){

      $ekle = query("INSERT INTO siller SET sil_tip = 'mail', sil_uye_id = '".session("uye_id")."', sil = '".p("id")."', sil_durum = '1'");
      if($ekle){

          echo "copetasindi";

      }else{

          echo "silinemedi";

      }

  }else{

      $query = query("SELECT * FROM siller WHERE sil_tip = 'mail' AND sil_uye_id = '".session("uye_id")."' AND sil = '".p("id")."' AND sil_durum >= '2'");
      if(!mysql_affected_rows()){

          $guncelle = query("UPDATE siller SET sil_durum = '2' WHERE sil_tip = 'mail' AND sil_uye_id = '".session("uye_id")."' AND sil = '".p("id")."'");
          if($guncelle){

              echo "tamamensilindi";

          }else{

              echo "silinemedi";

          }

      }

  }

?>
