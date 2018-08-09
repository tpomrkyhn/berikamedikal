<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main sidebar-default sidebar-separate">
            <? include_once "mailsol.php"; ?>
        </div>
        <!-- /main sidebar -->

        <style>

            td{

                text-align: center;
                width: 50px;
                height: 50px;

            }

            .tatil{

                color: #c1c1c1;
                font-style: italic;

            }

            .anaic{

                background: repeating-linear-gradient(
                        135deg,
                        #f5f5f5,
                        #f5f5f5 5px,
                        #dedede 5px,
                        #dedede 10px
                );

                width: 100%;
                height: 46px;
                border-radius: 5px;

            }

            .eylem{

                position: absolute;

            }

            .sagalt{

                float: right;
                vertical-align: bottom;
                padding: 5px 10px;
                color: #8a8a8a;
                font-style: italic;
                font-size: 10px;

            }


        </style>

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Single line -->
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h6 class="panel-title"><?= $d["takvim"] ?></h6>
                </div>

                <div class="table-responsive">
                    <table class="tablo">
                        <tbody data-link="row" class="rowlink">

                        <?

                            $aylar = array("","ocak","subat","mart","nisan","mayis","haziran","temmuz","agustos","eylul","ekim","kasim","aralik");
                            $gunler = array("","pazartesi","sali","carsamba","persembe","cuma","cumartesi","pazar");

                            $olaylar = array();


                            $a = 1;
                            while($a <= 12){

                                ?>

                                <tr>
                                    <?



                                    $i = 1;
                                    $ci = 0;
                                    while($i <= 31){

                                        $td = "";
                                        $tdIc = "";

                                        ## GERÇEK AY BİLGİSİ ##
                                        $ay = date("n",mktime(0,0,0,$a,$i,2018));       /* AY MAX GÜN KONTROLÜ */  if($a != $ay){ $gunVar = "hayir"; }else{ $gunVar = "evet"; }
                                        $ay = $aylar[$ay];


                                        ## GERÇEK GÜN BİLGİSİ ##
                                        $gun = date("N",mktime(0,0,0,$a,$i,2018));
                                        $gun = $gunler[$gun];


                                        ## GERÇEK TARİH BİLGİSİ ##
                                        $tarih = date("Y-m-d",mktime(0,0,0,$a,$i,2018));


                                        ## HAFTASONU KONTROLÜ ##
                                        if($gun == "cumartesi" || $gun == "pazar"){

                                            $tatil = "evet";
                                            $tatilSebep = "haftasonu";

                                        }else{

                                            $tatil = "hayir";
                                            $tatilSebep = "";

                                        }


                                        ## ÇAKIŞMA KONTROLÜ ##
                                        if($olayKalanGun == 0) {

                                            ## İŞ VE OLAY KONTROLLERİ ##        /* 777 Normal İş Öncelik Numarası */
                                            $varmi = query("SELECT * FROM olaylar WHERE olay_oncelik = '777' AND olay_tarih = '$tarih'");
                                            if (mysql_affected_rows()) {

                                                $olay = row($varmi);
                                                $olayBaslangic = $tarih;
                                                $olayToplamGun = $olay["olay_gun"];
                                                if (($olayToplamGun - 1) > 1) {
                                                    $day = "days";
                                                } else {
                                                    $day = "day";
                                                }
                                                $olayBitis = date("Y-m-d", strtotime("+" . ($olayToplamGun - 1) . " $day", strtotime($olayBaslangic)));
                                                $olayAdi = $olay["olay_adi"];


                                                ## TATİL KONTROLÜ ##
                                                tatil:
                                                $tatilAdet = kactatilvar($olayBaslangic, $olayBitis);
                                                $olayEkGun = $tatilAdet - $olayEkGunEski;
                                                $olayEkGunEski += $olayEkGun;
                                                $olayToplamGun += $olayEkGun;
                                                $olayBitisEski = $olayBitis;
                                                $olayBitis = date("Y-m-d", strtotime("+" . ($olayToplamGun - 1) . " $day", strtotime($olayBaslangic)));
                                                if (kactatilvar($olayBitisEski, $olayBitis) > 0) {
                                                    goto tatil;
                                                }


                                                ## TANIMLAMALAR ##
                                                $sutunYuzde = 100 / $olayToplamGun;
                                                $olaySuanGun = 1;
                                                $olayKalanGun = $olayToplamGun - 1;

                                            }



                                        }

                                        if($olayKalanGun == 0) {

                                            $td = $i;

                                        }else{

                                            if($olaySuanGun == 1){

                                                $eylemler = query("SELECT * FROM eylemler WHERE eylem_olay_id = '".$olay["olay_id"]."'");
                                                while ($eylem1 = row($eylemler)){

                                                    $sol = ($eylem1["eylem_baslangic"] - 1) * 50;
                                                    $genislik = (($eylem1["eylem_toplam"] * 50) * $eylem1["eylem_yuzde"]) / 100;

                                                    $eylem = '<div class="eylem" style="height: 46px; margin-left: '.$sol.'px; width: '.$genislik.'px; background-color: #0b76cc">asdasd</div>';

                                                }

                                                $tdIc = 'colspan="'.$olayToplamGun.'"';
                                                $td = '<div class="anaic">

                                                            <div class="sagalt">'.$d["sureler1"].'</div>    
                                                            '.$eylem.'                                    
                                                            
                                                        </div>';

                                            }else{

                                                $td = "null";

                                            }

                                            if($olayKalanGun == 1){

                                                echo "</td>";

                                            }

                                            $olaySuanGun++;
                                            $olayKalanGun--;

                                        }

                                        if($td !== "null"){ echo "<td $tdIc >$td"; }


                                        /*

                                        if($tatil == "evet"){

                                            $yaziKisa = $d["TATIL-K-".$tatilSebep];
                                            $yaziBaslik = $d["tatil"];
                                            $yaziIcerik = $d["TATIL-".$tatilSebep];

                                        }else{



                                        }


                                        if(array_key_exists($i,$olaylar[1])){

                                            $ek = $olaylar[1][$i];
                                            $adi = $ek["adi"];

                                        }else{

                                            $ek = array();
                                            $adi = "";

                                        }

                                        if($ek["sure"] > 1){

                                            $colspan = $ek["sure"];
                                            $ci = $ek["sure"] - 1;
                                            goto ciic;

                                        }else{

                                            $colspan = 1;

                                        }

                                        if($ci > 0){

                                            $ci = $ci - 1;

                                        }else{

                                            ciic:



                                            if($gun == "pazar"){ echo "<td class='tatil'>T</td>"; goto atla; }

                                            if(tatilmi(date("Y-m-d",mktime(0,0,0,$a,$i,2018)))){ echo "<td class='tatil'>".tatilsebep(date("Y-m-d",mktime(0,0,0,$a,$i,2018)))."</td>"; goto atla; }

                                            echo '<td colspan="'.$colspan.'" ><span data-placement="left" data-trigger="hover" data-popup="popover" data-html="true" data-original-title="'.date("j",mktime(0,0,0,$a,$i,2018))." ".$d[$ay].' 2018 - '.$d[$gun].'" data-content="sadas" >';

                                            if($ci > 0){

                                                echo '<div style="background-color: #00a8c6; width: 100%; color: #fff; border-radius: 8px">'.'<div style="display: inline-block; width: 50%; background-color: #0a001f">asdas</div>asda'.'</div>';

                                            }else{

                                                echo $i.$adi;

                                            }


                                            echo '</span></td>';

                                            atla:

                                        }*/

                                        $i++;

                                    }

                                    ?>
                                </tr>

                                <?

                                $a++;

                            }

                        ?>


                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /single line -->


        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>

<!-- /page container -->