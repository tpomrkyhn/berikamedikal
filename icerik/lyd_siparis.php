
<?


    if(g("id") !== ""){

        $siparis = g("id");

    }else{

        $siparis = false;

    }

    $sipariss = row(query("SELECT * FROM siparisler WHERE siparis_id = '$siparis'"));

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
                    <h6 class="panel-title"><?= $d["siparis"] ?></h6>
                </div>

                <div class="panel-body">

                    <div class="row">

                        <form id="siparisbilgileri" class="form-horizontal" enctype="multipart/form-data" method="post" action="">

                            <div class="col-md-4">

                                <fieldset class="content-group">
                                    <legend class="text-bold"><?= $d["siparisbilgileri"] ?></legend>

                                    <input type="hidden" name="siparisid" id="siparisid" value="<?= $siparis ?>">

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["musteri"] ?></label>
                                        <div class="col-lg-10">
                                            <select class="select-search" name="siparisMusteri" id="siparisMusteri">
                                                <?

                                                $query  = query("SELECT * FROM sirketler WHERE sirket_tip = 'musteri' ORDER BY musteri_id DESC");
                                                while($row = row($query)){

                                                ?>
                                                <option <? if($sipariss["siparis_musteri_id"] == $row["musteri_id"]){ echo "selected"; } ?> value="<?= $row["musteri_id"] ?>"><?= $row["musteri_kodu"]."-".$row["musteri_adi"] ?></option>
                                                <? } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["sipariskodu"] ?></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="siparisKodu" placeholder="<?= $d["sipariskodu"] ?>" value="<?= $sipariss["siparis_kodu"] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["tarih"] ?></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="siparisTarih" placeholder="<?= $d["tarih"] ?>" value="<? if(tarih($sipariss["siparis_tarih"],"on","tarih") !== "//"){ echo tarih($sipariss["siparis_tarih"],"on","tarih"); }else{ echo date("d/m/Y"); } ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["not"] ?></label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control" name="siparisNot" rows="2"><?= $sipariss["siparis_not"] ?></textarea>
                                        </div>
                                    </div>
                                   <div class="form-group">
                                        <label class="control-label col-lg-3" style="display:<?if ($siparis){}else{echo "none";}?>;"><?= $d["siparisdurum"] ?></label>
                                         <label class="control-label col-lg-3 text-bold text-orange" style="display:<?if ($siparis){}else{echo "none";}?>;"><?echo $d[$sipariss["siparis_durum"]] ?></label>
                                    </div>

                                    <div class="text-right">
                                        <? if($siparis == false){ ?><button onclick="siparisekle()" id="eklebuton" type="button" class="btn btn-primary"><?= $d["kaydet"] ?> <i class="icon-arrow-right14 position-right"></i></button><? } ?>
                                        <button style="display: <? if($siparis !== false){ echo "inline-block"; }else{ echo "none"; } ?>" onclick="siparisguncelle()" type="button" id="guncellebuton" class="btn"><?= $d["guncelle"] ?> <i class="icon-arrow-right14 position-right"></i></button>
                                         <button style="display: <? if($siparis !== false && $sipariss["siparis_durum"] == "beklemede"){ echo "inline-block"; }else{ echo "none"; } ?>" onclick="siparisonayla()" type="button" id="onaylabuton" class="btn"><?= $d["onayla"] ?> <i class="icon-arrow-right14 position-right"></i></button>
                                         <button style="display: <? if($siparis !== false && $sipariss["siparis_durum"] == "onaylandi"){ echo "inline-block"; }else{ echo "none"; } ?>" onclick="siparisuret()" type="button" id="uretbuton" class="btn"><?= $d["uretildi"] ?> <i class="icon-arrow-right14 position-right"></i></button>

                                    </div>

                                </fieldset>

                            </div>

                        </form>

                        <div class="col-md-4" id="urunler" style="display: <? if($siparis !== false){ echo "block"; }else{ echo "none"; } ?>">

                            <fieldset class="content-group">

                                <legend class="text-bold"><?= $d["urunler"] ?></legend>

                                <div id="urunleric">

                                </div>

                            </fieldset>

                        </div>

                        <form id="urunbilgileri" class="form-horizontal" enctype="multipart/form-data" method="post" action="">

                            <div class="col-md-4" id="urunform" style="display: <? if($siparis !== false){ echo "block"; }else{ echo "none"; } ?>">

                                <fieldset class="content-group">
                                    <legend class="text-bold"><?= $d["urunbilgileri"] ?></legend>

                                    <input type="hidden" name="siparisid2" id="siparisid2" value="<?= $siparis ?>">

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["urun"] ?></label>
                                        <div class="col-lg-10">
                                            <select class="select-search" name="satirUrun" id="satirUrun">
                                                <?

                                                $query  = query("SELECT * FROM urunler ORDER BY urun_id DESC");
                                                while($row = row($query)){

                                                    ?>
                                                    <option value="<?= $row["urun_id"] ?>"><?= $row["urun_kodu"]."-".$row["urun_adi"] ?></option>
                                                <? } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["adet"] ?></label>
                                        <div class="col-lg-10">
                                            <input type="number" min="0" class="form-control" name="satirAdet" placeholder="<?= $d["adet"] ?>">
                                        </div>
                                    </div>
                                        

                                    <div class="text-right">
                                        <button onclick="satirekle()" id="satirbuton" type="button" class="btn btn-primary"><?= $d["ekle"] ?> <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>

                                </fieldset>

                            </div>

                        </form>

                    </div>

                    <script>

                        var id = "<? if($siparis !== false){ echo $siparis; }else{ echo 0; } ?>";

                        <? if($siparis !== false){ ?> urunlerguncelle("hayir"); <? } ?>

                        function siparisekle() {

                            document.getElementById("eklebuton").disabled = true;

                            var siparisbilgileri = $("#siparisbilgileri").serialize();

                            $.ajax({
                                url:'fonksiyon/siparisekle.php', // serileştirilen değerleri ajax.php dosyasına
                                type:'POST', // post metodu ile
                                data:siparisbilgileri, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                    if(e !== "hata" && e !== "eksik"){

                                        id = e;
                                        document.getElementById("siparisid").value = e;
                                        document.getElementById("eklebuton").style.display = "none";
                                        document.getElementById("guncellebuton").style.display = "inline-block";

                                        document.getElementById("urunler").style.display = "block";
                                        document.getElementById("urunform").style.display = "block";


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

                                    }
                                }
                            });

                        }

                        function siparisguncelle() {

                            document.getElementById("guncellebuton").disabled = true;

                            var siparisbilgileri = $("#siparisbilgileri").serialize();

                            $.ajax({
                                url:'fonksiyon/siparisguncelle.php', // serileştirilen değerleri ajax.php dosyasına
                                type:'POST', // post metodu ile
                                data:siparisbilgileri, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                    if(e !== "hata" && e !== "eksik"){

                                        new PNotify({
                                            title: '<?= $d["guncellendi"] ?>',
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
                        function siparisonayla() {

                            document.getElementById("onaylabuton").disabled = true;

                            var siparisbilgileri = $("#siparisbilgileri").serialize();

                            $.ajax({
                                url:'fonksiyon/siparisonay.php', // serileştirilen değerleri ajax.php dosyasına
                                type:'POST', // post metodu ile
                                data:siparisbilgileri, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                    if(e !== "hata" && e !== "eksik"){

                                        new PNotify({
                                            title: '<?= $d["onaylandi"] ?>',
                                            text: '<?= $d["urunbasariylaonaylandi"] ?>',
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
                         function siparisuret() {

                            document.getElementById("onaylabuton").disabled = true;

                            var siparisbilgileri = $("#siparisbilgileri").serialize();

                            $.ajax({
                                url:'fonksiyon/siparisuret.php', // serileştirilen değerleri ajax.php dosyasına
                                type:'POST', // post metodu ile
                                data:siparisbilgileri, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                    if(e !== "hata" && e !== "eksik"){

                                        new PNotify({
                                            title: '<?= $d["uretildi"] ?>',
                                            text: '<?= $d["siparisuretildi"] ?>',
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

                        function urunlerguncelle(bildirim = "evet") {

                            $.ajax({
                                url:'icerik/bolge/satir.php', // serileştirilen değerleri ajax.php dosyasına
                                type:'POST', // post metodu ile
                                data:{id:<?php echo $siparis ?>}, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı

                                    document.getElementById("urunleric").innerHTML = e;

                                    if(bildirim == "evet"){

                                        new PNotify({
                                            title: '<?= $d["guncelleme"] ?>',
                                            text: '<?= $d["urunagaciguncellendi"] ?>',
                                            icon: 'icon-database-refresh',
                                            addclass: 'bg-orange'
                                        });

                                    }
                                }
                            });

                        }

                        function satirekle() {

                            document.getElementById("satirbuton").disabled = true;

                            var urunbilgileri = $("#urunbilgileri").serialize();

                            $.ajax({
                                url:'fonksiyon/satirekle.php', // serileştirilen değerleri ajax.php dosyasına
                                type:'POST', // post metodu ile
                                data:urunbilgileri, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                    if(e !== "hata" && e !== "eksik"){

                                        new PNotify({
                                            title: '<?= $d["eklendi"] ?>',
                                            text: '<?= $d["urunbasariylaeklendi"] ?>',
                                            icon: 'icon-floppy-disk',
                                            addclass: 'bg-success'
                                        });

                                        urunlerguncelle("hayir");

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

                                    document.getElementById("satirbuton").disabled = false;
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