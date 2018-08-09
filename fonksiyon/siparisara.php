<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  $term = p("term");

  if(strlen($term) > 1){

      ?>

      <thead>

      <tr>

          <th>Müşteri Adı</th>
          <th>Siparis Kodu</th>
          <th>Siparis Durum</th>
          
          <th></th>

      </tr>

      </thead>

      <?

      $sonuclar = array();

      $urunler = $pdo->query("SELECT * FROM siparisler WHERE siparis_kodu LIKE '%$term%'",PDO::FETCH_ASSOC);
      if ( $urunler->rowCount() ){

          foreach( $urunler as $urun ){

              array_push($sonuclar,$urun["siparis_id"]);

          }

      }

      $urunler = $pdo->query("SELECT * FROM sirketler WHERE (musteri_adi LIKE '%$term%' OR musteri_kodu LIKE '%$term%') AND sirket_tip = 'musteri'",PDO::FETCH_ASSOC);
      if ( $urunler->rowCount() ){

          foreach( $urunler as $urun ){

              $asd = $pdo->query("SELECT * FROM siparisler WHERE siparis_musteri_id = '".$urun["musteri_id"]."'",PDO::FETCH_ASSOC);
              if ( $asd->rowCount() ){

                  foreach( $asd as $idd ){

                      array_push($sonuclar,$idd["siparis_id"]);

                  }

              }

          }

      }

      $sonuclar = array_unique($sonuclar);


      foreach( $sonuclar as $urun ){

          $urun = row(query("SELECT * FROM siparisler WHERE siparis_id = '$urun'"));

          ?>

          <tr style="cursor: pointer" onclick="window.location = 'index.php?do=siparis&id=<?= $urun["siparis_id"] ?>'">

              <td class="text-bold col-md-2"><?= row(query("SELECT * FROM sirketler WHERE musteri_id = '".$urun["siparis_musteri_id"]."'"))["musteri_adi"] ?></td>
              <td class="text-muted col-md-8"><?= $urun["siparis_kodu"] ?></td>
              <td class="col-md-2"><?= row(query("SELECT * FROM siparisler WHERE siparis_id = '".$urun["siparis_id"]."'"))["siparis_durum"] ?></td>

          </tr>

          <?

      }


  }else{

      ?>

      <tr>

          <td class="text-muted text-italic text-center" colspan="3">Ürün Adı yada Kodu En Az 2 Karakter Olmalıdır</td>

      </tr>

      <?

  }



?>