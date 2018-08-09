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
               

                <?

                $parca = row(query("SELECT * FROM parcalar"));

                ?>

               

                <table class="table datatable-basic">

                    <thead>

                        <tr>

                            <th class="col-md-1 text-center">Sıra</th>
                            <th class="col-md-3">Parca Adı</th>
                            <th class="col-md-1 text-center">Parca Tip</th>
                            <th class="col-md-1">Parca Grup</th>
                            <th class="col-md-2">Parca Kodu</th>
                            <th class="col-md-1 text-right">Min. Stok</th>
                            <th class="col-md-1 text-center">Parcaya Git</th>



                        </tr>

                    </thead>

                    <tbody>

                        <?
                        $i = "1";
                        $ts = query("SELECT * FROM parcalar");
                        while($parca = row($ts)){

                            $parcagrup = row(query("SELECT * FROM parcagruplari WHERE grup_kod = '".$parca["parca_grup"]."'"));

                            //$parca["parca_kodu"] = str_replace($parca["parca_grup"],"",$parca["parca_kodu"]);     //Parça kodunun başından grup kodunu siler


                        ?>

                        <tr>

                            <td class="text-center"><?= $i ?></td>
                            <td class="text-bold"><?= $parca["parca_adi"] ?></td>
                            <td class="text-center"><?= $d[$parca["parca_tip"]] ?></td>
                            <td class="text-bold"><?= $parcagrup["grup_adi"] ?></td>
                            <td class="text-bold"><?= $parca["parca_kodu"] ?></td>
                            <td class="text-right"><?= ondalik($parca["parca_min_stok"]) ?></td>
                            <td class="text-center"><i style="cursor:pointer;" onclick="window.open('index.php?do=parca&id=<?= $parca["parca_id"] ?>')" title="Parca Goruntule" data-popup="tooltip" class="icon-quill4"></i></td>

                        </tr>

                    <?php 
                    $i ++;
                } ?>

                        

                      

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