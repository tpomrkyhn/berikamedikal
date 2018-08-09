<?

require_once "../sistem/ayar.php";
require_once "../sistem/fonksiyon.php";

?>

    <?

    $sonuclar = array();

    $query = query("SELECT * FROM parcalar");

    while($parca = row($query)){

        $adet = stok($parca["parca_id"]);
        if($adet < $parca["parca_min_stok"]){

            array_push($sonuclar,$parca["parca_id"]);

        }

    }

    foreach($sonuclar as $id){

        $varmi = query("SELECT * FROM okular WHERE oku_tip = 'stokbildirim' AND oku_varlik_id = '$id' AND oku_uye_id = '".session("uye_id")."'");
        if(!mysql_affected_rows()){

            $ekle = query("INSERT INTO okular SET oku_tip = 'stokbildirim', oku_varlik_id = '$id', oku_uye_id = '".session("uye_id")."'");

        }

    }

    ?>


