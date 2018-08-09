<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  $query = query("SELECT * FROM siller WHERE sil_tip = 'mail' AND sil_uye_id = '".session("uye_id")."' AND sil = '".p("id")."' AND sil_durum = '1'");
  if(mysql_affected_rows()){

      $ekle = query("DELETE FROM siller WHERE sil_tip = 'mail' AND sil_uye_id = '".session("uye_id")."' AND sil = '".p("id")."'");
      if($ekle){

          echo "coptencikarildi";

      }else{

          echo "silinemedi";

      }

  }

?>
