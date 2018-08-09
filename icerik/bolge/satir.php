<?

require_once "../../sistem/ayar.php";
require_once "../../sistem/fonksiyon.php";

$aid = p("id");


?>

<style>

    td{

        border: 1px solid #adadad;

        padding: 8px;

    }

</style>

<table style="width: 100%">

    <tr>

        <td class="text-bold">Ürün Kodu</td>
        <td class="text-bold">Ürün Adı</td>
        <td class="text-bold text-center">Adet</td>
        <td class="text-bold text-center"></td>

    </tr>

    <?

    $query = query("SELECT * FROM satirlar WHERE satir_siparis_id = '$aid'");

    while($row = row($query)){

        $urun = row(query("SELECT * FROM urunler WHERE urun_id = '".$row["satir_urun_id"]."'"));

    ?>

    <tr>

        <td><?= $urun["urun_kodu"] ?></td>
        <td><?= $urun["urun_adi"] ?></td>
        <td class="text-center"><?= ondalik($row["satir_adet"]) ?></td>
        <td class="text-center"><i style="cursor: pointer" title="Ürüne Git" onclick="window.open('index.php?do=urun&id=<?= $row["satir_urun_id"] ?>')" class="icon-drawer"></i></td>

    </tr>

    <? } ?>

</table>
