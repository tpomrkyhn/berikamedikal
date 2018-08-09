<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main sidebar-default sidebar-separate">
            <? include_once "mailsol.php"; ?>
        </div>
        <!-- /main sidebar -->

        <?

            $maxAdet = 30;

            if(!isset($_GET["s"])){

                go("index.php?do=mailcop&s=1");

            }

            $sayfa = g("s");

            $sayfaAdet = ceil(mailcop() / $maxAdet);

            if(mailcop() == 0){

                $sifir = "evet";
                $sayfaAdet++;

            }

            if($sayfa > $sayfaAdet){

                go("index.php?do=mailcop&s=".$sayfaAdet);

            }

            $sayfaBaslangic = ($sayfa - 1) * $maxAdet;


        ?>

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Single line -->
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h6 class="panel-title"><?= $d["cop"] ?></h6>
                </div>

                <div class="panel-toolbar panel-toolbar-inbox">
                    <div class="navbar navbar-default">
                        <ul class="nav navbar-nav visible-xs-block no-border">
                            <li>
                                <a class="text-center collapsed" data-toggle="collapse" data-target="#inbox-toolbar-toggle-single">
                                    <i class="icon-circle-down2"></i>
                                </a>
                            </li>
                        </ul>

                        <div class="navbar-collapse collapse" id="inbox-toolbar-toggle-single">
                            <div class="btn-group navbar-btn">
                                <button type="button" class="btn btn-default"><i class="icon-pencil7"></i> <span class="hidden-xs position-right"><?= $d["yaz"] ?></span></button>
                                <button type="button" class="btn btn-default"><i class="icon-bin"></i> <span class="hidden-xs position-right"><?= $d["sil"] ?></span></button>
                            </div>

                            <div class="navbar-right">
                                <p class="navbar-text"><span class="text-semibold"><?= $sayfaBaslangic ?> - <? if($sayfaBaslangic + $maxAdet > mailcop()){ echo mailcop(); }else{ echo $sayfaBaslangic + $maxAdet; } ?></span> / <span class="text-semibold"><?= mailcop() ?></span></p>

                                <div class="btn-group navbar-left navbar-btn">
                                    <button <? if($sayfa > 1){ ?> onclick="window.location.href = 'index.php?do=mailcop&s=<?= $sayfa - 1 ?>';" <? } ?> type="button" class="btn btn-default btn-icon <? if($sayfa == 1){ echo "disabled"; } ?>"><i class="icon-arrow-left12"></i></button>
                                    <button <? if($sayfa < $sayfaAdet){ ?> onclick="window.location.href = 'index.php?do=mailcop&s=<?= $sayfa + 1 ?>';" <? } ?> type="button" class="btn btn-default btn-icon <? if($sayfa == $sayfaAdet){ echo "disabled"; } ?>"><i class="icon-arrow-right13"></i></button>
                                </div>

                                <div class="btn-group navbar-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-cog3"></i>
                                        <span class="caret"></span>
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li><a href="#">One more line</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-inbox">
                        <tbody data-link="row" class="rowlink">

                        <script type="text/javascript">

                            var mailadet = <?= mailcop() ?>;

                            function adeteksilt() {

                                mailadet = mailadet - 1;
                                if(mailadet == 0){

                                    $("#sifir").show();

                                }

                            }

                            function yildiz(id) {

                                $.ajax({
                                    url:'fonksiyon/mailyildiz.php', // serileştirilen değerleri ajax.php dosyasına
                                    type:'POST', // post metodu ile
                                    data:{id:id}, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                    success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                        if(e == "dolu"){

                                            $("#yildiz_"+id).removeClass("icon-star-empty3 text-muted").addClass("icon-star-full2 text-orange");

                                        }else if(e == "bos"){

                                            $("#yildiz_"+id).removeClass("icon-star-full2 text-orange").addClass("icon-star-empty3 text-muted");

                                        }
                                    }
                                });

                            }

                            function sil(id) {

                                if(confirm("<?= $d["silmekistediginizeeminmisiniz"] ?>?")){

                                    $.ajax({
                                        url:'fonksiyon/mailsil.php', // serileştirilen değerleri ajax.php dosyasına
                                        type:'POST', // post metodu ile
                                        data:{id:id}, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                        success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                            if(e == "tamamensilindi"){

                                                $("#mail_"+id).hide();
                                                adeteksilt();

                                            }else if(e == "silinemedi"){

                                                //hata

                                            }
                                        }
                                    });

                                }

                            }

                            function silme(id) {

                                if(confirm("<?= $d["cikarmakistediginizeeminmisiniz"] ?>?")){

                                    $.ajax({
                                        url:'fonksiyon/mailsilme.php', // serileştirilen değerleri ajax.php dosyasına
                                        type:'POST', // post metodu ile
                                        data:{id:id}, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                        success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                            if(e == "coptencikarildi"){

                                                $("#mail_"+id).hide();

                                            }else if(e == "silinemedi"){

                                                //hata

                                            }
                                        }
                                    });

                                }

                            }

                        </script>

                        <?

                        $yildizlar = query("SELECT * FROM siller WHERE sil_tip = 'mail' AND sil_uye_id = '".session("uye_id")."' AND sil_durum = '1' ORDER BY sil_id DESC LIMIT $sayfaBaslangic,$maxAdet");
                        while ($yildizz = row($yildizlar)){

                            $mailler = query("SELECT * FROM mailler WHERE mail_id = '".$yildizz["sil"]."'");
                            $mail = row($mailler);

                                if($mail["mail_alan"] == session("uye_id")){ $yazi = "mail_alan"; }else{ $yazi = "mail_gonderen"; }

                                $uye = query("SELECT * FROM uyeler WHERE uye_id = '".$mail[$yazi]."'");
                                $uye = row($uye);

                                if($mail["mail_alan"] == session("uye_id")){ $uye["uye_adi"] = $d["ben"]; $uye["uye_soyadi"] = ""; }

                                $oku = query("SELECT * FROM okular WHERE oku_tip = 'mail' AND oku = '".$mail["mail_id"]."' AND oku_uye_id = '".session("uye_id")."'");
                                if(mysql_affected_rows()){ $oku = "evet"; $okusinif = "read"; }else{ $oku = "hayir"; $okusinif = "unread"; }

                                $yildiz = query("SELECT * FROM yildizlar WHERE yildiz_tip = 'mail' AND yildiz_uye_id = '".session("uye_id")."' AND yildiz = '".$mail["mail_id"]."'");
                                if(mysql_affected_rows()){ $yildiz = "evet"; $yildizsinif = "icon-star-full2 text-orange"; }else{ $yildiz = "hayir"; $yildizsinif = "icon-star-empty3 text-muted"; }

                                $ek = query("SELECT * FROM mailekleri WHERE ek_mail_id = '".$mail["mail_id"]."'"); $ekadet = mysql_num_rows($ek);
                                if(mysql_affected_rows()){ $ek = "var"; }else{ $ek = "yok"; }

                        ?>

                        <tr id="mail_<?= $mail["mail_id"] ?>" class="<?= $okusinif ?>">
                            <td class="table-inbox-checkbox rowlink-skip">
                                <i class="icon-trash text-danger" onclick="sil('<?= $mail["mail_id"] ?>')" data-popup="tooltip" title="<?= $d["tamamensil"] ?>"></i>
                            </td>
                            <td class="table-inbox-star rowlink-skip">
                                <i class="icon-drawer-out text-danger" onclick="silme('<?= $mail["mail_id"] ?>')" data-popup="tooltip" title="<?= $d["coptencikar"] ?>"></i>
                                <a href="index.php?do=mail&id=<?= $mail["mail_id"] ?>">

                                </a>
                            </td>
                            <td class="table-inbox-image">
                                <img src="<?= $uye["uye_resim"] ?>" class="img-circle img-xs" alt="">
                            </td>
                            <td class="table-inbox-name">
                                <a href="#">
                                    <div class="letter-icon-title text-default"><?= $uye["uye_adi"]." ".$uye["uye_soyadi"] ?></div>
                                </a>
                            </td>
                            <td class="table-inbox-message">
                                <span class="table-inbox-subject"><?= $mail["mail_baslik"] ?> &nbsp;-&nbsp;</span>
                                <span class="table-inbox-preview"><?= strip_tags($mail["mail"]) ?></span>
                            </td>
                            <td class="table-inbox-attachment">
                                <? if($ek == "var"){ ?><i class="icon-attachment text-muted" data-popup="tooltip" title="<?= $ekadet." ".$d["adetek"] ?>"></i><? } ?>
                            </td>
                            <td class="table-inbox-time">
                                <?= sure($mail["mail_tarih"]) ?>
                            </td>
                        </tr>

                        <? atla: }

                        ?>


                        <tr id="sifir" <? if($sifir !== "evet"){ ?> style="display: none" <? } ?>>

                            <td rowspan="7" class="text-center text-muted text-italic">

                                <?= $d["copkutunuzbombos"] ?>

                            </td>

                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /single line -->


        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->