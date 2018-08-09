<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  $id = p("id");

  $query = query("DELETE FROM urungorselleri WHERE gorsel_id = '$id'");
  if($query){

    echo "onay";

  }

?>
