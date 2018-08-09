<?


require_once "../sistem/ayar.php";
require_once "../sistem/fonksiyon.php";
//error_reporting(0);

$term = $_GET['term'];

$data = array();
$sonuclar = array();

$query = $pdo->query('SELECT * FROM urunler
WHERE urun_kodu LIKE "%' . $term . '%" OR urun_adi LIKE "%' . $term . '%" OR urun_adi_en LIKE "%' . $term . '%"', PDO::FETCH_ASSOC);


    foreach ( $query as $row ){

        $urun_id = $row["urun_id"];

        if(!in_array($urun_id, $sonuclar)){

            array_push($sonuclar,$urun_id);

        }
    }

    $sonucadet = count($sonuclar);

    $i = 0;
    while($i <= $sonucadet - 1){

        $id = $sonuclar[$i];
        $query = $pdo->query('SELECT * FROM urunler WHERE urun_id = "'.$id.'"', PDO::FETCH_ASSOC);

        foreach ( $query as $row ){

            $data[] = array(
                'value' => $row['urun_adi'],
                'urun_adi' => $row['urun_adi'],
                'urun_id' => $row['urun_id'],
                'urun_kodu' => $row['urun_kodu']
            );

        }

        $i++;

    }

    echo json_encode($data);


?>
