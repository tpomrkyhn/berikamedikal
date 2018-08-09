<?

function urunadkod($id){
    $id = 1;

    $urun = row(query("SELECT * FROM urunler WHERE urun_id = '$id'"));
    $grupkod = row(query("SELECT grup_kod FROM urungruplari WHERE grup_id = '".$urun["urun_grup_id"]."'"))["grup_kod"];
    $kod = $grupkod.$urun["urun_kodu"];

    return $kod;

}

function agac($id){

    $html = "";


    $query = query("SELECT * FROM urunagaclari WHERE agac_ust_id = '$id'");
    if (mysql_affected_rows()) {

        $html .= "<ul>\n";

        while ($row = row($query)) {

            $asd = query("SELECT * FROM urunagaclari WHERE agac_ust_id = '".$row["agac_id"]."'");
            if(!mysql_affected_rows()){

                $html .= "<li>\n".urunadkod($row["agac"])."\n</li>";

            }else{

                $html .= "<li class='folder'>\n".urunadkod($row["agac"])."\n";
                $html .= agac($row["agac_id"]);
                $html .= "</li> \n";

            }

        }

        $html .= "</ul> \n";

    }

    return $html;

}



?>

<div class="tree-default well border-left-info border-left-lg">
    <?= agac(row(query("SELECT * FROM urunagaclari WHERE agac = '1'"))["agac_id"]) ?>
</div>