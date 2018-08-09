<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

  $uploadDir = "../dosyalar/";
  mkdir($uploadDir);
  $uploadFile = $uploadDir . basename($_FILES["file"]["name"]);

  if(move_uploaded_file($_FILES["file"]["name"],$uploadFile)){

      echo "oldu";

  }

?>
