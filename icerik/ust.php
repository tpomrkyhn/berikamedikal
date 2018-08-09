<?php

  require_once "icerik/ustbar.php";
  require_once "icerik/menu.php";
  require_once "icerik/baslik.php";

 ?>

<script type="text/javascript">

    function oturumkontrol() {

        $.ajax({
            url:'../fonksiyon/oturumkontrol.php', // serileştirilen değerleri ajax.php dosyasına
            type:'POST', // post metodu ile
            data:{}, // yukarıda serileştirdiğimiz gonderilenform değişkeni
            success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                if(e == "hata"){

                    window.location.href = "index.php?hata=baskacihazdaoturumacildi&go=<?= g("do") ?>";

                }
            }
        });

    }

    setInterval('oturumkontrol()', 1000);

</script>
