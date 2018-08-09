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


    <td colspan="6" class="text-right text-bold" style="padding-top: 30px">
        <?= $d["bruttutar"] ?>:<br>
        <?= $d["toplamiskonto"] ?>:<br>
        <?= $d["aratoplam"] ?>:<br>
        <?= $d["kdv"] ?> (%18):<br>
        <h5 class="text-bold"><?= $d["geneltoplam"] ?>:</h5>
    </td>
    <td class="text-right" style="padding-top: 30px">
        <?= ondalik(faturatoplam(p("gelen"),"brut")) ?><br>
        <?= ondalik(faturatoplam(p("gelen"),"iskonto")) ?><br>
        <?= ondalik(faturatoplam(p("gelen"),"ara")) ?><br>
        <?= ondalik(faturatoplam(p("gelen"),"kdv")) ?><br>
        <h5 class="text-bold"><?= ondalik(faturatoplam(p("gelen"))) ?></h5>
    </td>



