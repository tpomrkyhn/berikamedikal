<?

require_once "../sistem/ayar.php";

$kdvtercih = "dahil";
$doviz = "try";
$dovizsimge = "₺";
$kusurat = 2;

if (!isset($_SESSION["dil"])) {
    $dil = "tr";

    $_SESSION["dil"] = $dil;

} else {
    $dil = $_SESSION["dil"];
}

include_once "../diller/$dil.php";

require_once "../sistem/fonksiyon.php";

$ssayfa = p("sayfa");

$tanimlikod = "ana";
$tanimliekbilgi = "marka";
$tanimliazadet = 3;

$sure_baslangici = microtime(true);

$ar = p("arama");

$sonuclar = array();
$kelimeler = explode(" ",$ar);

$sayi = count($kelimeler) - 1;
$i = 0;

while ($i <= $sayi) {

    $ara = $kelimeler[$i];

    $adlar = query("SELECT * FROM urunadlari WHERE ad LIKE '%$ara%'");
    while($rowad = row($adlar)){

        $urunid = ss($rowad["ad_urun_id"]);

        if(!in_array($urunid, $sonuclar)){

            array_push($sonuclar,$urunid);

        }

    }

    $kodlar = query("SELECT * FROM urunkodlari WHERE kod LIKE '%$ara%'");
    while($rowkod = row($kodlar)){

        $urunid = ss($rowkod["kod_urun_id"]);

        if(!in_array($urunid, $sonuclar)){

            array_push($sonuclar,$urunid);

        }

    }

    $anahtarlar = query("SELECT * FROM urunanahtarkelime WHERE anahtar = '$ara'");
    while($rowanahtar = row($anahtarlar)){

        $urunid = ss($rowanahtar["anahtar_urun_id"]);

        if(!in_array($urunid, $sonuclar)){

            array_push($sonuclar,$urunid);

        }

    }

    $ekler = query("SELECT * FROM urunekbilgileri WHERE ek LIKE '%$ara%'");
    while($rowek = row($ekler)){

        $urunid = ss($rowek["ek_urun_id"]);

        if(!in_array($urunid, $sonuclar)){

            array_push($sonuclar,$urunid);

        }

    }

    $gorseller = query("SELECT * FROM urungorselleri WHERE gorsel LIKE '%$ara%'");
    while($rowgorsel = row($gorseller)){

        $urunid = ss($rowgorsel["ek_urun_id"]);

        if(!in_array($urunid, $sonuclar)){

            array_push($sonuclar,$urunid);

        }

    }

    $i++;

}

$sonucadet = count($sonuclar);

$sure_bitimi = microtime(true);
$sure = round($sure_bitimi - $sure_baslangici,6);

$sayfa = g("sayfa");

$sayfaadet = ceil($sonucadet / 10);

if($sayfa == ""){

    $sayfa = 1;

}else if($sayfa > $sayfaadet){

    $sayfa = 1;

}

$baslangic = ($sayfa - 1) * 10;
$bitis = ($sayfa * 10) - 1;


?>

<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
      type="text/css">
<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="assets/css/core.css" rel="stylesheet" type="text/css">
<link href="assets/css/components.css" rel="stylesheet" type="text/css">
<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
<!-- /global stylesheets -->

<!-- Core JS files -->
<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/ui/nicescroll.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/ui/drilldown.js"></script>
<!-- /core JS files -->

<?php require_once "../tp-admin/icerik/ustcagir.php"; ?>

<?

$i = 0;
while ($i <= $sonucadet - 1) {



    $uid = $sonuclar[$i];

    $gorselquery = query("SELECT * FROM urungorselleri WHERE gorsel_urun_id = '$uid'");
    $gorselrow = row($gorselquery);
    $gorsel = ss($gorselrow["gorsel"]);

    $adquery = query("SELECT * FROM urunadlari WHERE ad_urun_id = '$uid' AND ad_dil = '$dil'");
    $adrow = row($adquery);
    $ad = ss($adrow["ad"]);

    $kodquery = query("SELECT * FROM urunkodlari WHERE kod_urun_id = '$uid' AND kod_adi = '$tanimlikod'");
    $kodrow = row($kodquery);
    $kod = ss($kodrow["kod"]);

    $ekbilgiquery = query("SELECT * FROM urunekbilgileri WHERE ek_urun_id = '$uid' AND ek_adi = '$tanimliekbilgi'");
    $ekbilgirow = row($ekbilgiquery);
    $ekbilgi = ss($ekbilgirow["ek"]);

    $anahtarq = query("SELECT * FROM urunanahtarkelime WHERE anahtar_urun_id = '$urunid'");

    while($row = row($anahtarq)){

        $anahtarlarr = $anahtarlarr." - ".$row["anahtar"];

    }

    $anahtarlarr = ltrim($anahtarlarr," - ");


    ?>

    <li class="media">
        <div class="media-body">
            <h6 class="media-heading"><a href="index.php?do=<?= $ssayfa ?>&id=<?= $uid ?>"><?= $ad ?></a></h6>
            <ul class="list-inline list-inline-separate text-muted">
                <li><?= $kod ?></li>
                <li><?= $ekbilgi ?></li>
            </ul>
            <?= $anahtarlarr ?>

        </div>
    </li>

    <?

    atla:

    $i++;

}

?>
