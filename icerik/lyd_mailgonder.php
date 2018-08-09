<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main sidebar-default sidebar-separate">
            <? include_once "mailsol.php"; ?>
        </div>
        <!-- /main sidebar -->

        <?
            if($_POST){

                $mailGonderen = session("uye_id");

                $mailAlicilar = p("mailAlici");
                $mailBaslik = p("mailBaslik");
                $mail = p("mail");

                $mailAlicilar = explode(",",$mailAlicilar);
                $mailAlicilar = array_unique($mailAlicilar);

                $aliciAdet = count($mailAlicilar);

                $sql = "INSERT INTO mailler SET
                        mail_alan = :mailAlici,
                        mail_baslik = :mailBaslik,
                        mail = :mail,
                        mail_gonderen = :mailGonderen";


                $i = 0;
                while($i < $aliciAdet){

                    $query = $pdo->prepare($sql);

                    $mailAlici = $mailAlicilar[$i];
                    $mailAlici = trim($mailAlici);

                    $aliciQuery = query("SELECT * FROM uyeler WHERE uye_kadi = '$mailAlici'");
                    $mailAlici = row($aliciQuery)["uye_id"];

                    $ekle = $query->execute(array(

                            "mailAlici" => $mailAlici,
                            "mailBaslik" => $mailBaslik,
                            "mail" => $mail,
                            "mailGonderen" => $mailGonderen

                    ));

                    if ( $ekle ){

                        $mailID = $pdo->lastInsertId();

                        if($i == 0 && $aliciAdet > 1){

                            $topluID = $mailID;

                        }

                        if($aliciAdet > 1){

                            $guncelle = query("UPDATE mailler SET mail_toplu = '$topluID' WHERE mail_id = '$mailID'");

                        }


                    }

                    $klasor="dosyalar/mailekleri/mailID-".$mailID;
                    $dosya_sayi=count($_FILES['dosya']['name']);
                    for($i=0;$i<$dosya_sayi;$i++){

                        if(!empty($_FILES['dosya']['name'][$i])){

                            $dosyaadi = date("-d.m.Y-H:i:s-").sefflink($_FILES['dosya']['name'][$i]);
                            $tip1 = ".".explode("/",$_FILES['dosya']['type'][$i])[1];

                            if(move_uploaded_file($_FILES['dosya']['tmp_name'][$i],$klasor.$dosyaadi.$tip1)){

                                $tip = pathinfo($klasor.$dosyaadi.$tip1, PATHINFO_EXTENSION);
                                $ekle = query("INSERT INTO mailekleri SET ek_mail_id = '$mailID', ek = '".$d["tplydurl"].$klasor.$dosyaadi.$tip1."', ek_tip = '$tip'");

                            }


                        }
                    }

                    $i++;

                }

            }

        ?>

        <!-- Main content -->
        <div class="content-wrapper">

            <form action="" method="post" enctype="multipart/form-data">

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
                                <button type="submit" class="btn bg-blue"><i class="icon-checkmark3 position-left"></i> <?= $d["gonder"] ?></button>
                            </div>

                            <div class="btn-group navbar-btn">
                                <button type="button" class="btn btn-default"><i class="icon-plus2"></i> <span class="hidden-xs position-right"><?= $d["kaydet"] ?></span></button>
                                <button type="button" class="btn btn-default"><i class="icon-cross2"></i> <span class="hidden-xs position-right"><?= $d["iptal"] ?></span></button>

                            </div>

                            <div class="pull-right-lg">
                                <div class="btn-group navbar-btn">
                                    <button type="button" class="btn btn-default"><i class="icon-printer"></i> <span class="hidden-xs position-right"><?= $d["yazdir"] ?></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /mail toolbar -->

                <!-- Mail details -->
                <div class="table-responsive mail-details-write">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td style="width: 150px"><?= $d["alici"] ?>:</td>
                            <td class="no-padding"><input name="mailAlici" autocomplete="off" type="text" class="form-control tokenfield" onkeydown="if(event.keyCode==13){ return false; }"></td>
                            <td style="width: 250px" class="text-right">
                                <ul class="list-inline list-inline-separate no-margin">
                                    <li class="text-muted"><?= $d["mailaciklama"] ?></li>
                                </ul>
                            </td>
                        </tr>
                        <!--<tr>
                            <td style="width: 150px"></td>
                            <td colspan="2">

                                <span style="background-color: #EDEDEE; padding: 8px; border-radius: 2px; color: #8b8b8b; margin-right: 5px">deneme <i style="cursor: pointer" class="icon-cross3"></i></span>

                            </td>
                        </tr>-->
                        <tr>
                            <td><?= $d["baslik"] ?>:</td>
                            <td class="no-padding"><input name="mailBaslik" type="text" class="form-control" placeholder="<?= $d["konuyugiriniz"] ?>"></td>
                            <td>&nbsp;</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /mail details -->


                <!-- Mail container -->
                <div class="mail-container-write">
                    <textarea class="summernote" id="summernote" name="mail">



                    </textarea>
                </div>
                <!-- /mail container -->


                <!-- Attachments -->
                <div class="mail-attachments-container">
                    <h6 class="mail-attachments-heading"><?= $d["dosyaekleri"] ?></h6>

                    <div class="row">

                        <div class="col-md-6">

                            <input name="dosya[]" id="dosya[]" type="file" class="file-styled" multiple>

                        </div>

                    </div>


                </div>
                <!-- /attachments -->

            </div>
            <!-- /single mail -->

            </form>

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>