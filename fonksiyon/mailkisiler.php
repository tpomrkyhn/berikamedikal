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

$query = $db->query("SELECT * FROM uyeler WHERE uye_adi LIKE '%$ara%' OR uye_soyadi LIKE '%$ara%'", PDO::FETCH_ASSOC);

foreach ( $query as $row ){

    $data[] = array(
        'value' => $row["uye_adi"]." ".$row["uye_soyadi"],
        'kadi' => $row["uye_kadi"],
        'mail' => $row["uye_mail"]
    );

}

echo json_encode($data);

?>