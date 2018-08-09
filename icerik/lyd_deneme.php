<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Single line -->
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h6 class="panel-title"><?= $d["urunekle"] ?></h6>
                </div>

                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-4">

                            <fieldset class="content-group">

                                <legend class="text-bold"><?= $d["urunagaci"] ?></legend>

                                <?

                                function urunadkod($id){
                                    $id = 1;

                                    $urun = row(query("SELECT * FROM urunler WHERE urun_id = '$id'"));
                                    $grupkod = row(query("SELECT grup_kod FROM urungruplari WHERE grup_id = '".$urun["urun_grup_id"]."'"))["grup_kod"];
                                    $kod = $grupkod.$urun["urun_kodu"];

                                    return $kod;

                                }

                                function agac($id){

                                    $html = "";


                                    $query = query("SELECT * FROM urunagaclari WHERE agac_ust_id = '$id'");
                                    if (mysql_affected_rows()) {

                                        $html .= "<ul>\n";

                                        while ($row = row($query)) {

                                            $asd = query("SELECT * FROM urunagaclari WHERE agac_ust_id = '".$row["agac_id"]."'");
                                            if(!mysql_affected_rows()){

                                                $html .= "<li>\n".urunadkod($row["agac"])."\n</li>";

                                            }else{

                                                $html .= "<li class='folder'>\n".urunadkod($row["agac"])."\n";
                                                $html .= agac($row["agac_id"]);
                                                $html .= "</li> \n";

                                            }

                                        }

                                        $html .= "</ul> \n";

                                    }

                                    return $html;

                                }



                                ?>

                                <div class="tree-default well border-left-info border-left-lg">
                                    <?= agac(row(query("SELECT * FROM urunagaclari WHERE agac = '1'"))["agac_id"]) ?>
                                </div>

                            </fieldset>

                        </div>
                        <div class="col-md-4">

                            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="">
                                <fieldset class="content-group">
                                    <legend class="text-bold"><?= $d["urunbilgileri"] ?></legend>

                                    <div class="form-group has-feedback has-feedback-left">
                                        <label class="control-label col-lg-2"><?= $d["urunadi"] ?></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" placeholder="<?= $d["turkceurunadi"] ?>">
                                            <div class="form-control-feedback">
                                                <img src="assets/images/flags/tr.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback has-feedback-left">
                                        <label class="control-label col-lg-2"></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" placeholder="<?= $d["ingilizceurunadi"] ?>">
                                            <div class="form-control-feedback">
                                                <img src="assets/images/flags/en.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["urunkodu"] ?></label>
                                        <div class="col-lg-7">
                                            <input type="text" name="kadi" class="form-control"  placeholder="<?= $d["urunkodu"] ?>">
                                        </div>
                                        <div class="col-lg-3">
                                            <select class="select" name="" id="">
                                                <option value=""><?= $d["normal"] ?></option>
                                                <option value=""><?= $d["nihai"] ?></option>
                                                <option value=""><?= $d["aktif"] ?></option>
                                                <option value=""><?= $d["nihai"] ?> + <?= $d["aktif"] ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <button id="buton" type="submit" class="btn btn-primary"><?= $d["kaydet"] ?> <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                            </form>

                        </div>
                        <div class="col-md-4">

                            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="">
                                <fieldset class="content-group">
                                    <legend class="text-bold"><?= $d["urunagaciduzenle"] ?></legend>

                                    <div class="form-group has-feedback has-feedback-right">
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" placeholder="<?= $d["ingilizceurunadi"] ?>">
                                            <div class="form-control-feedback">
                                                <button>sad</button>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                            </form>

                        </div>

                    </div>

                </div>

            </div>
            <!-- /single line -->


        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->