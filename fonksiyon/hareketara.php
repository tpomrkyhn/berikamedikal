<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  $term = p("term");
  $arrp=array();
  $arrs=array();

  if(strlen($term) > 2){

    $query = query("SELECT * FROM parcalar WHERE parca_adi LIKE '%$term%'");
    while ($row = row($query))
     {
     	
      array_push($arrp, $row["parca_id"]);
    }
    $query = query("SELECT * FROM sirketler WHERE musteri_adi LIKE '%$term%'");
    while ($row = row($query))
     {
  
      array_push($arrs, $row["musteri_id"]);
    }
    array_unique($arrs);
    array_unique($arrp);
    print_r($arrs);
    print_r($arrp);
    foreach ($arrs as $key => $value) {

       $hareketler = $pdo->query("SELECT * FROM hareketler WHERE hareket_parca_id = $value");
      if ($hareketler){

          ?>

          <thead>

          <tr>

              <th>Parça Adı</th>
              <th>Parça Kodu</th>
              <th></th>

          </tr>

          </thead>

          <?

          foreach( $urunler as $urun ){

              ?>

                <tr style="cursor: pointer" onclick="window.location = 'index.php?do=parca&id=<?= $urun["parca_id"] ?>'">

                    <td class="text-bold col-md-2"><?= $urun["parca_adi"] ?></td>
                    <td class="text-muted col-md-8"><?= $urun["parca_kodu"] ?></td>
                    <td class="col-md-2"></td>

                </tr>

              <?

          
      }else{

          ?>

          <tr>

              <td class="text-muted text-italic text-center" colspan="3">Parça Bulunamadı</td>

          </tr>

          <?

      }

  }

      
    
    foreach ($arrp as $key => $value) {

       $urunler = $pdo->query("SELECT * FROM hareketler WHERE hareket_parca_id= $value");
      if ( $urunler){

          ?>

          <thead>

          <tr>

              <th>Parça Adı</th>
              <th>Parça Kodu</th>
              <th></th>

          </tr>

          </thead>

          <?
          print_r($urunlrt);

          foreach( $urunler as $urun ){

              ?>

                <tr style="cursor: pointer" onclick="window.location = 'index.php?do=parca&id=<?= $urun["parca_id"] ?>'">

                    <td class="text-bold col-md-2"><?= $urun["parca_adi"] ?></td>
                    <td class="text-muted col-md-8"><?= $urun["parca_kodu"] ?></td>
                    <td class="col-md-2"></td>

                </tr>

              <?

          }
      }else{

          ?>

          <tr>

              <td class="text-muted text-italic text-center" colspan="3">Parça Bulunamadı</td>

          </tr>

          <?

      }
  }

  }else{

      ?>

      <tr>

          <td class="text-muted text-italic text-center" colspan="3">Parça Adı yada Kodu En Az 3 Karakter Olmalıdır</td>

      </tr>

      <?

  }

      
    



   
?>