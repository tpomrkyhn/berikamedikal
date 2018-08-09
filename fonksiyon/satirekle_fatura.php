<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";
  $hid = 19; ?>

  <?

    $satirlar = query("SELECT * FROM urunhareketleri WHERE hareket_id = '$hid' AND tip = 'siparis'");

    $kalem = row($satirlar);

      $hid = $kalem["hareket_id"];

  ?>

<form id="form_<?= $hid ?>" method="post">

  <input style="display:none" type="text" name="id" value="<?= $hid ?>">

  <tr style="border-bottom: 1px solid rgb(226,226,226)">
    <td class="text-center"><?= $i ?></td>
    <td class="text-left"><input onfocus="satir_icerik_<?= $hid ?>()" onchange="satir_post_<?= $hid ?>()" name="satir_no_<?= $hid ?>" id="satir_no_<?= $hid ?>" class="satir" type="text" value="<?= $kalem["hareket_urun_no"] ?>"></td>
    <td class="text-left"><input onfocus="satir_icerik_<?= $hid ?>()" onchange="satir_post_<?= $hid ?>()" name="satir_aciklama_<?= $hid ?>" id="satir_aciklama_<?= $hid ?>" class="satir" type="text" value="<?= $kalem["hareket_urun_aciklama"] ?>"></td>
    <td class="text-center"><input onfocus="satir_icerik_<?= $hid ?>()" onchange="satir_post_<?= $hid ?>()" name="satir_adet_<?= $hid ?>" id="satir_adet_<?= $hid ?>" class="satir ortali" type="text" value="<?= $kalem["hareket_adet"] ?>"></td>
    <td class="text-center"><input onfocus="satir_icerik_<?= $hid ?>()" onchange="satir_post_<?= $hid ?>()" name="satir_isk1_<?= $hid ?>" id="satir_isk1_<?= $hid ?>" class="satir ortali" type="text" value="<?= $kalem["hareket_isk1"] ?>"></td>
    <td class="text-center"><input onfocus="satir_icerik_<?= $hid ?>()" onchange="satir_post_<?= $hid ?>()" name="satir_isk2_<?= $hid ?>" id="satir_isk2_<?= $hid ?>" class="satir ortali" type="text" value="<?= $kalem["hareket_isk2"] ?>"></td>
    <td class="text-right"><input onfocus="satir_icerik_<?= $hid ?>()" onchange="satir_post_<?= $hid ?>()" name="satir_fiyat_<?= $hid ?>" id="satir_fiyat_<?= $hid ?>" class="satir sagadayali" type="text" value="<?= ondalik($kalem["hareket_fiyat"]) ?>"></td>
    <td class="text-right"><input onfocus="satir_icerik_<?= $hid ?>()" readonly name="satir_post_<?= $hid ?>" id="satir_tutar_<?= $hid ?>" class="satir sagadayali" type="text" value="<?= ondalik($kalem["hareket_adet"]*$kalem["hareket_fiyat"]) ?>"></td>
  </tr>

  <tr id="satir_secenek_<?= $hid ?>" class="gizle" onclickout="">
    <td class="text-center"><i onclick="satir_icerik_kapat_<?= $hid ?>()" class="icon-close2"></i></td>
    <td colspan="7">

      <span class="text-bold"><?= $d["kdv"] ?>(%):</span><input size="2" type="text" name="satir_kdv_<?= $hid ?>" id="satir_kdv_<?= $hid ?>" class="satir2 ortali" value="<?= $kalem["hareket_kdv"] ?>">

    </td>
  </tr>

</form>
