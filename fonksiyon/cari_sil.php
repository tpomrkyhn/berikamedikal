<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  $query = query("DELETE FROM sirketaciklamalari WHERE aciklama_sirket_id = '".p("gelen")."'");
  if($query){

    $query = query("DELETE FROM sirketler WHERE sirket_id = '".p("gelen")."'");

    if($query){

      echo "oldu";

    }

  }

?>
