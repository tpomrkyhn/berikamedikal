<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  $uye_id = session("uye_id");

  if(p("satirAdet") == ""){

    echo "eksik";

  }else{

      $query = query("SELECT * FROM satirlar WHERE satir_siparis_id = '".p("siparisid2")."'");
      if(mysql_affected_rows()){

          $row = row($query);

          $eklehazir = $pdo->prepare("UPDATE satirlar SET
                                        satir_adet = :satirAdet,
                                        satir_uye_id = '$uye_id'
                                        WHERE satir_id = '".$row["satir_id"]."'");

          $ekle = $eklehazir->execute(array(
              "satirAdet" => p("satirAdet") + $row["satir_adet"]
          ));

      }else{

          $eklehazir = $pdo->prepare("INSERT INTO satirlar SET
                                        satir_siparis_id = '".p("siparisid2")."',
                                        satir_urun_id = :satirUrun,
                                        satir_adet = :satirAdet,
                                        satir_uye_id = '$uye_id'
                                        ");

          $ekle = $eklehazir->execute(array(
              "satirUrun" => p("satirUrun"),
              "satirAdet" => p("satirAdet")
          ));


      }

      if ($ekle) {



      }else{

          echo "hata";

      }
     
  }

?>
