<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  $query = query("DELETE FROM urunhareketleri WHERE hareket_belge_id = '".p("gelen")."'");
  if($query){

    $query = query("DELETE FROM belgeler WHERE belge_id = '".p("gelen")."'");

    if($query){

      echo "oldu";

    }

  }

?>
