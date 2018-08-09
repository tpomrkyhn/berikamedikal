<?

require_once "../sistem/ayar.php";
require_once "../sistem/fonksiyon.php";

$key = md5($hostname=$_SERVER['HTTP_USER_AGENT'].$_SERVER[REMOTE_ADDR]);

$query = query("SELECT * FROM oturumlar WHERE oturum_uye_id = '".session("uye_id")."' AND oturum_key = '$key' AND oturum_tip = 'oturum'");
if(mysql_affected_rows()){

    $query = query("UPDATE oturumlar SET oturum_key = '$key' WHERE oturum_key = '$key' AND oturum_tip = 'oturum'");

}else{

    session_destroy();

    echo "hata";

}