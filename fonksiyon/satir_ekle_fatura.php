<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

extract($_POST);


  $id = "y";

  $hareket_urun_no = p("satir_no_".$id);
  $hareket_urun_aciklama = p("satir_aciklama_".$id);
  $hareket_adet = p("satir_adet_".$id);
  $hareket_isk1 = p("satir_isk1_".$id);
  $hareket_isk2 = p("satir_isk2_".$id);
  $hareket_fiyat = p("satir_fiyat_".$id);
  $hareket_urun_id = p("satir_urun_id_".$id);
  $belge_id = p("belge");

  $hareket_fiyat = str_replace(".","",$hareket_fiyat);
  $hareket_fiyat = str_replace(",",".",$hareket_fiyat);

  $insert = query("INSERT INTO urunhareketleri SET
    hareket_urun_no = '$hareket_urun_no',
    hareket_urun_aciklama = '$hareket_urun_aciklama',
    hareket_adet = '$hareket_adet',
    hareket_isk1 = '$hareket_isk1',
    hareket_isk2 = '$hareket_isk2',
    hareket_fiyat = '$hareket_fiyat',
    hareket_urun_id = '$hareket_urun_id',
    hareket_belge_id = '$belge_id',
    tip = 'fatura'");

  if($insert){

    echo mysql_insert_id();

  }else{

    echo "hata";

  }

?>
