
<?

    if(g("id") !== ""){

        $urun = g("id");

    }else{

        $urun = false;

    }

    $urunn = row(query("SELECT * FROM urunler WHERE urun_id = '$urun'"));

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
                    <h6 class="panel-title"><?= $d["urun"] ?></h6>
                </div>

                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-4">

                            <form id="urunbilgileri" class="form-horizontal" enctype="multipart/form-data" method="post" action="">
                                <fieldset class="content-group">
                                    <legend class="text-bold"><?= $d["urunbilgileri"] ?></legend>

                                    <input type="hidden" name="urunid2" id="urunid2" value="<? if($urun !== false){ echo $urun; } ?>">

                                    <div class="form-group has-feedback has-feedback-left">
                                        <label class="control-label col-lg-2"><?= $d["urunadi"] ?></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="urunAdiTurkce" placeholder="<?= $d["turkceurunadi"] ?>" value="<?= $urunn["urun_adi"] ?>">
                                            <div class="form-control-feedback">
                                                <img src="assets/images/flags/tr.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback has-feedback-left">
                                        <label class="control-label col-lg-2"></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="urunAdiIngilizce" placeholder="<?= $d["ingilizceurunadi"] ?>" value="<?= $urunn["urun_adi_en"] ?>">
                                            <div class="form-control-feedback">
                                                <img src="assets/images/flags/en.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["aciklama"] ?></label>
                                        <div class="col-lg-10">
                                            <textarea name="urunAciklama" class="form-control" id="" rows="3"><?= $urunn["urun_aciklama"] ?></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["urunkodu"] ?></label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" name="urunKodu" placeholder="<?= $d["urunkodu"] ?>" value="<?= $urunn["urun_kodu"] ?>">
                                        </div>
                                        <div class="col-lg-3">
                                            <select class="select" name="urunTip" id="">
                                                <option <? if($urunn["urun_tip"] == "-"){ echo "selected"; } ?> value="-"><?= $d["normal"] ?></option>
                                                <option <? if($urunn["urun_tip"] == "n"){ echo "selected"; } ?> value="n"><?= $d["nihai"] ?></option>
                                                <option <? if($urunn["urun_tip"] == "a"){ echo "selected"; } ?> value="a"><?= $d["aktif"] ?></option>
                                                <option <? if($urunn["urun_tip"] == "na"){ echo "selected"; } ?> value="na"><?= $d["nihai"] ?> + <?= $d["aktif"] ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <? if($urun == false){ ?><button onclick="urunekle()" id="eklebuton" type="button" class="btn btn-primary"><?= $d["kaydet"] ?> <i class="icon-arrow-right14 position-right"></i></button><? } ?>
                                        <button style="display: <? if($urun !== false){ echo "inline-block"; }else{ echo "none"; } ?>" onclick="urunguncelle()" type="button" id="guncellebuton" class="btn"><?= $d["guncelle"] ?> <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                            </form>

                        </div>

                        <div class="col-md-4" id="urunagaci" style="display: <? if($urun !== false){ echo "block"; }else{ echo "none"; } ?>">

                            <fieldset class="content-group">

                                <legend class="text-bold"><?= $d["urunagaci"] ?></legend>

                                <div id="urunagaciveriler">



                                </div>

                                <div class="text-right text-muted" style="padding-top: 10px" id="yenilebuton">

                                    <span onclick="urunagaciguncelle()" style="cursor: pointer"><?= $d["yenile"] ?> <i class="icon-database-refresh"></i></span>

                                </div>

                            </fieldset>

                        </div>

                        <div class="col-md-4" id="agacduzenleme" style="display: <? if($urun !== false){ echo "block"; }else{ echo "none"; } ?>">

                            <form id="agacduzenle" class="form-horizontal" enctype="multipart/form-data" method="post" action="">
                                <fieldset class="content-group">
                                    <legend class="text-bold"><?= $d["urunagaciduzenle"] ?></legend>

                                    <input type="hidden" name="urunid" id="urunid" value="<? if($urun !== false){ echo $urun; } ?>">

                                    <div class="form-group" id="urunaramadis">
                                        <label class="control-label col-lg-2"><?= $d["urun"] ?></label>
                                        <div class="col-lg-10">
                                            <select class="select-search" name="urunarama" id="urunarama" onchange="urunkontrol()">
                                                <option selected value="sec"><?= $d["seciniz"] ?></option>
                                                <?

                                                    $query  = query("SELECT * FROM urunler ORDER BY urun_id DESC");
                                                    while($row = row($query)){

                                                ?>
                                                <option value="<?= $row["urun_id"] ?>"><?= $row["urun_kodu"] ?> - <?= $row["urun_adi"] ?></option>
                                                <? } ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group" id="parcaaramadis">
                                        <label class="control-label col-lg-2"><?= $d["parca"] ?></label>
                                        <div class="col-lg-10">
                                            <select class="select-search" name="parcaarama" id="parcaarama" onchange="parcakontrol()">
                                                <option selected value="sec"><?= $d["seciniz"] ?></option>
                                                <?

                                                $query = query("SELECT * FROM parcalar ORDER BY parca_id DESC");
                                                while($row = row($query)){

                                                    ?>
                                                    <option value="<?= $row["parca_id"] ?>"><?= $row["parca_kodu"] ?> - <?= $row["parca_adi"] ?></option>
                                                <? } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["adet"] ?></label>
                                        <div class="col-lg-10">
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="adet" id="adet" placeholder="">
                                                <span class="input-group-addon switchery-xs">
												    <input type="checkbox">&nbsp;&nbsp;<?= $d["kilitle"] ?>&nbsp;
											    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button onclick="agacekle()" id="agacbuton" type="button" class="btn btn-primary"><?= $d["ekle"] ?> <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </fieldset>

                            </form>

                        </div>

                        <script>


                            var id = "<? if($urun !== false){ echo $urun; }else{ echo 0; } ?>";

                            <? if($urun !== false){ ?> urunagaciguncelle("hayir"); <? } ?>

                            function urunagaciguncelle(bildirim = "evet"){

                                $.ajax({
                                    url:'icerik/bolge/urunagaci2.php', // serileştirilen değerleri ajax.php dosyasına
                                    type:'POST', // post metodu ile
                                    data:{id:id}, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                    success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                        if(e.substring(0,4) == 'bos-'){

                                            document.getElementById("urunagaciveriler").innerHTML = "<div class='text-center text-italic text-muted'><?= $d["oncelikleurunyadaparcaekleyiniz"] ?></div>";
                                            document.getElementById("yenilebuton").style.display = "none";

                                        }else{

                                            document.getElementById("urunagaciveriler").innerHTML = e;
                                            $(".tree-default").fancytree({
                                                init: function (event, data) {
                                                    $('.has-tooltip .fancytree-title').tooltip();
                                                }
                                            });

                                            if(bildirim == "evet"){

                                                new PNotify({
                                                    title: '<?= $d["guncelleme"] ?>',
                                                    text: '<?= $d["urunagaciguncellendi"] ?>',
                                                    icon: 'icon-database-refresh',
                                                    addclass: 'bg-orange'
                                                });

                                            }

                                            document.getElementById("yenilebuton").style.display = "block";

                                        }
                                    }
                                });

                            }



                            function urunekle() {

                                document.getElementById("eklebuton").disabled = true;

                                var urunbilgileri = $("#urunbilgileri").serialize();

                                $.ajax({
                                    url:'fonksiyon/urunekle.php', // serileştirilen değerleri ajax.php dosyasına
                                    type:'POST', // post metodu ile
                                    data:urunbilgileri, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                    success:function(e) { // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                        if (e !== "hata" && e !== "eksik") {

                                            id = e;
                                            document.getElementById("urunid").value = e;
                                            document.getElementById("urunid2").value = e;
                                            document.getElementById("eklebuton").style.display = "none";
                                            document.getElementById("guncellebuton").style.display = "inline-block";
                                            urunagaciguncelle();
                                            document.getElementById("urunagaci").style.display = "block";
                                            document.getElementById("agacduzenleme").style.display = "block";

                                            new PNotify({
                                                title: '<?= $d["eklendi"] ?>',
                                                text: '<?= $d["urunbasariylaeklendi"] ?>',
                                                icon: 'icon-floppy-disk',
                                                addclass: 'bg-success'
                                            });

                                        } else if (e == "hata") {

                                            new PNotify({
                                                title: '<?= $d["hata"] ?>',
                                                text: '<?= $d["sunucuhatasi"] . " - " . $d["tekrardeneyiniz"] ?>',
                                                icon: 'icon-warning22',
                                                addclass: 'bg-warning'
                                            });

                                            document.getElementById("eklebuton").disabled = false;

                                        } else if (e == "eksik") {

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

                            function urunguncelle() {

                                document.getElementById("guncellebuton").disabled = true;

                                var urunbilgileri = $("#urunbilgileri").serialize();

                                $.ajax({
                                    url:'fonksiyon/urunguncelle.php', // serileştirilen değerleri ajax.php dosyasına
                                    type:'POST', // post metodu ile
                                    data:urunbilgileri, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                    success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                        if(e !== "hata" && e !== "eksik"){

                                            document.getElementById("guncellebuton").disabled = false;

                                            new PNotify({
                                                title: '<?= $d["guncellendi"] ?>',
                                                text: '<?= $d["urunbasariylguncellendi"] ?>',
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

                                            document.getElementById("guncellebuton").disabled = false;

                                        }else if(e == "eksik"){

                                            new PNotify({
                                                title: '<?= $d["hata"] ?>',
                                                text: '<?= $d["bilgilerieksikurunadiyadakodu"] ?>',
                                                icon: 'icon-warning22',
                                                addclass: 'bg-warning'
                                            });

                                            document.getElementById("guncellebuton").disabled = false;

                                        }
                                    }
                                });

                            }

                            function agacekle() {

                                document.getElementById("agacbuton").disabled = true;

                                var agacduzenle = $("#agacduzenle").serialize();

                                $.ajax({
                                    url:'fonksiyon/agacekle.php', // serileştirilen değerleri ajax.php dosyasına
                                    type:'POST', // post metodu ile
                                    data:agacduzenle, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                    success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                        if(e == "eklendi"){

                                            urunagaciguncelle("hayir");
                                            new PNotify({
                                                title: '<?= $d["eklendi"] ?>',
                                                text: '<?= $d["sectiginizurun/parcaagacaeklendi"] ?>',
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

                                        }else if(e == "adethata"){

                                            new PNotify({
                                                title: '<?= $d["hata"] ?>',
                                                text: '<?= $d["adetsifirolamaz"] ?>',
                                                icon: 'icon-warning22',
                                                addclass: 'bg-warning'
                                            });

                                        }else if(e == "zatenvar"){

                                            new PNotify({
                                                title: '<?= $d["hata"] ?>',
                                                text: '<?= $d["urunzatenvar"] ?>',
                                                icon: 'icon-warning22',
                                                addclass: 'bg-warning'
                                            });

                                        }

                                        document.getElementById("agacbuton").disabled = false;
                                    }

                                });

                            }

                            function urunkontrol() {

                                if(document.getElementById("select2-urunarama-container").title !== "Seçiniz"){

                                    document.getElementById("parcaaramadis").style.display = "none";
                                    document.getElementById("adet").focus();

                                }else{

                                    document.getElementById("parcaaramadis").style.display = "block";

                                }

                            }

                            function parcakontrol() {

                                if(document.getElementById("select2-parcaarama-container").title !== "Seçiniz"){

                                    document.getElementById("urunaramadis").style.display = "none";
                                    document.getElementById("adet").focus();

                                }else{

                                    document.getElementById("urunaramadis").style.display = "block";

                                }

                            }

                        </script>

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