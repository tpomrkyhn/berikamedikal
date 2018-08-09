<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

    if (!isset($_SESSION["dil"])) {
        $dil = "tr";

        $_SESSION["dil"] = $dil;

    } else {
        $dil = $_SESSION["dil"];
    }

    include_once "../diller/$dil.php";

  $term = p("term");

  if(strlen($term) > 1){

      ?>

      <thead>

      <tr>

          <th>Parca Adı</th>
          <th>Parca Kodu</th>
          <th>Parca Min. Stok</th>
          <th>Parca Temin Türü</th>

      </tr>

      </thead>

      <?

      $sonuclar = array();

      $parcalar = $pdo->query("SELECT * FROM parcalar WHERE parca_adi LIKE '$term' OR parca_kodu LIKE '$term'",PDO::FETCH_ASSOC);

      if ( $parcalar->rowCount() ){
          foreach( $parcalar as $parca ){

              if(!array_key_exists($parca["parca_id"], $sonuclar)){

                  $sonuclar[$parca["parca_id"]] = 1;

              }

          }
      }

      $parcalar = $pdo->query("SELECT * FROM parcalar WHERE parca_adi LIKE '%$term%' OR parca_kodu LIKE '%$term%'",PDO::FETCH_ASSOC);

      if ( $parcalar->rowCount() ){
          foreach( $parcalar as $parca ){

              if(!array_key_exists($parca["parca_id"], $sonuclar)){

                  $sonuclar[$parca["parca_id"]] = 1;

              }

          }
      }

      if($term[0] == "%") {

          $parcalar = $pdo->query("SELECT * FROM parcalar WHERE SOUNDEX(parca_adi) LIKE CONCAT('%', TRIM(TRAILING '0' FROM SOUNDEX('$term')), '%')", PDO::FETCH_ASSOC);

          if ($parcalar->rowCount()) {
              foreach ($parcalar as $parca) {

                  if(!array_key_exists($parca["parca_id"], $sonuclar)){

                      $sonuclar[$parca["parca_id"]] = 1;

                  }else{

                      $sonuclar[$parca["parca_id"]] += 1;

                  }

              }
          }

          $terms = explode(" ",$term);

          $terms[0] = ltrim($terms[0],"%");

          foreach ($terms as $term){

              if(strlen($term) > 1) {

                  $parcalar = $pdo->query("SELECT * FROM parcalar WHERE parca_adi LIKE '%$term%' OR parca_kodu LIKE '%$term%'", PDO::FETCH_ASSOC);

                  if ($parcalar->rowCount()) {
                      foreach ($parcalar as $parca) {

                          if (!array_key_exists($parca["parca_id"], $sonuclar)) {

                              $sonuclar[$parca["parca_id"]] = 1;

                          } else {

                              $sonuclar[$parca["parca_id"]] += 1;

                          }

                      }
                  }

              }

          }

      }

      arsort($sonuclar);

      //print_r($sonuclar);

      foreach ($sonuclar as $parcaid => $val){

          $parca = row(query("SELECT * FROM parcalar WHERE parca_id = '$parcaid'"));

          ?>

          <tr style="cursor: pointer" onclick="window.location = 'index.php?do=parca&id=<?= $parca["parca_id"] ?>'">

              <td class="text-bold col-md-2"><?= $parca["parca_adi"] ?></td>
              <td class="text-muted col-md-4"><?= $parca["parca_kodu"] ?></td>
              <td class="text-bold col-md-2"><?= ondalik($parca["parca_min_stok"]) ?></td>
              <td class="text-muted col-md-4"><?= $d[$parca["parca_tip"]] ?></td>



          </tr>

          <?

      }

  }else{

      ?>

      <tr>

          <td class="text-muted text-italic text-center" colspan="3">Parça Adı yada Kodu En Az 2 Karakter Olmalıdır</td>

      </tr>

<?

      }

?>