
<?

    if(g("id") !== ""){

        $musteri = g("id");

    }else{

        $musteri = false;

    }

    $musterii = row(query("SELECT * FROM sirketler WHERE musteri_id = '$musteri' AND sirket_tip = 'tedarikci'"));

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
                    <h6 class="panel-title"><?= $d["tedarikci"] ?></h6>
                </div>

                <div class="panel-body">

                    <div class="row">

                        <form id="musteribilgileri" class="form-horizontal" enctype="multipart/form-data" method="post" action="" onchange="kontrol()">

                            <div class="col-md-4">

                                <fieldset class="content-group">

                                    <legend class="text-bold"><?= $d["tedarikcibilgileri"] ?></legend>

                                    <input type="hidden" name="musteriid" id="musteriid" value="<?= $musteri ?>">

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["tedarikciadi"] ?></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="musteriAdi" placeholder="<?= $d["tedarikciadi"] ?>" value="<?= $musterii["musteri_adi"] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["musteriunvani"] ?></label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control" name="musteriUnvani" rows="2" placeholder="<?= $d["musteriunvani"] ?>"><?= $musterii["musteri_unvani"] ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["tedarikcikodu"] ?></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="musteriKodu" placeholder="<?= $d["tedarikcikodu"] ?>" value="<?= $musterii["musteri_kodu"] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["tedarikcibilgi"] ?></label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control" name="musteriBilgi" rows="2" placeholder="<?= $d["tedarikcibilgi"] ?>"><?= $musterii["musteri_bilgi"] ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["vergi"] ?></label>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" name="musteriVergiDairesi" placeholder="<?= $d["vergidairesi"] ?>" value="<?= $musterii["musteri_vergi_dairesi"] ?>">
                                        </div>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" name="musteriVergiNo" placeholder="<?= $d["vergino"] ?>" value="<?= $musterii["musteri_vergi_no"] ?>">
                                        </div>
                                    </div>

                                </fieldset>

                            </div>


                            <div class="col-md-4">

                                <fieldset class="content-group">

                                    <legend class="text-bold"><?= $d["iletisimbilgileri"] ?></legend>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["adres"] ?></label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" name="musteriUlke" placeholder="<?= $d["ulke"] ?>" value="<?= $musterii["musteri_ulke"] ?>">
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="musteriIl" placeholder="<?= $d["il"] ?>" value="<?= $musterii["musteri_il"] ?>">
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="musteriIlce" placeholder="<?= $d["ilce"] ?>" value="<?= $musterii["musteri_ilce"] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"></label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control" name="musteriAdres" rows="3" placeholder="<?= $d["adres"] ?>"><?= $musterii["musteri_adres"] ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["telefon"] ?></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="musteriTelefon" placeholder="<?= $d["telefon"] ?>" value="<?= $musterii["musteri_telefon"] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["fax"] ?></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="musteriFax" placeholder="<?= $d["fax"] ?>" value="<?= $musterii["musteri_fax"] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["email"] ?></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="musteriMail" placeholder="<?= $d["email"] ?>" value="<?= $musterii["musteri_mail"] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["web"] ?></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="musteriWeb" placeholder="<?= $d["web"] ?>" value="<?= $musterii["musteri_web"] ?>">
                                        </div>
                                    </div>

                                </fieldset>

                            </div>

                            <div class="col-md-4">

                                <fieldset class="content-group">

                                    <legend class="text-bold"><?= $d["ekbilgiler"] ?></legend>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["musteriiban"] ?></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="musteriIban" placeholder="<?= $d["musteriiban"] ?>" value="<?= $musterii["musteri_iban"] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["not"] ?> 1</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="musteriEkNot1" placeholder="<?= $d["not"] ?>" value="<?= $musterii["musteri_ek_not1"] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["not"] ?> 2</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="musteriEkNot2" placeholder="<?= $d["not"] ?>" value="<?= $musterii["musteri_ek_not2"] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"><?= $d["firmayetkilisi"] ?></label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="musteriYetkili" placeholder="<?= $d["firmayetkilisi"] ?>" value="<?= $musterii["musteri_yetkili"] ?>">
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <? if($musteri == false){ ?><button onclick="musteriekle()" id="eklebuton" type="button" class="btn btn-primary"><?= $d["kaydet"] ?> <i class="icon-arrow-right14 position-right"></i></button><? } ?>
                                        <button style="display: <? if($musteri !== false){ echo "inline-block"; }else{ echo "none"; } ?>" onclick="musteriguncelle()" type="button" id="guncellebuton" class="btn"><?= $d["guncelle"] ?> <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>

                                </fieldset>

                            </div>

                        </form>

                    </div>

                    <script>

                        var id = "<? if($musteri !== false){ echo $musteri; }else{ echo 0; } ?>";

                        function musteriekle() {

                            document.getElementById("eklebuton").disabled = true;

                            var musteribilgileri = $("#musteribilgileri").serialize();

                            $.ajax({
                                url:'fonksiyon/tedarikciekle.php', // serileştirilen değerleri ajax.php dosyasına
                                type:'POST', // post metodu ile
                                data:musteribilgileri, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                    if(e !== "hata" && e !== "eksik"){

                                        id = e;
                                        document.getElementById("musteriid").value = e;
                                        document.getElementById("eklebuton").style.display = "none";
                                        document.getElementById("guncellebuton").style.display = "inline-block";

                                        new PNotify({
                                            title: '<?= $d["eklendi"] ?>',
                                            text: '<?= $d["parcabasariylaeklendi"] ?>',
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

                        function musteriguncelle() {

                            document.getElementById("guncellebuton").disabled = true;

                            var musteribilgileri = $("#musteribilgileri").serialize();

                            $.ajax({
                                url:'fonksiyon/tedarikciguncelle.php', // serileştirilen değerleri ajax.php dosyasına
                                type:'POST', // post metodu ile
                                data:musteribilgileri, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                                success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                    if(e !== "hata" && e !== "eksik"){

                                        new PNotify({
                                            title: '<?= $d["guncelle"] ?>',
                                            text: '<?= $d["musteribasariylaguncellendi"] ?>',
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