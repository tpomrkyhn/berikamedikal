<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  $id = p("id");
  $tip = p("tip");

  $query = query("DELETE FROM belgeler WHERE belge_id = '$id' AND belge_tip = '$tip'");
  if($query){

    echo "hareket".$id;

  }

?>
