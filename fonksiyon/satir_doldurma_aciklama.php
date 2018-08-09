<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

try {
    $db = new PDO('mysql:host=localhost;dbname=ticaretplus;charset=utf8', 'root', '');
} catch (PDOException $e ){
    die($e->getMessage());
}

$term = $_GET['term'];
$ara = $_GET['term'];

$data = array();
$sonuclar = array();

$query = $db->query("SELECT * FROM urunadlari WHERE ad LIKE '%$ara%'", PDO::FETCH_ASSOC);

    foreach ( $query as $row ){

        $urun_id = $row["ad_urun_id"];

        if(!in_array($urun_id, $sonuclar)){

            array_push($sonuclar,$urun_id);

        }
    }

$query = $db->query("SELECT * FROM urunkodlari WHERE kod LIKE '%$ara%'", PDO::FETCH_ASSOC);

    foreach ( $query as $row ){

        $urun_id = $row["kod_urun_id"];

        if(!in_array($urun_id, $sonuclar)){

            array_push($sonuclar,$urun_id);

        }
    }

    $sonucadet = count($sonuclar);

    $i = 0;
    while($i <= $sonucadet - 1){

        $id = $sonuclar[$i];
        $uid = $sonuclar[$i];

        $gorselquery = query("SELECT * FROM urungorselleri WHERE gorsel_urun_id = '$uid'");
        $gorselrow = row($gorselquery);
        $gorsel = $gorselrow["gorsel"];

        $adquery = query("SELECT * FROM urunadlari WHERE ad_urun_id = '$uid' AND ad_dil = 'tr'");
        $adrow = row($adquery);
        $ad = $adrow["ad"];

        $kodquery = query("SELECT * FROM urunkodlari WHERE kod_urun_id = '$uid' AND kod_adi = 'ana'");
        $kodrow = row($kodquery);
        $kod = $kodrow["kod"];

        if($gorsel == ""){

            $gorsel = "";

        }

        $data[] = array(
            'value' => $ad,
            'urun_kod' => $kod,
            'urun_adi' => $ad,
            'urun_gorsel' => $gorsel,
            'urun_id' => $id,
            'urun_fiyat' => ondalik(fiyat($id))
			//'urun_fiyat_doviz' => ondalik(fiyat($id,"doviz")),
			//'urun_doviz' => ondalik(fiyat($id,"dovizkuru"))
        );

        $i++;

    }

    echo json_encode($data);


?>
