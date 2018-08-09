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
    $db = new PDO('mysql:host=localhost;dbname=ticaretplus;charset=utf8', 'root', '');
} catch (PDOException $e ){
    die($e->getMessage());
}

$term = $_GET['term'];
$ara = $_GET['term'];

$data = array();
$sonuclar = array();

$query = $db->query("SELECT * FROM belgeler WHERE belge_tip = 'kredikartitahsilat' AND belge_no LIKE '$ara%' ORDER BY belge_no DESC LIMIT 1", PDO::FETCH_ASSOC);

foreach ( $query as $row ){

    $no = $row["belge_no"];
    $no = artir($no);

    $data[] = array(
        'value' => $no,
        'aciklama' => $term." ".$d["belgenootomatikaciklama"]
    );

}

echo json_encode($data);

?>