<?

require_once "../sistem/ayar.php";
require_once "../sistem/fonksiyon.php";

$id = p("id");

$belge_no = p("belge_no");
$belge_sirket_id = p("belge_sirket_id");
$belge_tarih = tarih(p("belge_tarih"), "veritabani", "arama");
$fiilitarih = tarih(p("fiilitarih"), "veritabani", "arama");
$not = p("not");

$update = query("UPDATE belgeler SET belge_no = '$belge_no', belge_sirket_id = '$belge_sirket_id', belge_tarih = '$belge_tarih' WHERE belge_id = '$id'");
$update2 = query("UPDATE belgeaciklamalari SET aciklama = '$fiilitarih' WHERE aciklama_adi = 'fiilitarih' AND aciklama_belge_id = '$id'");
$update3 = query("UPDATE belgeaciklamalari SET aciklama = '$not' WHERE aciklama_adi = 'not' AND aciklama_belge_id = '$id'");

?>
