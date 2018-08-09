    <!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <div class="sidebar sidebar-main sidebar-default sidebar-separate">
            <div class="sidebar-content">

                <!-- Actions -->
                <div class="sidebar-category">
                    <div class="category-title">
                        <span><?= $d["arama"] ?></span>
                        <ul class="icons-list">
                            <li><a href="#" data-action="collapse"></a></li>
                        </ul>
                    </div>

                    <div class="category-content">
                        <input onkeyup="ara()" class="form-control" type="text" id="sipariskodumusteri" name="sipariskodumusteri" placeholder="<?= $d["sipariskodumusteri"] ?>" value="<?= g("ar") ?>">
                    </div>
                </div>
                <!-- /actions -->


                <script>

                    <? if(g("ar") !== ""){ ?> ara(); <? } ?>

                    function ara() {

                        var term = document.getElementById("sipariskodumusteri").value;

                        $.ajax({
                            url:'fonksiyon/siparisara.php', // serileştirilen değerleri ajax.php dosyasına
                            type:'POST', // post metodu ile
                            data:{term:term}, // yukarıda serileştirdiğimiz gonderilenform değişkeni
                            success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı

                                    document.getElementById("sonuclar").innerHTML = e;

                            }
                        });

                    }

                </script>

            </div>
        </div>

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Single line -->
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h6 class="panel-title"><?= $d["aramasonuclari"] ?></h6>
                </div>

                <table class="table" id="sonuclar">



                </table>

            </div>
            <!-- /single line -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->