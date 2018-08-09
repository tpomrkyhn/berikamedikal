<?


    if(g("id") !== ""){

        $parca = g("id");

    }else{

        $parca = false;

    }

    $parcaa = row(query("SELECT * FROM parcalar WHERE parca_id = '$parca'"));

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
                    <h6 class="panel-title"><?= $d["parca"] ?></h6>
                </div>

                <div class="panel-body">

                    <div class="row">

                        <script>

                            var alis,satis,katsayi,alisbirim,satisbirim;

                            function kontrol() {

                                document.getElementById("grupKodu").value = document.getElementById("parcaGrup").value;

                            }

                        </script>

                        <form id="parcabilgileri" class="form-horizontal" enctype="multipart/form-data" method="post" action="" onchange="kontrol()">

                            <div class="col-md-4">

                                <fieldset class="content-group">

                                    <input type="hidden" name="parcaid" id="parcaid" value="<?= $parca ?>">

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["grup"] ?></label>
                                        <div class="col-lg-3">
                                            <select class="select" name="parcaTip" id="parcaTip">
                                                <option value="uretim"><?= $d["parca-uretim"] ?></option>
                                                <option value="tedarik"><?= $d["parca-tedarik"] ?></option>
                                                <option value="hammadde"><?= $d["hammadde"] ?></option>
                                            </select>
                                        </div>
                                        <div class="col-lg-7">
                                            <select class="select-search" name="parcaGrup" id="parcaGrup">
                                                <option selected value="">Bir Grup Seçiniz...</option>
                                                <?

                                                $query  = query("SELECT * FROM parcagruplari ORDER BY grup_id DESC");
                                                while($row = row($query)){


                                                    ?>

                                                    
                                                    
                                                    <option <? if($parcaa["parca_grup"] == $row["grup_kod"]){ echo "selected"; } ?> value="<?= $row["grup_kod"] ?>"><?= $row["grup_adi"] ?></option>
                                                <? } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["parcakodu"] ?></label>
                                        <div class="col-lg-3">
                                            <input readonly type="text" class="form-control" name="grupKodu" id="grupKodu" placeholder="<?= $d["otmtk"] ?>" value="<?if($parcaa["parca_grup"] == ""){echo $kod;}else{echo $parcaa["parca_grup"];}?>">
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" name="parcaKodu" placeholder="<?= $d["parcakodu"] ?>" value="<? echo str_replace($parcaa["parca_grup"],"",$parcaa["parca_kodu"]) ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["parcaadi"] ?></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="parcaAdi" placeholder="<?= $d["parcaadi"] ?>" value="<?= $parcaa["parca_adi"] ?>">
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["minstok"] ?></label>
                                        <div class="col-lg-10">
                                            <input type="number" min="0" class="form-control" name="minStok" placeholder="<?= $d["minstok"] ?>" value="<?= $parcaa["parca_min_stok"] ?>">
                                        </div>
                                    </div>

                                </fieldset>

                            </div>
                                <div class="col-md-4">

                                <fieldset class="content-group">

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["alis"] ?></label>
                                        <div class="col-lg-4">
                                            <select class="select" name="alisBirim" id="alisBirim">
                                                <?

                                                $query  = query("SELECT * FROM birimler ORDER BY birim_id DESC");
                                                while($row = row($query)){

                                                    ?>
                                                    <option <? if($parcaa["parca_alisbirim"] == $row["birim"]){ echo "selected"; } ?> value="<?= $row["birim"] ?>"><?= $row["birim"] ?></option>
                                                <? } ?>
                                            </select>
                                        </div>


                                        <label class="control-label col-lg-2"><?= $d["satis"] ?></label>
                                        <div class="col-lg-4">
                                            <select class="select" name="satisBirim" id="satisBirim">s
                                                <?

                                                $query  = query("SELECT * FROM birimler ORDER BY birim_id DESC");
                                                while($row = row($query)){

                                                    ?>
                                                    <option <? if($parcaa["parca_satisbirim"] == $row["birim"]){ echo "selected"; } ?> value="<?= $row["birim"] ?>"><?= $row["birim"] ?></option>
                                                <? } ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["birimkatsayisi"] ?></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="katsayi" id="katsayi" placeholder="<?= $d["birimkatsayisi"] ?>" value="<?= $parcaa["parca_oran"] ?>">
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["aciklama"] ?></label>
                                        <div class="col-lg-10">
                                            <textarea name="parcaAciklama" class="form-control" id="" rows="3"><?= $urunn["urun_aciklama"] ?><?= $parcaa["parca_aciklama"] ?></textarea>
                                        </div>
                                    </div>


                                   

                                </fieldset>

                            </div>



                            <div class="col-md-4">

                                <fieldset class="content-group">

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">KDV Miktarı</label>
                                        <div class="col-lg-4">
                                            <select class="select" name="alisKDV" id="alisKDV">
                                               <option value="8" <?php if ($parcaa["parca_kdv"]== 8){ echo "selected";}?>>%8</option>
                                               <option value="18"  <?php if ($parcaa["parca_kdv"]== 18){ echo "selected";}?>>%18</option>

                                            </select>
                                        </div>
                                         </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Birim Fiyatı</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="birimFiyat" id="birimFiyat" placeholder="Birim Fiyatı" value="<?= $parcaa["parca_oran"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Temin Süresi (Gün)</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="temisSuresi" id="temisSuresi" placeholder="Temin Suresi" value="<?= $parcaa["parca_oran"] ?>">
                                        </div>
                                    </div>

    

                                   


                                    <div class="text-right">
                                        <a href="index.php?do=hareketliste&id=<?=$parca?>" class="col-lg-4 text-bold" style="display:<?if ($parca){}else{echo "none";}?>;"><? echo $d["stokadedi"]." : ".stok($parca) ?></a>
                                        
                                        
                                        
                                        <? if($parca == false){ ?><button onclick="parcaekle()" id="eklebuton" type="button" class="btn btn-primary"><?= $d["kaydet"] ?> <i class="icon-arrow-right14 position-right"></i></button><? } ?>
                                        <button style="display: <? if($parca !== false){ echo "inline-block"; }else{ echo "none"; } ?>" onclick="parcaguncelle()" type="button" id="guncellebuton" class="btn"><?= $d["guncelle"] ?> <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>

                                </fieldset>

                            </div>

                        </form>

                    </div>

                    <script>

                        function parcaekle() {

                            var id = "<? if($parca !== false){ echo $parca; }else{ echo 0; } ?>";

                            document.getElementById("eklebuton").disabled = true;

                            var parcabilgileri = $("#parcabilgileri").serialize();

                            $.ajax({
                                url:'fonksiyon/parcaekle.php', // serileştirilen değerleri ajax.php dosyasına
                                type:'POST', // post metodu ile
                                data:parcabilgileri, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                    if(e !== "hata" && e !== "eksik" && e !== "katsayihatasi" && e !== "kayitlikod" && e !== "kayitliad"){

                                        id = e;
                                        document.getElementById("parcaid").value = e;
                                        document.getElementById("eklebuton").style.display = "none";
                                        document.getElementById("guncellebuton").style.display = "inline-block";

                                        new PNotify({
                                            title: '<?= $d["eklendi"] ?>',
                                            text: '<?= $d["urunbasariylaeklendi"] ?>',
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

                                    }else if(e == "katsayihatasi"){

                                        new PNotify({
                                            title: '<?= $d["hata"] ?>',
                                            text: '<?= $d["katsayihatasi"] ?>',
                                            icon: 'icon-warning22',
                                            addclass: 'bg-warning'
                                        });

                                        document.getElementById("eklebuton").disabled = false;

                                    }else if(e == "kayitlikod"){

                                        new PNotify({
                                            title: '<?= $d["hata"] ?>',
                                            text: '<?= $d["kayitlikod"] ?>',
                                            icon: 'icon-warning22',
                                            addclass: 'bg-warning'
                                        });

                                        document.getElementById("eklebuton").disabled = false;

                                    }else if(e == "kayitliad"){

                                        new PNotify({
                                            title: '<?= $d["hata"] ?>',
                                            text: '<?= $d["kayitliad"] ?>',
                                            icon: 'icon-warning22',
                                            addclass: 'bg-warning'
                                        });

                                        document.getElementById("eklebuton").disabled = false;

                                    }
                                }
                            });

                        }

                        function parcaguncelle() {

                            document.getElementById("guncellebuton").disabled = true;

                            var parcabilgileri = $("#parcabilgileri").serialize();

                            $.ajax({
                                url:'fonksiyon/parcaguncelle.php', // serileştirilen değerleri ajax.php dosyasına
                                type:'POST', // post metodu ile
                                data:parcabilgileri, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldıa
                                    if(e !== "hata" && e !== "eksik" && e !== "katsayihatasi"){

                                        new PNotify({
                                            title: '<?= $d["guncelle"] ?>',
                                            text: '<?= $d["parcaguncellndi"] ?>',
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


                                    }else if(e == "katsayihatasi"){

                                        new PNotify({
                                            title: '<?= $d["hata"] ?>',
                                            text: '<?= $d["katsayihatasi"] ?>',
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