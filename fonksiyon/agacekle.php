<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  $adet = p("adet");

  if($adet > 0) {

      if (p("urunarama") !== "sec") {

          $id = "u" . p("urunarama");

      }

      if (p("parcaarama") !== "sec") {

          $id = "p" . p("parcaarama");

      }

      $query = query("SELECT * FROM urunagaclari WHERE agac = 'u" . p("urunid") . "'");
      if (!mysql_affected_rows()) {

          $ekle = query("INSERT INTO urunagaclari SET agac_ust_id = '', agac = 'u" . p("urunid") . "'");
          $uid = mysql_insert_id();
          $uid = row(query("SELECT * FROM urunagaclari WHERE agac_id = '$uid'"))["agac"];

      } else {

          $row = row($query);
          $uid = $row["agac"];

      }
      //$update = query("UPDATE urunagaclari SET agac_ust_id = '$uid' WHERE agac_id = '$uid'");

      $query = query("SELECT * FROM urunagaclari WHERE agac_ust_id = '$uid' AND agac = '$id'");
      if(!mysql_affected_rows()) {
          $ekle = query("INSERT INTO urunagaclari SET agac_ust_id = '$uid', agac = '$id', agac_adet = '" . $adet . "'");
          if ($ekle) {

              echo "eklendi";

          } else {

              echo "hata";

          }
      }else{

        echo "zatenvar";

      }

  }else{

    echo "adethata";

  }

?>