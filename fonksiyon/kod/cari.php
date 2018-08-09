<?

require_once "../../sistem/ayar.php";
require_once "../../sistem/fonksiyon.php";

if (!isset($_SESSION["dil"])) {
    $dil = "tr";

    $_SESSION["dil"] = $dil;

} else {
    $dil = $_SESSION["dil"];
}

include_once "../../diller/$dil.php";


try {
    $db = new PDO('mysql:host=94.73.145.181;dbname=dbE88E8B;charset=utf8', 'userE88E8B', 'RKhn35E4');
} catch (PDOException $e ){
    die($e->getMessage());
}

$term = $_GET['term'];
$ara = $_GET['term'];

$data = array();
$sonuclar = array();

$query = $db->query("SELECT * FROM sirketler WHERE tip = 'musteri' AND sirket_no LIKE '$ara%' ORDER BY sirket_no DESC LIMIT 1", PDO::FETCH_ASSOC);

foreach ( $query as $row ){

    $no = $row["sirket_no"];
    $no = artir($no);

    $data[] = array(
        'value' => $no,
        'aciklama' => $term." ".$d["sirketnootomatikaciklama"]
    );

}

echo json_encode($data);

?>