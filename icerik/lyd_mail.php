<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main sidebar-default sidebar-separate">
            <? include_once "mailsol.php"; ?>
        </div>
        <!-- /main sidebar -->

        <?

            $mid = g("id"); $mailler = query("SELECT * FROM mailler WHERE (mail_alan = '".session("uye_id")."' OR  mail_gonderen = '".session("uye_id")."') AND mail_id = '$mid'"); if(mysql_affected_rows()){ $mail = row($mailler); }


            $sil = query("SELECT * FROM siller WHERE sil_tip = 'mail' AND sil_uye_id = '".session("uye_id")."' AND sil = '".$mail["mail_id"]."'");
            if(mysql_affected_rows()){ $mid = ""; $mail = ""; }

            $uye = query("SELECT * FROM uyeler WHERE uye_id = '".$mail["mail_gonderen"]."'");
            $uye = row($uye);

            $query = query("SELECT * FROM okular WHERE oku_tip = 'mail' AND oku_uye_id = '".session("uye_id")."' AND oku = '$mid'");
            if(!mysql_affected_rows()){

                $query = query("INSERT INTO okular SET oku_tip = 'mail', oku_uye_id = '".session("uye_id")."', oku = '$mid'");

            }

        ?>

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Single mail -->
            <div class="panel panel-white">

                <!-- Mail toolbar -->
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
                                <a href="mail_write.html" class="btn btn-default"><i class="icon-reply"></i> <span class="hidden-xs position-right"><?= $d["cevapla"] ?></span></a>
                                <a href="mail_write.html" class="btn btn-default"><i class="icon-forward"></i> <span class="hidden-xs position-right"><?= $d["ilet"] ?></span></a>
                                <a href="#" class="btn btn-default"><i class="icon-bin"></i> <span class="hidden-xs position-right"><?= $d["sil"] ?></span></a>

                            </div>

                            <div class="pull-right-lg">
                                <p class="navbar-text"><?= sureuzun($mail["mail_tarih"]) ?></p>
                                <div class="btn-group navbar-btn">
                                    <a href="#" class="btn btn-default"><i class="icon-printer"></i> <span class="hidden-xs position-right"><?= $d["yazdir"] ?></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /mail toolbar -->


                <!-- Mail details -->
                <div class="media stack-media-on-mobile mail-details-read">
                    <a href="#" class="media-left">
                        <img src="<?= $uye["uye_resim"] ?>" class="img-circle img-lg" alt="">
                    </a>

                    <div class="media-body">
                        <h6 class="media-heading"><?= $mail["mail_baslik"] ?></h6>
                        <div class="letter-icon-title text-semibold"><?= $uye["uye_adi"]." ".$uye["uye_soyadi"] ?> <a href="#">&lt;<?= $uye["uye_kadi"] ?>&gt;</a></div>
                    </div>

                    <div class="media-right media-middle text-nowrap">
                        <ul class="list-inline list-inline-condensed no-margin">
                            <? require "maildigerkisiler.php"; ?>
                        </ul>
                    </div>
                </div>
                <!-- /mail details -->


                <!-- Mail container -->
                <div class="mail-container-read">

                    <?= $mail["mail"] ?>

                </div>
                <!-- /mail container -->

                <?

                    $ek1 = query("SELECT * FROM mailekleri WHERE ek_mail_id = '".$mail["mail_id"]."'");
                    if(mysql_affected_rows()){ $ek = mysql_num_rows($ek1); }else{ $ek = "yok"; }

                ?>

                <!-- Attachments -->
                <div class="mail-attachments-container">
                    <h6 class="mail-attachments-heading"> <? if($ek !== "yok"){ echo $ek; }else{ goto ekyok; } ?> <?= $d["adetek"] ?></h6>

                    <ul class="mail-attachments">
                        <?

                            while($ek2 = row($ek1)){

                                if($ek2["ek_tip"] == "jpg" || $ek2["ek_tip"] == "png" || $ek2["ek_tip"] == "gif" || $ek2["ek_tip"] == "tif"){

                                    $tip = "picture";

                                }else if($ek2["ek_tip"] == "zip" || $ek2["ek_tip"] == "rar"){

                                    $tip = "zip";

                                }else if($ek2["ek_tip"] == "pdf" || $ek2["ek_tip"] == "word" || $ek2["ek_tip"] == "excel"){

                                    $tip = $ek2["ek_tip"];

                                }else{

                                    $tip = "media";

                                }


                        ?>
                        <li>
								<span class="mail-attachments-preview">
									<i class="icon-file-<?= $tip ?> icon-2x"></i>
								</span>

                            <div class="mail-attachments-content">
                                <span class="text-semibold"><?= mb_substr($ek2["ek"],0,20)."..." ?></span>

                                <ul class="list-inline list-inline-condensed no-margin">
                                    <li class="text-muted"><?= $ek2["ek_tip"]." ".$d["dosyasi"] ?></li>
                                    <li><a download href="<?= $ek2["ek"] ?>"><?= $d["indir"] ?></a></li>
                                    <li><a target="_blank" href="<?= $ek2["ek"] ?>"><?= $d["ac"] ?></a></li>
                                </ul>
                            </div>
                        </li>
                        <? } ekyok: ?>
                    </ul>
                </div>
                <!-- /attachments -->

            </div>
            <!-- /single mail -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>