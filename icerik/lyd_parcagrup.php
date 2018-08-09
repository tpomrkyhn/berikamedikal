
<?


    if(g("id") !== ""){

        $ggrup = g("id");

    }else{

        $ggrup = false;

    }

    $grupp = row(query("SELECT * FROM parcagruplari WHERE grup_id = '$ggrup'"));

?>

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Single line -->
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h6 class="panel-title"><?= $d["parcagrup"] ?></h6>
                </div>

                <div class="panel-body">

                    <div class="row">

                        <form id="grupbilgileri" class="form-horizontal" enctype="multipart/form-data" method="post" action="">

                            <div class="col-md-4">

                                <fieldset class="content-group">

                                    <input type="hidden" name="grupid" id="grupid" value="<?= $grup ?>">

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["grupkodu"] ?></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="grupKodu" placeholder="<?= $d["grupkodu"] ?>" value="<?= $grupp["grup_kod"] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["grupadi"] ?></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="grupAdi" placeholder="<?= $d["grupadi"] ?>" value="<?= $grupp["grup_adi"] ?>">
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <? if($ggrup == false){ ?><button onclick="grupekle()" id="eklebuton" type="button" class="btn btn-primary"><?= $d["kaydet"] ?> <i class="icon-arrow-right14 position-right"></i></button><? } ?>
                                        <button style="display: <? if($ggrup !== false){ echo "inline-block"; }else{ echo "none"; } ?>" onclick="grupguncelle()" type="button" id="guncellebuton" class="btn"><?= $d["guncelle"] ?> <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>

                                </fieldset>

                            </div>

                        </form>

                    </div>

                    <script>

                        var id = "<? if($ggrup !== false){ echo $ggrup; }else{ echo 0; } ?>";

                        function grupekle() {

                            document.getElementById("eklebuton").disabled = true;

                            var grupbilgileri = $("#grupbilgileri").serialize();

                            $.ajax({
                                url:'fonksiyon/grupekle.php', // serileştirilen değerleri ajax.php dosyasına
                                type:'POST', // post metodu ile
                                data:grupbilgileri, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                    if(e !== "hata" && e !== "eksik"){

                                        id = e;
                                        document.getElementById("grupid").value = e;
                                        document.getElementById("eklebuton").style.display = "none";
                                        document.getElementById("guncellebuton").style.display = "inline-block";

                                        new PNotify({
                                            title: '<?= $d["eklendi"] ?>',
                                            text: '<?= $d["grupbasariylaeklendi"] ?>',
                                            icon: 'icon-floppy-disk',
                                            addclass: 'bg-success'
                                        });

                                    }else if(e == "hata"){

                                        new PNotify({
                                            title: '<?= $d["hata"] ?>',
                                            text: '<?= $d["sunucuhatasi"]." - ".$d["tekrardeneyiniz"] ?>',
                                            icon: 'icon-warning22',
                                            addclass: 'bg-warning'
                                        });

                                        document.getElementById("eklebuton").disabled = false;

                                    }else if(e == "eksik"){

                                        new PNotify({
                                            title: '<?= $d["hata"] ?>',
                                            text: '<?= $d["bilgilerieksikurunadiyadakodu"] ?>',
                                            icon: 'icon-warning22',
                                            addclass: 'bg-warning'
                                        });

                                        document.getElementById("eklebuton").disabled = false;

                                    }
                                }
                            });

                        }

                        function grupguncelle() {

                            document.getElementById("guncellebuton").disabled = true;

                            var grupbilgileri = $("#grupbilgileri").serialize();

                            $.ajax({
                                url:'fonksiyon/grupguncelle.php', // serileştirilen değerleri ajax.php dosyasına
                                type:'POST', // post metodu ile
                                data:grupbilgileri, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                    if(e !== "hata" && e !== "eksik"){

                                        new PNotify({
                                            title: '<?= $d["guncelle"] ?>',
                                            text: '<?= $d["urun"] ?>',
                                            icon: 'icon-floppy-disk',
                                            addclass: 'bg-success'
                                        });

                                    }else if(e == "hata"){

                                        new PNotify({
                                            title: '<?= $d["hata"] ?>',
                                            text: '<?= $d["sunucuhatasi"]." - ".$d["tekrardeneyiniz"] ?>',
                                            icon: 'icon-warning22',
                                            addclass: 'bg-warning'
                                        });


                                    }else if(e == "eksik"){

                                        new PNotify({
                                            title: '<?= $d["hata"] ?>',
                                            text: '<?= $d["bilgilerieksikurunadiyadakodu"] ?>',
                                            icon: 'icon-warning22',
                                            addclass: 'bg-warning'
                                        });


                                    }

                                    document.getElementById("guncellebuton").disabled = false;

                                }
                            });

                        }

                    </script>

                </div>

            </div>
            <!-- /single line -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->