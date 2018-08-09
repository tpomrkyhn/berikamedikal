<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";


  $query = query("SELECT * FROM belgeler WHERE belge_tip = 'siparis' AND belge_oku = 'hayir'");
  echo mysql_num_rows($query);

?>
