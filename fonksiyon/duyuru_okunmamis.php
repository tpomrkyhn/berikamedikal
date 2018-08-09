<?

require_once "../sistem/ayar.php";
require_once "../sistem/fonksiyon.php";

if (!isset($_SESSION["dil"])) {
    $dil = "tr";

    $_SESSION["dil"] = $dil;

} else {
    $dil = $_SESSION["dil"];
}

include_once "../diller/$dil.php";


?>

<div class="dropdown-content-heading">
    <?= $d["duyurular"] ?>
</div>


<ul class="media-list dropdown-content-body">

    <?

    $query = query("SELECT * FROM duyurular WHERE duyuru_gecerlilik >= CURDATE() AND (duyuru_tip = '" . session("uye_tip") . "' OR duyuru_tip = 'genel') ORDER BY duyuru_id DESC");
    $adet = mysql_num_rows($query);
    if ($adet == 0) {

        ?>

        <li class="media">

            <div class="media-body text-center">
                <span class="text-muted">Duyuru Yok</span>
            </div>

        </li>

        <?

    }
    while ($duyuru = row($query)) {

        $query02 = query("SELECT * FROM okular WHERE tip = 'duyuru' AND oku_varlik_id = '" . $duyuru["duyuru_id"] . "' AND oku_uye_id = '" . session("uye_id") . "'");
        if (!mysql_affected_rows()) {

            $ek = "semibold";

        } else {

            $ek = "muted";

        }

        ?>

        <li class="media">

            <div class="media-body">
                <a href="index.php?do=duyurular&id=<?= $duyuru["duyuru_id"] ?>" class="media-heading">
                    <span class="text-<?= $ek ?>"><?= $duyuru["duyuru_baslik"] ?></span>
                </a>

                <span class="text-muted"><?= mb_substr($duyuru["duyuru"], "0", "50") ?></span>
            </div>

        </li>

        <?

    }

    ?>

</ul>


<div class="dropdown-content-heading">
    <?= $d["cekvesenetler"] ?>
</div>


<ul class="media-list dropdown-content-body">


    <?

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
        $i++;

    }

    $sonuclar = array_values($sonuclar);
    $sonucadet = count($sonuclar);

    $i = 0;
    while ($i <= $sonucadet - 1) {


        $uid = $sonuclar[$i];

        $query = query("SELECT * FROM belgeler WHERE belge_id = '$uid' AND ( belge_tip = 'ceksatis' OR belge_tip = 'cekalis' OR belge_tip = 'senetsatis' OR belge_tip = 'senetalis' )");
        $row = row($query);

        $no = $row["belge_no"];
        $unvan = sirket("unvan", $row["belge_sirket_id"]);
        $tarih = tarih($row["belge_tarih"], "on", "tarih");

        $h01 = query("SELECT * FROM belgeaciklamalari WHERE aciklama_adi = 'odeme_tarih' AND aciklama_belge_id = '" . $row["belge_id"] . "'");
        $tarih = row($h01)["aciklama"];

        if (kalangun($tarih) <= ayar("tanimli_cari_kalangun") && kalangun($tarih) > 0) {

            $bildirim = $d["son"] . " " . kalangun($tarih) . " " . $d["gun"];

        } else if (kalangun($tarih) == "0") {

            $bildirim = $d["bugunodemegunu"];

        }

        $query = query("SELECT * FROM okular WHERE tip = 'belge' AND oku_varlik_id = '$uid' AND oku_uye_id = '".session("uye_id")."'");
        if (!mysql_affected_rows()) {

            $ek = "semibold";

        } else {

            $ek = "muted";

        }

        ?>

        <li class="media">

            <div class="media-body">
                <a href="index.php?do=carihareketleri&id=<?= $row["belge_sirket_id"] ?>" class="media-heading">
                    <span class="text-<?= $ek ?>"><?= $unvan ?></span>
                    <span class="media-annotation pull-right"><?= tarih($tarih,"on","gun-ay") ?></span>
                </a>

                <span class="text-muted"><?= $bildirim . " - " . $no ?></span>
            </div>

        </li>

        <?

        $i++;

    }

    ?>


</ul>


