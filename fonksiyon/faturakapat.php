<?

require_once "../sistem/ayar.php";
require_once "../sistem/fonksiyon.php";

    $query = query("SELECT * FROM belgeaciklamalari WHERE aciklama_belge_id = '".p("id")."' AND aciklama_adi = 'kapat' AND aciklama = 'evet'");
    if(mysql_affected_rows()){

        $query = query("UPDATE belgeaciklamalari SET aciklama = 'hayir' WHERE aciklama_belge_id = '".p("id")."' AND aciklama_adi = 'kapat'");

        echo "kapatildi";


    }else{

        $query = query("UPDATE belgeaciklamalari SET aciklama = 'evet' WHERE aciklama_belge_id = '".p("id")."' AND aciklama_adi = 'kapat'");

        echo "acildi";

    }

?>

