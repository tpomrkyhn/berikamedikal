    <!-- Page container -->

    <?

    $id = g("id");

    ?>

    <div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Single line -->
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h6 class="panel-title"><?= $d["aramasonuclari"] ?></h6>
                </div>

                <?

                $parca = row(query("SELECT * FROM parcalar WHERE parca_id = '$id'"));

                ?>

                <div class="panel-body">

                    <table style="width: 100%">

                        <tr>

                            <td class="text-bold">Parça Kodu:</td>
                            <td class="text-bold">Parça Adı:</td>
                            <td class="text-bold">Alış Birim:</td>
                            <td class="text-bold">Satış Birim:</td>
                            <td class="text-bold">Katsayı:</td>
                            <td class="text-bold">Stok Miktarı:</td>
                            <td class="text-bold">Min. Stok:</td>

                        </tr>

                        <tr>

                            <td><?= $parca["parca_kodu"] ?></td>
                            <td><?= $parca["parca_adi"] ?></td>
                            <td><?= row(query("SELECT * FROM birimler WHERE birim_id = '".$parca["parca_alisbirim"]."'"))["birim"] ?></td>
                            <td><?= row(query("SELECT * FROM birimler WHERE birim_id = '".$parca["parca_satisbirim"]."'"))["birim"] ?></td>
                            <td><?= ondalik($parca["parca_oran"]) ?></td>
                            <td><?= ondalik(stok($id)) ?></td>
                            <td><?= ondalik($parca["parca_min_stok"]) ?></td>

                        </tr>

                    </table>


                </div>

                <table class="table datatable-basic">

                    <thead>

                        <tr>

                            <th class="col-md-1"><?= $d["sira"] ?></th>
                            <th class="col-md-1 text-center"><?= $d["tip"] ?></th>
                            <th class="col-md-2 text-center"><?= $d["tarih"] ?></th>
                            <th class="col-md-5"><?= $d["tedarikci"]." · ".$d["musteri"] ?></th>
                            <th class="col-md-1 text-right"><?= $d["miktar"] ?></th>
                            <th class="col-md-1 text-right"><?= $d["bakiye"] ?></th>
                            <th class="col-md-1 text-center"><?= $d["islem"] ?></th>

                        </tr>

                    </thead>

                    <tbody>

                        <?

                            $i = 0;
                            $bakiye = 0;

                            $hareketler = query("SELECT * FROM hareketler WHERE hareket_parca_id = '$id' ORDER BY hareket_tarih ASC");
                            while($hareket = row($hareketler)){

                                $i++;

                                if($hareket["hareket_tip"] == "arti"){

                                    $htip = "text-success";
                                    $mc = "text-success";

                                    $bakiye += $hareket["hareket_miktar"];

                                    $sirket = row(query("SELECT * FROM sirketler WHERE musteri_id = '".$hareket["hareket_tedarikci_id"]."'"));

                                }else{

                                    $htip = "text-danger";
                                    $mc = "text-danger";

                                    $bakiye -= $hareket["hareket_miktar"];

                                    $sirket = row(query("SELECT * FROM sirketler WHERE musteri_id = '".$hareket["hareket_musteri_id"]."'"));

                                }

                                if($bakiye == $parca["parca_min_stok"]){

                                    $bc = "text-orange";
                                    $aciklama = $d["minesitaciklama"];

                                }else if($bakiye > $parca["parca_min_stok"]){

                                    $bc = "text-success";
                                    $aciklama = "";

                                }else if($bakiye < $parca["parca_min_stok"]){

                                    $bc = "text-danger";
                                    $aciklama = $d["minaltiaciklama"];

                                }


                        ?>

                        <tr>

                            <td class="text-center"><?= $i ?></td>
                            <td class="text-center text-bold <?= $htip ?>"><?= $d[$hareket["hareket_tip"]] ?></td>
                            <td class="text-center"><span style="display: none"><?= $hareket["hareket_tarih"] ?></span><?= tarih($hareket["hareket_tarih"],"on","tarih") ?></td>
                            <td class="text-bold"><?= $sirket["musteri_kodu"]." · ".$sirket["musteri_adi"] ?></td>
                            <td class="text-right text-bold <?= $mc ?>"><?= ondalik($hareket["hareket_miktar"]) ?></td>
                            <td class="text-right text-bold <?= $bc ?>"><?= ondalik($bakiye) ?></td>
                            <td class="text-center"><i style="cursor:pointer;" onclick="window.open('index.php?do=hareket&id=<?= $hareket["hareket_id"] ?>')" title="<?= $d["hareketgoruntule"] ?>" data-popup="tooltip" class="icon-quill4"></i></td>

                        </tr>

                        <? } ?>

                        <tfoot>

                            <tr>

                                <td colspan="3"></td>
                                <td class="text-bold <?= $bc ?>"><?= $aciklama ?></td>
                                <td class="text-right text-bold"><?= $d["bakiye"] ?></td>
                                <td class="text-right text-bold <?= $bc ?>"><?= ondalik($bakiye) ?></td>
                                <td></td>

                            </tr>

                        </tfoot>

                    </tbody>

                </table>

            </div>
            <!-- /single line -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->