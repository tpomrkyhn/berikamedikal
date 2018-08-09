<?

require_once "ayar.php";


if (!isset($_SESSION["dil"])) {
    $dil = ayar("tanimli_dil");
    $_SESSION["dil"] = $dil;
} else {
    $dil = $_SESSION["dil"];
}

include_once "diller/$dil.php";

require_once "fonksiyon.php";


$ssayfa = g("do");
if ($ssayfa == "") {
    $ssayfa = "anasayfa";
}

require_once "izin.php";


$resim = session("uye_resim");

?>