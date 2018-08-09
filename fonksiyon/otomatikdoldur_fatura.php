<?

  require_once "../sistem/ayar.php";
  require_once "../sistem/fonksiyon.php";

?>

$(function(){

  <?

  $id = g("id");

  $jsquery = query("SELECT * FROM urunhareketleri WHERE hareket_belge_id = '$id' AND tip = 'siparis'");
  while($jsrow = row($jsquery)){

    $hid = "19";

    ?>

    var $satir_no_<?= $hid ?> = $('#satir_no_<?= $hid ?>');
    var $satir_aciklama_<?= $hid ?> = $('#satir_aciklama_<?= $hid ?>');
    var $satir_fiyat_<?= $hid ?> = $('#satir_fiyat_<?= $hid ?>');
    $satir_no_<?= $hid ?>.autocomplete({ source: '../fonksiyon/urun_doldurma.php', autoFocus:true, minLength: 3 ,select: function(event, ui){
      $satir_no_<?= $hid ?>.val(ui.item.urun_kodu);
      $satir_aciklama_<?= $hid ?>.val(ui.item.urun_adi);
      $satir_fiyat_<?= $hid ?>.val(ui.item.urun_fiyat);
      document.getElementById("satir_adet_<?= $hid ?>").focus();

    }});

    $satir_no_<?= $hid ?>.data('ui-autocomplete')._renderItem = function( ul, item ){

      var $li = $('<li>');

      $li.html('<a >' +
      '<img src="' + item.img + '"/>' +
      '<span class="ust">' + item.urun_adi + '</span>' +
      '<span class="alt">' + item.urun_kodu + '</span>' +
      '</a>');
      return $li.appendTo(ul);

    };

    <? } ?>

    <?

    $jsquery = query("SELECT * FROM urunhareketleri WHERE hareket_belge_id = '$id' AND tip = 'siparis'");
    while($jsrow = row($jsquery)){

      $hid = "19";

      ?>

      var $satir_no_<?= $hid ?> = $('#satir_no_<?= $hid ?>');
      var $satir_aciklama_<?= $hid ?> = $('#satir_aciklama_<?= $hid ?>');
      var $satir_fiyat_<?= $hid ?> = $('#satir_fiyat_<?= $hid ?>');
      $satir_aciklama_<?= $hid ?>.autocomplete({ source: '../fonksiyon/urun_doldurma2.php', autoFocus:true, minLength: 3 ,select: function(event, ui){
        $satir_no_<?= $hid ?>.val(ui.item.urun_kodu);
        $satir_aciklama_<?= $hid ?>.val(ui.item.urun_adi);
        $satir_fiyat_<?= $hid ?>.val(ui.item.urun_fiyat);
        document.getElementById("satir_adet_<?= $hid ?>").focus();

      }});

      $satir_aciklama_<?= $hid ?>.data('ui-autocomplete')._renderItem = function( ul, item ){

        var $li = $('<li>');

        $li.html('<a >' +
        '<img src="' + item.img + '"/>' +
        '<span class="ust">' + item.urun_adi + '</span>' +
        '<span class="alt">' + item.urun_kodu + '</span>' +
        '</a>');
        return $li.appendTo(ul);

      };

      <? } ?>

      <?

        $hid = "y";

        ?>

        var $satir_no_<?= $hid ?> = $('#satir_no_<?= $hid ?>');
        var $satir_aciklama_<?= $hid ?> = $('#satir_aciklama_<?= $hid ?>');
        var $satir_fiyat_<?= $hid ?> = $('#satir_fiyat_<?= $hid ?>');
        $satir_no_<?= $hid ?>.autocomplete({ source: '../fonksiyon/urun_doldurma.php', autoFocus:true, minLength: 3 ,select: function(event, ui){
          $satir_no_<?= $hid ?>.val(ui.item.urun_kodu);
          $satir_aciklama_<?= $hid ?>.val(ui.item.urun_adi);
          $satir_fiyat_<?= $hid ?>.val(ui.item.urun_fiyat);
          document.getElementById("satir_adet_<?= $hid ?>").focus();

        }});

        $satir_no_<?= $hid ?>.data('ui-autocomplete')._renderItem = function( ul, item ){

          var $li = $('<li>');

          $li.html('<a >' +
          '<img src="' + item.img + '"/>' +
          '<span class="ust">' + item.urun_adi + '</span>' +
          '<span class="alt">' + item.urun_kodu + '</span>' +
          '</a>');
          return $li.appendTo(ul);

        };

          var $satir_no_<?= $hid ?> = $('#satir_no_<?= $hid ?>');
          var $satir_aciklama_<?= $hid ?> = $('#satir_aciklama_<?= $hid ?>');
          var $satir_fiyat_<?= $hid ?> = $('#satir_fiyat_<?= $hid ?>');
          $satir_aciklama_<?= $hid ?>.autocomplete({ source: '../fonksiyon/urun_doldurma2.php', autoFocus:true, minLength: 3 ,select: function(event, ui){
            $satir_no_<?= $hid ?>.val(ui.item.urun_kodu);
            $satir_aciklama_<?= $hid ?>.val(ui.item.urun_adi);
            $satir_fiyat_<?= $hid ?>.val(ui.item.urun_fiyat);
            document.getElementById("satir_adet_<?= $hid ?>").focus();

          }});

          $satir_aciklama_<?= $hid ?>.data('ui-autocomplete')._renderItem = function( ul, item ){

            var $li = $('<li>');

            $li.html('<a >' +
            '<img src="' + item.img + '"/>' +
            '<span class="ust">' + item.urun_adi + '</span>' +
            '<span class="alt">' + item.urun_kodu + '</span>' +
            '</a>');
            return $li.appendTo(ul);

          };

  });

  <? header('Content-Type: application/javascript'); ?>
