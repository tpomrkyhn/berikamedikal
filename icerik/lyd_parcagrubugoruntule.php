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

                            <th class="col-md-1">Sıra</th>
                            <th class="col-md-5 text-right">Parca Grup Adı</th>
                            <th class="col-md-5 text-right">Parca Grup Kodu</th>
                            <th class="col-md-1 text-right">Parca Grubuna Git</th>



                        </tr>

                    </thead>

                    <tbody>

                        <?
                        $i = "1";
                        $ts = query("SELECT * FROM parcagruplari");
                        while($parca = row($ts)){                           


                        ?>

                        <tr>

                            <td class="text-right"><?= $i ?></td>
                            <td class="text-right text-bold <?= $htip ?>"><?= $parca["grup_adi"] ?></td>
                            <td class="text-right"><?= $parca["grup_kod"] ?></td>
                            <td class="text-center"><i style="cursor:pointer;" onclick="window.open('index.php?do=parca&id=<?= $parca["parca_id"] ?>')" title="Parca Goruntule" data-popup="tooltip" class="icon-quill4"></i></td>

                        </tr>

                    <?php 
                    $i = $i + 1 ;
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