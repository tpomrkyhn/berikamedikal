<?

require_once "../sistem/ayar.php";
require_once "../sistem/fonksiyon.php";

    $query = query("UPDATE belgeaciklamalari SET aciklama = '".ondaliksil(p("yuzde"))."' WHERE aciklama_belge_id = '".p("id")."' AND aciklama_adi = 'yuzde'");
    $query = query("UPDATE belgeaciklamalari SET aciklama = '".ondaliksil(p("geneliskonto"))."' WHERE aciklama_belge_id = '".p("id")."' AND aciklama_adi = 'geneliskonto'");

?>


