<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  if(p("urunAdiTurkce") == "" || p("urunKodu") == ""){

    echo "eksik";

  }else {

      $eklehazir = $pdo->prepare("INSERT INTO urunler SET
                                        urun_adi = :urunAdiTurkce,
                                        urun_adi_en = :urunAdiIngilizce,
                                        urun_aciklama = :urunAciklama,
                                        urun_kodu = :urunKodu,
                                        urun_tip = :urunTip
                                        ");

      $ekle = $eklehazir->execute(array(
          "urunAdiTurkce" => p("urunAdiTurkce"),
          "urunAdiIngilizce" => p("urunAdiIngilizce"),
          "urunAciklama" => p("urunAciklama"),
          "urunKodu" => p("urunKodu"),
          "urunTip" => p("urunTip")
      ));

      if ($ekle) {

          echo $pdo->lastInsertId();

      }else{

          echo "hata";

      }

  }

?>
