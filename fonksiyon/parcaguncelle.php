<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  if(p("parcaAdi") == "" || p("parcaKodu") == ""){

    echo "eksik";

  }else{

      $alis = row(query("SELECT * FROM birimler WHERE birim = '".p("alisBirim")."'"))["birim_id"];
      $satis = row(query("SELECT * FROM birimler WHERE birim = '".p("satisBirim")."'"))["birim_id"];
    if (($satis == $alis && p("katsayi") == 1) || ($satis !== $alis)) {

      $eklehazir = $pdo->prepare("UPDATE parcalar SET
                                        parca_adi = :parcaAdi,
                                        parca_aciklama = :parcaAciklama,
                                        parca_kodu = :parcaKodu,
                                        parca_min_stok = :minStok,
                                        parca_alisbirim = '$alis',
                                        parca_satisbirim = '$satis',
                                        parca_oran = :katsayi,
                                        parca_tip = :parcaTip,
                                        parca_grup = :parcaGrup,
                                        parca_temin = :parcaTemin
                                        WHERE parca_id = '".p("parcaid")."'
                                        ");

      $ekle = $eklehazir->execute(array(
          "parcaAdi" => p("parcaAdi"),
          "parcaAciklama" => p("parcaAciklama"),
          "parcaKodu" => p("grupKodu").p("parcaKodu"),
          "minStok" => p("minStok"),
          "katsayi" => p("katsayi"),
          "parcaTip" => p("parcaTip"),
          "parcaGrup" => p("grupKodu"),
          "parcaTemin" => p("parcaTemin")
      ));

      if ($ekle) {



      }else{

          echo "hata";

      }

    }else{
        echo "katsayihatasi";

    }

  }

?>
