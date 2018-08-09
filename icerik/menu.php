<?

function menu2($id,$st){

    $html = "";

    $query = query("SELECT * FROM menuler WHERE menu_ust_id = '$id'");
    if (mysql_affected_rows()) {


        if($st == 0){

            $class = "class=\"nav navbar-nav\"";
            $liclass = "class=\"dropdown\"";


        }else{

            $class = "class=\"dropdown-menu width-200\"";
            $liclass = "";
            $liek = "";

        }

        $html .= "<ul $class>";

        while ($row = row($query)) {

            if($row["menu_uye_grup"] == "tum" OR strpos($row["menu_uye_grup"],session("uye_tip"))) {


                $liek = "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
						<i class=\"icon-" . $row["menu_icon"] . " position-left\"></i> " . $row["menu_adi"] . "<span class=\"caret\"></span>
					</a>";

                $asd = query("SELECT * FROM menuler WHERE menu_ust_id = '" . $row["menu_id"] . "'");
                if (!mysql_affected_rows()) {

                    if (g("do") == $row["menu_url"]) {
                        $aktif = "active";
                    } else {
                        $aktif = "";
                    }

                    $html .= "<li class='$aktif'>" . "<a href=\"index.php?do=" . $row["menu_url"] . "\"><i class=\"icon-" . $row["menu_icon"] . " position-left\"></i> " . $row["menu_adi"] . " </a>" . "</li>";

                } else {

                    $st++;

                    $html .= "<li $liclass>" . $liek;
                    $html .= menu2($row["menu_id"], $st);
                    $html .= "</li> ";

                }

            }

        }

        $html .= "</ul> ";

    }

    return $html;
}

?>

<!-- Second navbar -->
<div class="navbar navbar-default" id="navbar-second">
  <ul class="nav navbar-nav no-border visible-xs-block">
    <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
  </ul>

  <div class="navbar-collapse collapse" id="navbar-second-toggle">
    <?= menu2(0,0) ?>
    <ul class="nav navbar-nav navbar-right">
      <li class="<? if($ssayfa == "ayarlar"){ echo "active"; } ?>"><a target="_blank" href="index.php?do=ayarlar"><i class="icon-gear position-left"></i> <?php echo $d["ayarlar"]; ?></a></li>
    </ul>
  </div>
</div>
<!-- /second navbar -->

<!-- Second navbar -->

<!-- /second navbar -->


