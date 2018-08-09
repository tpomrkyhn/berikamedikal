<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  if(p("siparisKodu") == "" || p("siparisTarih") == ""){

    echo "eksik";

  }else {


      $eklehazir = $pdo->prepare("UPDATE siparisler SET
                                        siparis_musteri_id = :siparisMusteri,
                                        siparis_kodu = :siparisKodu,
                                        siparis_tarih = :siparisTarih,
                                        siparis_not = :siparisNot
                                        WHERE siparis_id = '".p("siparisid")."'");


      $ekle = $eklehazir->execute(array(
          "siparisMusteri" => p("siparisMusteri"),
          "siparisKodu" => p("siparisKodu"),
          "siparisTarih" => tarih(p("siparisTarih"),"veritabani","arama"),
          "siparisNot" => p("siparisNot")
      ));

      if ($ekle) {



      } else {

          echo "hata";

      }

  }

?>
