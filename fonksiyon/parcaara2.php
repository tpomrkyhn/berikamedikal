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

      $parcalar = $pdo->query("SELECT * FROM parcalar WHERE parca_adi LIKE '%$term%' OR parca_kodu LIKE '%$term%'",PDO::FETCH_ASSOC);
      if ( $parcalar->rowCount() ){
          foreach( $parcalar as $parca ){

              ?>

                <tr style="cursor: pointer" onclick="window.location = 'index.php?do=hareketliste&id=<?= $parca["parca_id"] ?>'">

                    <td class="text-bold col-md-2"><?= $parca["parca_adi"] ?></td>
                    <td class="text-muted col-md-8"><?= $parca["parca_kodu"] ?></td>
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