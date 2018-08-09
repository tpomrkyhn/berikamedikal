<?

require_once "../sistem/ayar.php";
require_once "../sistem/fonksiyon.php";

$id = p("id");

$plaka = p("plaka");

$query = query("SELECT * FROM belgeaciklamalari WHERE aciklama_adi = 'klnc-plaka' AND aciklama_belge_id = '$id'");

if(mysql_affected_rows()){

  $update = query("UPDATE belgeaciklamalari SET aciklama = '$plaka' WHERE aciklama_belge_id = '$id' AND aciklama_adi = 'klnc-plaka'");

}else{

  $update = query("INSERT INTO belgeaciklamalari SET aciklama = '$plaka', aciklama_belge_id = '$id', aciklama_adi = 'klnc-plaka'");

}

?>
