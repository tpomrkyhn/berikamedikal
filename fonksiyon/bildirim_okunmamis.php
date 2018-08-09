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

$siller = query("SELECT * FROM okular WHERE oku_tip = 'stokbildirim' AND oku_uye_id = '" . session("uye_id") . "'");
while ($sil = row($siller)){

    $parca = row(query("SELECT * FROM parcalar WHERE parca_id = '".$sil["oku_varlik_id"]."'"));

    if(stok($parca["parca_id"]) > $parca["parca_min_stok"]){

        $silq = query("DELETE FROM okular WHERE oku_id = '".$sil["oku_id"]."'");

    }

}


?>

<div class="dropdown-content-heading">
    <?= $d["stokbildirimleri"] ?>
</div>


<ul class="media-list dropdown-content-body">

    <?

    $sonuclar = array();

    $query = query("SELECT * FROM parcalar");

    while($parca = row($query)){

        $adet = stok($parca["parca_id"]);
        if($adet < $parca["parca_min_stok"]){

            array_push($sonuclar,$parca["parca_id"]);

        }

    }

    if (count($sonuclar) == 0) {

        ?>

        <li class="media">

            <div class="media-body text-center">
                <span class="text-muted"><?= $d["bildirimyok"] ?></span>
            </div>

        </li>

        <?

    }

    foreach($sonuclar as $id){

        $parca = row(query("SELECT * FROM parcalar WHERE parca_id = '$id'"));

        $adet = stok($id);

        $query02 = query("SELECT * FROM okular WHERE oku_tip = 'stokbildirim' AND oku_varlik_id = '$id' AND oku_uye_id = '" . session("uye_id") . "'");
        if (!mysql_affected_rows()) {

            $ek = "semibold";
            $ek2 = "";

        } else {

            $ek = "muted";
            $ek2 = "text-muted";

        }

        ?>

        <li class="media">

            <div class="media-body">
                <a href="index.php?do=parca&id=<?= $parca["parca_id"] ?>" class="media-heading">
                    <span class="text-<?= $ek ?>"><?= $parca["parca_kodu"]." · ".$parca["parca_adi"] ?></span>
                </a>

                <span class="text-muted"><?= $d["guncelstokadedi"]." : ".ondalik($adet)." · ".$d["minstok"]." : ".ondalik($parca["parca_min_stok"])." · ".ondalik($parca["parca_min_stok"] - $adet) ?></span>
                <br>
                <span style="cursor:pointer;" onclick="window.open('index.php?do=parca&id=<?= $parca["parca_id"] ?>')" class="<?= $ek2 ?>">Parça Görüntüle</span> · <span style="cursor:pointer;" onclick="window.open('index.php?do=hareketliste&id=<?= $parca["parca_id"] ?>')" class="<?= $ek2 ?>">Hareket Görüntüle</span>
            </div>

        </li>

        <?

    }

    ?>

</ul>

<div class="dropdown-content-heading">
    <?= $d["siparisbildirimleri"] ?>
</div>


<ul class="media-list dropdown-content-body">

    <?

    $_SESSION["uye_tip"] = "satinalma";

    $sonuclar = array();

    if(session("uye_tip") == "satinalma"){

        $query = query("SELECT * FROM siparisler WHERE siparis_durum <> 'tamamlandi' ORDER BY siparis_durum");

    }else if(session("uye_tip") == "uretim"){

        $query = query("SELECT * FROM siparisler WHERE siparis_durum <> 'beklemede' AND siparis_durum <> 'tamamlandi'");

    }

    while($siparis = row($query)){

        array_push($sonuclar,$siparis["siparis_id"]);

    }

    if (count($sonuclar) == 0) {

        ?>

        <li class="media">

            <div class="media-body text-center">
                <span class="text-muted"><?= $d["bildirimyok"] ?></span>
            </div>

        </li>

        <?

    }

    foreach($sonuclar as $id){

        $onayver = "";

        $siparis = row(query("SELECT * FROM siparisler WHERE siparis_id = '$id'"));

        if(session("uye_tip") == "satinalma"){

            if($siparis["siparis_durum"] == "beklemede"){

                $ek = "semibold";
                $ek2 = "";
                $simge = "alarm";
                $onayver = " · <span class='text-primary' style='cursor: pointer'>Onay Ver</span>";

            }else if($siparis["siparis_durum"] == "onaylandi"){

                $ek = "muted";
                $ek2 = "text-muted";
                $simge = "checkmark3";

            }else if($siparis["siparis_durum"] == "uretimde"){

                $ek = "muted";
                $ek2 = "text-muted";
                $simge = "cog7";

            }else if($siparis["siparis_durum"] == "uretildi"){

                $ek = "muted";
                $ek2 = "text-muted";
                $simge = "truck";

            }

        }else if(session("uye_tip") == "uretim"){

            $ek = "semibold";
            $ek2 = "";

        }

        $musteri  = row(query("SELECT * FROM sirketler WHERE sirket_tip = 'musteri' AND musteri_id = '".$siparis["siparis_musteri_id"]."'"));

        ?>

        <li class="media">

            <div class="media-left">
                <i class="icon-<?= $simge ?>"></i>
            </div>

            <div class="media-body">
                <a href="index.php?do=siparis&id=<?= $siparis["siparis_id"] ?>" class="media-heading">
                    <span class="text-<?= $ek ?>"><?= $siparis["siparis_kodu"]." · ".$musteri["musteri_adi"] ?></span>
                </a>
                <span class="<?= $ek2 ?>">Şu Anki Durum: <?= $d[$siparis["siparis_durum"]] ?></span><?= $onayver ?>
            </div>

        </li>

        <?

    }

    ?>

</ul>

