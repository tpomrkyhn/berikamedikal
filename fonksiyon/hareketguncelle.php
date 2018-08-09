<?

require_once "../sistem/ayar.php";
require_once "../sistem/fonksiyon.php";

$uye_id =  session("uye_id");

    if(p("hareketParca") == "" || p("hareketTarih") == ""){

    echo "eksik";

  }else {

     
      $eklehazir = $pdo->prepare("UPDATE hareketler SET
                                        hareket_parca_id = :parcaAdi,
                                        hareket_tip = 'arti',
                                        hareket_uye_id = :uyeId,
                                        hareket_tedarikci_id = :hareketTedarikci,
                                        hareket_miktar = :haretetAdet,
                                        hareket_tarih = :tarih
                                        WHERE hareket_id = '".p("hareketId")."'
                                        ");

      $ekle = $eklehazir->execute(array(
          "parcaAdi" => p("hareketParca"),
          "uyeId" => $uye_id,
          "tarih" => tarih(p("hareketTarih"),"veritabani","arama"),
          "haretetAdet" => p("hareketAdet"),
          "hareketTedarikci" => p("hareketTedarikci")
      ));

      if ($ekle) {

          echo p("hareketId");

      }else{

          echo "hata";

      }

  }

   ?>