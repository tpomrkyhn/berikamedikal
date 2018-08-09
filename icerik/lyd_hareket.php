
<?

    if(g("id") !== ""){

        $hareket = g("id");

    }else{

        $hareket = false;

    }

    $harekett = row(query("SELECT * FROM hareketler WHERE hareket_id = '$hareket'"));

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
                    <h6 class="panel-title"><?= $d["hareket"] ?></h6>
                </div>

                <div class="panel-body">

                    <div class="row">

                        <form id="hareketbilgileri" class="form-horizontal" enctype="multipart/form-data" method="post" action="" onchange="kontrol()">

                            <div class="col-md-4">

                                <fieldset class="content-group">

                                    <input type="hidden" name="hareketId" id="hareketId" value="<?= $hareket ?>">

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["parca"] ?></label>
                                        <div class="col-lg-10">
                                            <select name="hareketParca" id="hareketParca" class="select-search">
                                                <?

                                                $query  = query("SELECT * FROM parcalar WHERE parca_tip = '".tedarik."'");
                                                while($row = row($query)){

                                                    ?>
                                                    <option value="<?= $row["parca_id"] ?>" <? if ($row["parca_id"] == $harekett["hareket_parca_id"] ) { echo "selected";}?>><?= $row["parca_kodu"]." - ".$row["parca_adi"] ?></option>
                                                <? } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <script>

                                        function kontrol() {

                                            var parcaid = document.getElementById("hareketParca").value;

                                            if(hareketAdet )

                                            var alisbirim,satisbirim,oran,sonuc,ek;

                                            $.ajax({
                                                url:'fonksiyon/parca.php', // serileştirilen değerleri ajax.php dosyasına
                                                type:'POST', // post metodu ile
                                                data:{id:parcaid,tip:'alisbirim'}, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                                success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                                    document.getElementById("birim").innerHTML = e;
                                                    alisbirim = e;
                                                }
                                            });

                                            $.ajax({
                                                url:'fonksiyon/parca.php', // serileştirilen değerleri ajax.php dosyasına
                                                type:'POST', // post metodu ile
                                                data:{id:parcaid,tip:'satisbirim'}, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                                success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                                    satisbirim = e;
                                                }
                                            });

                                            $.ajax({
                                                url:'fonksiyon/parca.php', // serileştirilen değerleri ajax.php dosyasına
                                                type:'POST', // post metodu ile
                                                data:{id:parcaid,tip:'tablo'}, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                                success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                                    document.getElementById("tablo").innerHTML = e;
                                                }
                                            });

                                            ek = document.getElementById("hareketAdet").value;

                                            $.ajax({
                                                url:'fonksiyon/parca.php', // serileştirilen değerleri ajax.php dosyasına
                                                type:'POST', // post metodu ile
                                                data:{id:parcaid,tip:'sonuc',ek:ek}, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                                success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı

                                                    document.getElementById("aciklama").innerHTML = e;

                                                }
                                            });




                                        }

                                    </script>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["tedarikci"] ?></label>
                                        <div class="col-lg-10">
                                            <select name="hareketTedarikci" class="select-search">
                                                <?

                                                $query  = query("SELECT * FROM sirketler WHERE sirket_tip = 'tedarikci' ORDER BY musteri_id DESC");
                                                while($row = row($query)){

                                                    ?>
                                                    <option value="<?= $row["musteri_id"] ?>"><?= $row["musteri_adi"] ?></option>
                                                <? } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" id="tarih"><?= $d["tarih"] ?></label>
                                        <div class="col-lg-10">
                                            <input type="text"  class="form-control" name="hareketTarih" id="hareketTarih" placeholder="<?= $d["tarih2"] ?>" value="<? if(tarih($harekett["tarih"],"on","tarih") !== "//"){ echo tarih($harekett["tarih"],"on","tarih"); }else{ echo date("d/m/Y"); } ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" id="birim"><?= $d["birim"] ?></label>
                                        <div class="col-lg-10">
                                            <input type="number" min="0" class="form-control" name="hareketAdet" id="hareketAdet" placeholder="<?= $d["miktar"] ?>" value="<?= $harekett["hareket_miktar"] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"></label>
                                        <div class="col-lg-10">
                                            <span id="aciklama"></span>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <? if($hareket == false){ ?><button onclick="hareketekle()" id="eklebuton" type="button" class="btn btn-primary"><?= $d["kaydet"] ?> <i class="icon-arrow-right14 position-right"></i></button><? } ?>
                                        <button style="display: <? if($hareket !== false){ echo "inline-block"; }else{ echo "none"; } ?>" onclick="hareketguncelle()" type="button" id="guncellebuton" class="btn"><?= $d["guncelle"] ?> <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>

                                </fieldset>

                            </div>
                              <script>

                        function hareketekle() {

                            var id = "<? if($hareket !== false){ echo $hareket; }else{ echo 0; } ?>";

                            document.getElementById("eklebuton").disabled = true;

                            var hareketbilgileri = $("#hareketbilgileri").serialize();


                            $.ajax({
                                url:'fonksiyon/hareketekle.php', // serileştirilen değerleri ajax.php dosyasına
                                type:'POST', // post metodu ile
                                data:hareketbilgileri, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                  
                                    if(e !== "hata" && e !== "eksik"){

                                        id = e;

                                        document.getElementById("hareketid").value = e;
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

                                    }
                                }
                            });

                        }

                        function hareketguncelle() {

                            document.getElementById("guncellebuton").disabled = true;

                            var hareketbilgileri = $("#hareketbilgileri").serialize();

                            $.ajax({
                                url:'fonksiyon/hareketguncelle.php', // serileştirilen değerleri ajax.php dosyasına
                                type:'POST', // post metodu ile
                                data:hareketbilgileri, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldıa
                                      
                                    if(e !== "hata" && e !== "eksik"){

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


                                    }

                                    document.getElementById("guncellebuton").disabled = false;

                                }
                            });

                        }

                    </script>

                            <div class="col-md-6">

                                <fieldset class="content-group">

                                    <div id="tablo"></div>

                                </fieldset>

                            </div>

                        </form>

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