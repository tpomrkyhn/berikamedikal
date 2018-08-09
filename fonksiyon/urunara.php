<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  $term = p("term");

  if(strlen($term) > 2){

      ?>

      <thead>

      <tr>

          <th>Ürün Adı</th>
          <th>Ürün Kodu</th>
          <th></th>

      </tr>

      </thead>

      <?

      $urunler = $pdo->query("SELECT * FROM urunler WHERE urun_adi LIKE '%$term%' OR urun_kodu LIKE '%$term%'",PDO::FETCH_ASSOC);
      if ( $urunler->rowCount() ){
          foreach( $urunler as $urun ){

              ?>

                <tr style="cursor: pointer" onclick="window.location = 'index.php?do=urun&id=<?= $urun["urun_id"] ?>'">

                    <td class="text-bold col-md-2"><?= $urun["urun_adi"] ?></td>
                    <td class="text-muted col-md-8"><?= $urun["urun_kodu"] ?></td>
                    <td class="col-md-2"></td>

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