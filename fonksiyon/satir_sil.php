<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  $query = query("DELETE FROM urunhareketleri WHERE hareket_id = '".p("gelen")."'");

?>
