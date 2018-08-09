<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  $term = p("term");

  if(strlen($term) > 2){

      ?>

      <thead>

      <tr>

          <th>Grup Adı</th>
          <th>Grup Kodu</th>
          <th></th>

      </tr>

      </thead>

      <?

      $urunler = $pdo->query("SELECT * FROM parcagruplari WHERE grup_adi LIKE '%$term%' OR grup_kod LIKE '%$term%'",PDO::FETCH_ASSOC);
      if ( $urunler->rowCount() ){
          foreach( $urunler as $urun ){

              ?>

                <tr style="cursor: pointer" onclick="window.location = 'index.php?do=parcagrup&id=<?= $urun["grup_id"] ?>'">

                    <td class="text-bold col-md-2"><?= $urun["grup_adi"] ?></td>
                    <td class="text-muted col-md-8"><?= $urun["grup_kod"] ?></td>
                    <td class="col-md-2"></td>

                </tr>

              <?

          }
      }

  }else{

      ?>

      <tr>

          <td class="text-muted text-italic text-center" colspan="3">Parça Adı yada Kodu En Az 2 Karakter Olmalıdır</td>

      </tr>

      <?

  }

?>