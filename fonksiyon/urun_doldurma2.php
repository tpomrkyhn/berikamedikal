<?

include_once "../sistem/ayar.php";
include_once "../sistem/fonksiyon.php";

try {
    $db = new PDO('mysql:host=localhost;dbname=ticaretplus;charset=utf8', 'root', '');
} catch (PDOException $e ){
    die($e->getMessage());
}

$term = $_GET['term'];

$data = array();
$sonuclar = array();

$query = $db->query('SELECT * FROM urunadlari
WHERE ad LIKE "%'.$term.'%"', PDO::FETCH_ASSOC);

foreach ( $query as $row ){

    $urun_id = $row["ad_urun_id"];

    if(!in_array($urun_id, $sonuclar)){

        array_push($sonuclar,$urun_id);

    }
}

$query = $db->query('SELECT * FROM urunanahtarkelime
WHERE anahtar LIKE "%'.$term.'%"', PDO::FETCH_ASSOC);

foreach ( $query as $row ){

    $urun_id = $row["anahtar_urun_id"];

    if(!in_array($urun_id, $sonuclar)){

        array_push($sonuclar,$urun_id);

    }
}

$query = $db->query('SELECT * FROM urunekbilgileri
WHERE ek LIKE "%'.$term.'%"', PDO::FETCH_ASSOC);

foreach ( $query as $row ){

    $urun_id = $row["ek_urun_id"];

    if(!in_array($urun_id, $sonuclar)){

        array_push($sonuclar,$urun_id);

    }
}

$query = $db->query('SELECT * FROM urunkodlari
WHERE kod LIKE "%'.$term.'%"', PDO::FETCH_ASSOC);

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
    $query = $db->query('SELECT * FROM urunler WHERE urun_id = "'.$id.'"', PDO::FETCH_ASSOC);

    foreach ( $query as $row ){

      $query01 = query("SELECT * FROM urunadlari WHERE ad_urun_id = '$id' AND ad_dil = '".$_SESSION["dil"]."'");
      $ad = row($query01); $ad = $ad["ad"];

      $query01 = query("SELECT * FROM urunkodlari WHERE kod_urun_id = '$id' AND kod_adi = 'ana'");
      $kod = row($query01); $kod = $kod["kod"];

      $query01 = query("SELECT * FROM urungorselleri WHERE gorsel_urun_id = '$id'");
      $img = row($query01); $img = $img["gorsel"];

      if($img == ""){

        $img = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAHlBMVEX09PTh4eH19fXg4ODk5OTw8PDs7Ozq6uru7u7n5+dZKxXMAAAELUlEQVR4nO2dWXKtMAwFwQMX9r/hB9RNMOARhCTyTv/kIxVQl4kHYZmuAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADgAsZ03o9eA6OfwyH360bXWz30kyd2HHvbq8LaibQdJ2V+C7Yf6RSdQsEZOxApGqWCsyJNK5qPVsEZCsHOS1tksBNFI2rsZTY8gaG0QxaCRjRj0ITS4/wvW0judguaKbjaID1f+xLEZG8/psZtV6OeKF3GbH2DHW9fbDN0WgTn/j0wvBtVYEjSM9MAwxZgKAMMW4ChDLyGxoQ/eGA0NMYPk3O9c9PH80nyGZo1A/e9l3WEiZM8DxmeZm3GH/Ib1jFNXZna0AzntTFZcigPj2E8f2M/HIoshqkEFYsih+Fu7b9XZOhvWNow4bdw85YVMBjmkqg0Kb4sHG2YaUKaFF+W5w3zefDnO5vnR/wwPxXh8YwOw1Oaz4Pbmzct8ryhLxhe+EdsivRxw/RgePW2821a/uZ5w8ILt/auZp7Ct8Qqb9g6/17XKA3BKnhK227yswirjvZtPc22yqwN912jxW6bQGW87xrx93mCuoBfNWs7JkKqIuaYeWcf04brn3ey1ITMsXrK7F9oWD1Ft+pUxPyeFXB8L1I5aJYsRnKbTcM9E5utyleQzUTVz2eSu8mKYb8km5jbLleI+xUZ4cJ+wHzgr8jqFzY85iNnfPe0vJn5uVff8mamuKMzGzrn27Xu9+3a4Bu2JddsWc3Erv4NaeWe3HTw6t9yV246Tkev3bB6V3UyfOWGDdvGU/HrNmzbFx8X0GzYvPE/asA14l+hubIhqqC4DS+UbsQc9Bpeq005S2g1vFx8c7LQani5uuikIWhohnR5wI3yqaOHnOG8ZLQpxVv1YYd1p5jhuiZOKN4sgNsrShl+F/0xxfsVfjtFoRE/yGqcfkdQwhgqyrRhmLY5tiJJjWbwvkfEcJeXOjyoNEWoVrYND4m3UJGqyla2DU+ZxUCRqoxY1DCWOv3pbsjqpCUNo4LfVqQrBBc0jAquioaylF/OMCG4KlKW8j9vmBjxk4LUSLUhm6CUIZ+gkCGjoIwhp6CIIaughCGvoIAhsyC/Ibcg+4jPLsjdhvyCzIYCgryGEoK8hoV93u83lDn+i9VQ4iGFIQwrDN2fN/z7bQhDGMIQhjCEYdnwvxrxPyKnljIadn6QgNOwMxKwGgoDwxZgKAMMW4ChDE/N2kiCoyA4eYTgPO/t/PPluyc6COrICc5kDybZ1jodhPP+u4LFg1qkofjXyR9jIgzFaaKl84Rkoen9FDci1Tmb0h5JqM6gNFo7m2R5zgVFbd8kW5nHZzJOx0MowNqhHHiL4+h2H7ARZvl4HvUHAtfD1yfpycyX6TPSfwCxE8o+JXhADwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAs/ANyGFT0fw3sTAAAAABJRU5ErkJggg==";

      }

      $fiyat = ondalik(fiyat($id));

        $data[] = array(
            'value' => $ad,
            'img' => $img,
            'urun_kodu' => $kod,
            'urun_adi' => $ad,
            'urun_fiyat' => $fiyat
        );

    }

    $i++;

}

echo json_encode($data);

?>
