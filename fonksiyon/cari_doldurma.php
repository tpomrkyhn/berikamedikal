<?

try {
    $db = new PDO('mysql:host=localhost;dbname=ticaretplus;charset=utf8', 'root', '');
} catch (PDOException $e ){
    die($e->getMessage());
}

error_reporting(0);

$term = $_GET['term'];

$data = array();
$sonuclar = array();

$query = $db->query('SELECT * FROM sirketler
WHERE (sirket_adi LIKE "%' . $term . '%" OR sirket_no LIKE "%' . $term . '%") AND tip <> "sube"', PDO::FETCH_ASSOC);


    foreach ( $query as $row ){

        $sirket_id = $row["sirket_id"];

        if(!in_array($sirket_id, $sonuclar)){

            array_push($sonuclar,$sirket_id);

        }
    }

$query = $db->query('SELECT * FROM sirketekbilgileri
WHERE aciklama LIKE "%' . $term . '%"', PDO::FETCH_ASSOC);


    foreach ( $query as $row ){

        $sirket_id = $row["aciklama_sirket_id"];

        if(!in_array($sirket_id, $sonuclar)){

            array_push($sonuclar,$sirket_id);

        }
    }

    $sonucadet = count($sonuclar);

    $i = 0;
    while($i <= $sonucadet - 1){

        $id = $sonuclar[$i];
        $query = $db->query('SELECT * FROM sirketler WHERE sirket_id = "'.$id.'"', PDO::FETCH_ASSOC);

        foreach ( $query as $row ){

            $data[] = array(
                'value' => $row['sirket_unvani'],
                'sirket_id' => $row['sirket_id'],
                'sirket_adi' => $row['sirket_adi'],
                'sirket_no' => $row['sirket_no'],
                'sirket_unvani' => $row['sirket_unvani']
            );

        }

        $i++;

    }

    echo json_encode($data);


?>
