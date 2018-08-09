<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  if(p("grupKodu") == "" || p("grupAdi") == ""){

    echo "eksik";

  }else {



      $eklehazir = $pdo->prepare("UPDATE parcagruplari SET
                                        grup_adi = :grupAdi,
                                        grup_kod = :grupKodu
                                        WHERE grup_id = '".p("grupid")."'");

      $ekle = $eklehazir->execute(array(
          "grupAdi" => p("grupAdi"),
          "grupKodu" => p("grupKodu")
      ));

      if ($ekle) {



      }else{

          echo "hata";

      }

  }

?>
