<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.php"><b><?= ayar("sirket_adi") ?></b> - <?php echo $d["ustbarbaslik"]; ?></a>
        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">

        <p class="navbar-text"><span
                    class="label bg-success-400"><i class="icon-cloud"></i>&nbsp;<?= $havadurumu["aciklama"] . " " . $havadurumu["sicaklik"] . "°C" ?></span>
        </p>
        <ul class="nav navbar-nav navbar-right">

            <?php require_once "icerik/dilsec.php"; ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="stokbildirimoku()">
                    <i class="icon-bell3"></i>
                    <span class="visible-xs-inline-block position-right"><?= $d["stokbildirimleri"] ?></span>
                    <span id="stokbildirimlerokunmamis" class="badge bg-warning-400"></span>
                </a>

                <script type="text/javascript">

                    var eski;

                    function stokbildirimyenile() {

                        $.ajax({
                            url: '../fonksiyon/bildirim_okunmamis.php', // serileştirilen değerleri ajax.php dosyasına
                            type: 'POST', // post metodu ile
                            data: {}, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                            success: function (e) { // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                if(e == eski){


                                }else {

                                    document.getElementById("stokbildirimler").innerHTML = e;

                                }
                                eski = e;
                            }
                        });

                    }

                    function stokbildirimoku() {

                        $.ajax({
                            url: '../fonksiyon/bildirim_oku.php', // serileştirilen değerleri ajax.php dosyasına
                            type: 'POST', // post metodu ile
                            data: {}, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                            success: function (e) { // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                setTimeout(stokbildirimyenile, 1000);
                                setTimeout(stokbildirimadet, 1000);
                            }
                        });

                    }

                    function stokbildirimadet() {

                        $.ajax({
                            url: '../fonksiyon/bildirim_okunmamis_adet.php', // serileştirilen değerleri ajax.php dosyasına
                            type: 'POST', // post metodu ile
                            data: {}, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                            success: function (e) { // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                                if (e > 0) {

                                    document.getElementById("stokbildirimlerokunmamis").style.display = "block";

                                } else {

                                    document.getElementById("stokbildirimlerokunmamis").style.display = "none";

                                }
                                document.getElementById("stokbildirimlerokunmamis").innerHTML = e;
                            }
                        });

                    }

                    stokbildirimyenile();
                    stokbildirimadet();

                    setInterval('stokbildirimyenile()', 5000);
                    setInterval('stokbildirimadet()', 5000);

                </script>

                <div class="dropdown-menu dropdown-content width-350" id="stokbildirimler">

                </div>
            </li>
            <?php require_once "icerik/ustprofil.php"; ?>

        </ul>
    </div>
</div>
<!-- /main navbar -->
