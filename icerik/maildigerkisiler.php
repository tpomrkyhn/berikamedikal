<?

    $query = query("SELECT * FROM mailler WHERE mail_id = '$mid' AND mail_toplu <> 'hayir'");
    if(mysql_affected_rows()){

        $mail = row($query);

        echo $mail["mail_toplu"];

        $diger = query("SELECT * FROM mailler WHERE mail_toplu = '".$mail["mail_toplu"]."' LIMIT 5");
        $diger2 = query("SELECT * FROM mailler WHERE mail_toplu = '".$mail["mail_toplu"]."'");
        while($uye = row($diger)){

            $uyeler = query("SELECT * FROM uyeler WHERE uye_id = '".$uye["mail_alan"]."'");
            $uyeler = row($uyeler);

            ?>

            <li><img src="<?= $uyeler["uye_resim"] ?>" class="img-circle img-xs" alt=""></li>

            <?

        }
        $adet = mysql_num_rows($diger2);

        if($adet > 5) {

            ?>

            <li><span class="btn bg-teal-400 btn-xs">+<?= $adet ?></span></li>

            <?

        }

    }

?>
