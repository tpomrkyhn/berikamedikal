<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

extract($_POST);

  $hareket_urun_no = p("satir_no_".$id);
  $hareket_urun_aciklama = p("satir_aciklama_".$id);
  $hareket_adet = p("satir_adet_".$id);
  $hareket_isk1 = p("satir_isk1_".$id);
  $hareket_isk2 = p("satir_isk2_".$id);
  $hareket_fiyat = p("satir_fiyat_".$id);
$hareket_fiyat_doviz = p("satir_fiyat_doviz_".$id);
$hareket_doviz = p("satir_doviz_".$id);
  $hareket_urun_id = p("satir_urun_id_".$id);

  $hareket_fiyat = str_replace(".","",$hareket_fiyat);
  $hareket_fiyat = str_replace(",",".",$hareket_fiyat);

  $update = query("UPDATE urunhareketleri SET
    hareket_urun_no = '$hareket_urun_no',
    hareket_urun_aciklama = '$hareket_urun_aciklama',
    hareket_adet = '$hareket_adet',
    hareket_isk1 = '$hareket_isk1',
    hareket_isk2 = '$hareket_isk2',
    hareket_fiyat = '$hareket_fiyat',
    hareket_fiyat_doviz = '$hareket_fiyat_doviz',
    hareket_doviz = '$hareket_doviz',
    hareket_urun_id = '$hareket_urun_id'
  WHERE hareket_id = '$id'");

  if($update){

    echo "onay";

  }else{

    echo mysql_error();

  }

?>
