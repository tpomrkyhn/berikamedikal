<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  $term = p("term");

  if(strlen($term) > 1){

      ?>

      <thead>

      <tr>

          <th>Firma Adı</th>
          <th>Firma Kodu</th>
          
          
          <th></th>

      </tr>

      </thead>

      <?


     $parcalar = $pdo->query("SELECT * FROM sirketler WHERE musteri_adi LIKE '%$term%' ",PDO::FETCH_ASSOC);
      if ( $parcalar->rowCount() ){
          foreach( $parcalar as $parca ){
            if ($parca["sirket_tip"]=="tedarikci")
             {
              $tur = "tedarikci";
            }else{
              $tur = "musteri";
            }

              ?>


                <tr style="cursor: pointer" onclick="window.location = 'index.php?do=<?= $tur ?>&id=<?= $parca["musteri_id"] ?>'">


                    <td class="text-bold col-md-2"><?= $parca["musteri_adi"] ?></td>
                    <td class="text-muted col-md-8"><?= $parca["musteri_kodu"] ?></td>
                    

                </tr>

              <?

          }
      }



  }else{

      ?>

      <tr>

          <td class="text-muted text-italic text-center" colspan="3">Ürün Adı yada Kodu En Az 2 Karakter Olmalıdır</td>

      </tr>

      <?

  }



?>