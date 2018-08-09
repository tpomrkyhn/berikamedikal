<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  if(p("grupKodu") == "" || p("grupAdi") == ""){

    echo "eksik";

  }else {



      $eklehazir = $pdo->prepare("INSERT INTO parcagruplari SET
                                        grup_adi = :grupAdi,
                                        grup_kod = :grupKodu
                                        ");

      $ekle = $eklehazir->execute(array(
          "grupAdi" => p("grupAdi"),
          "grupKodu" => p("grupKodu")
      ));

      if ($ekle) {

          echo $pdo->lastInsertId();

      }else{

          echo "hata";

      }

  }

?>
