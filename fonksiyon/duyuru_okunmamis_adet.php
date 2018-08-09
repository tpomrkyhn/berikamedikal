<?

require_once "../sistem/ayar.php";
require_once "../sistem/fonksiyon.php";

$eadet = 0;

$query = query("SELECT * FROM duyurular WHERE duyuru_gecerlilik >= CURDATE() AND (duyuru_tip = '" . session("uye_tip") . "' OR duyuru_tip = 'genel') ORDER BY duyuru_id DESC");
$adet = mysql_num_rows($query);
while ($duyuru = row($query)) {

    $query02 = query("SELECT * FROM okular WHERE tip = 'duyuru' AND oku_varlik_id = '" . $duyuru["duyuru_id"] . "' AND oku_uye_id = '" . session("uye_id") . "'");
    if (!mysql_affected_rows()) {

        $eadet++;

    }

}

$sonuclar = array();

$hareketler = query("SELECT * FROM belgeaciklamalari WHERE aciklama_adi = 'odeme_tarih' AND aciklama >= CURDATE() AND aciklama <= CURDATE() + ".ayar("tanimli_cari_kalangun")." ORDER BY aciklama ASC");
while ($hareket = row($hareketler)) {

    if (!in_array($hareket["aciklama_belge_id"], $sonuclar)) {

        array_push($sonuclar, $hareket["aciklama_belge_id"]);

    }

}

$sonucadet = count($sonuclar);

$i = 0;
while ($i <= $sonucadet - 1) {

    $uid = $sonuclar[$i];

    $query = query("SELECT * FROM belgeler WHERE belge_id = '$uid' AND ( belge_tip = 'ceksatis' OR belge_tip = 'cekalis' OR belge_tip = 'senetsatis' OR belge_tip = 'senetalis' )");
    if (!mysql_affected_rows()) {
        unset($sonuclar[$i]);
    }
    $query = query("SELECT * FROM okular WHERE tip = 'belge' AND oku_varlik_id = '$uid' AND oku_uye_id = '".session("uye_id")."'");
    if (mysql_affected_rows()) {
        unset($sonuclar[$i]);
    }
    $i++;

}

$sonuclar = array_values($sonuclar);
$sonucadet = count($sonuclar);

$eadet += $sonucadet;

echo $eadet;

?>

