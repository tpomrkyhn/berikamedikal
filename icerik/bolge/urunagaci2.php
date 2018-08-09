<?

require_once "../../sistem/ayar.php";
require_once "../../sistem/fonksiyon.php";

$aid = "u".p("id");

$query = query("SELECT * FROM urunagaclari WHERE agac_ust_id = '$aid'");

if(mysql_affected_rows()) {

    function urunadkod($id)
    {

        $id = ltrim($id,"u");

        $urun = row(query("SELECT * FROM urunler WHERE urun_id = '$id'"));
        $kod = $urun["urun_kodu"];
        $ad = $urun["urun_adi"];

        return $kod." - <b>".$ad."</b>";

    }

    function parcaadkod($id){

        $id = ltrim($id,"p");

        $urun = row(query("SELECT * FROM parcalar WHERE parca_id = '$id'"));
        $kod = $urun["parca_kodu"];
        $ad = $urun["parca_adi"];

        return $kod." - <b>".$ad."</b>";

    }

    function agac($id)
    {


            $html = "";

            if($id == "u".p("id")){ $acik = "expanded"; }


            $query = query("SELECT * FROM urunagaclari WHERE agac_ust_id = '$id'");
            if (mysql_affected_rows()) {

                $html .= "<ul>\n";

                while ($row = row($query)) {

                    $asd = query("SELECT * FROM urunagaclari WHERE agac_ust_id = '" . $row["agac"] . "'");

                    if($row["agac"][0] == "u"){

                        $adkod = urunadkod($row["agac"]);

                    }else if($row["agac"][0] == "p"){

                        $adkod = parcaadkod($row["agac"]);

                    }

                    if (!mysql_affected_rows()) {

                        $html .= "<li>\n" . $row["agac"].$adkod . " (" .$row["agac_adet"]. " Adet)" . "\n</li>";

                    } else {

                        $html .= "<li class='$acik'>\n" . $row["agac"].$adkod . " (" .$row["agac_adet"]. " Adet)" . "\n";
                        $html .= agac($row["agac"]);
                        $html .= "</li> \n";

                    }

                }

                $html .= "</ul> \n";

            }

            return $html;
        }

}else{

    echo "bos-";

}



?>


<div class="tree-default well border-left-info border-left-lg">
    <?= agac($aid) ?>
</div>