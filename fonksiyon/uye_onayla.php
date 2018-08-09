<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  $id = p("id");

  $query = query("UPDATE uyeler SET uye_onay = 'evet' WHERE uye_id = '$id'");
  if($query){

    echo "onay";

  }

?>
