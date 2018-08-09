<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  $id = p("id");
  $tip = p("tip");

  if($tip == "alisbirim" || $tip == "satisbirim"){

      $birim =  row(query("SELECT * FROM parcalar WHERE parca_id = '$id'"))["parca_".$tip];

      echo row(query("SELECT * FROM birimler WHERE birim_id = '$birim'"))["birim"];

  }else if($tip == "sonuc"){

      $parca = row(query("SELECT * FROM parcalar WHERE parca_id = '$id'"));

      $sonuc = ondalik(p("ek") / $parca["parca_oran"]);

      echo "= " . $sonuc . " " . row(query("SELECT * FROM birimler WHERE birim_id = '".$parca["parca_satisbirim"]."'"))["birim"];



  }else if($tip == "tablo"){

      ?>


      <?

      $parca = row(query("SELECT * FROM parcalar WHERE parca_id = '$id'"));

      ?>

      <table style="width: 100%">

          <tr>

              <td class="text-bold">Parça Kodu:</td>
              <td class="text-bold">Parça Adı:</td>
              <td class="text-bold">Alış Birim:</td>
              <td class="text-bold">Satış Birim:</td>
              <td class="text-bold">Katsayı:</td>
              <td class="text-bold">Stok Miktarı:</td>
              <td class="text-bold">Min. Stok:</td>

          </tr>

          <tr>

              <td><?= $parca["parca_kodu"] ?></td>
              <td><?= $parca["parca_adi"] ?></td>
              <td><?= row(query("SELECT * FROM birimler WHERE birim_id = '".$parca["parca_alisbirim"]."'"))["birim"] ?></td>
              <td><?= row(query("SELECT * FROM birimler WHERE birim_id = '".$parca["parca_satisbirim"]."'"))["birim"] ?></td>
              <td><?= ondalik($parca["parca_oran"]) ?></td>
              <td><?= ondalik(stok($id)) ?></td>
              <td><?= ondalik($parca["parca_min_stok"]) ?></td>

          </tr>

      </table>

<?


  }else{

      echo row(query("SELECT * FROM parcalar WHERE parca_id = '$id'"))["parca_".$tip];

  }

?>


