<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <?

            $_SESSION["dil"] = "tr";
            include_once "diller/tr.php";

            $key = md5($hostname = $_SERVER['HTTP_USER_AGENT'] . $_SERVER[REMOTE_ADDR]);


            $query = query("SELECT * FROM oturumlar WHERE oturum_tip = 'unutma' AND oturum_key = '$key'");
            if(mysql_affected_rows()){

                $row = row($query);

                $unutma = "evet";

                $uye = row(query("SELECT * FROM uyeler WHERE uye_id = '".$row["oturum_uye_id"]."'"));

            }

            ?>

            <center>
                <img src="http://www.berikamedikal.com.tr/images/Berika.png" alt="" style="

    margin: 20px;
    margin-right: 50px;
    width: 100px;

">

</center>

            <center>
                <?php

                $gg = "gizle";

                if (isset($_POST["giris"])) {

                    $kadi = p("kadi");
                    $sifre = md5(p("sifre"));
                    $varmi = query("SELECT * FROM uyeler WHERE uye_kadi = '$kadi' AND uye_sifre = '$sifre'");
                    $row = row($varmi);
                    if (mysql_affected_rows()) {

                        $key = md5($hostname = $_SERVER['HTTP_USER_AGENT'] . $_SERVER[REMOTE_ADDR]);

                        $query = query("SELECT * FROM oturumlar WHERE oturum_uye_id = '" . $row["uye_id"] . "' AND oturum_key <> '$key' AND oturum_tip = 'oturum'");
                        if (mysql_affected_rows()) {

                            $query = query("DELETE FROM oturumlar WHERE oturum_uye_id = '" . $row["uye_id"] . "' AND oturum_tip = 'oturum'");

                        }

                        $query = query("SELECT * FROM oturumlar WHERE oturum_uye_id = '" . $row["uye_id"] . "' AND oturum_key = '$key' AND oturum_tip = 'oturum'");
                        if (mysql_affected_rows()) {

                            $query = query("UPDATE oturumlar SET oturum_key = '$key' WHERE oturum_key = '$key' AND oturum_tip = 'oturum'");

                        } else {

                            $query = query("INSERT INTO oturumlar SET oturum_tip = 'oturum', oturum_key = '$key', oturum_uye_id = '" . $row["uye_id"] . "'");

                        }

                        $session = array(
                            "login" => true,
                            "uye_id" => $row["uye_id"],
                            "uye_sfr" => $row["uye_sifre"],
                            "uye_adi" => $row["uye_adi"],
                            "uye_soyadi" => $row["uye_soyadi"],
                            "uye_resim" => $row["uye_resim"],
                            "uye_kadi" => $row["uye_kadi"],
                            "uye_tip" => $row["tip"]
                        );
                        session_olustur($session);

                        $kyvrmi = query("SELECT * FROM oturumlar WHERE oturum_tip = 'unutma' AND oturum_key = '$key'");
                        if(mysql_affected_rows()){

                            $update = query("UPDATE oturumlar SET oturum_uye_id = '" . $row["uye_id"] . "' WHERE oturum_tip = 'unutma' AND oturum_key = '$key'");

                        }else{

                            $insert = query("INSERT INTO oturumlar SET oturum_uye_id = '" . $row["uye_id"] . "', oturum_tip = 'unutma', oturum_key = '$key'");

                        }

                        if (g("go") !== "") {

                            go("index.php?do=".g(("go")));

                        }else if (g("do") !== "") {

                            go(THIS);

                        } else {

                            go("index.php");

                        }
                    } else {
                        $gg = '';
                    }

                }

                if (isset($_POST["giris2"])) {

                    $sifre = md5(p("sifre"));
                    $varmi = query("SELECT * FROM uyeler WHERE uye_kadi = '".$uye["uye_kadi"]."' AND uye_sifre = '$sifre'");
                    $row = row($varmi);
                    if (mysql_affected_rows()) {

                        $query = query("SELECT * FROM oturumlar WHERE oturum_uye_id = '" . $row["uye_id"] . "' AND oturum_key <> '$key' AND oturum_tip = 'oturum'");
                        if (mysql_affected_rows()) {

                            $query = query("DELETE FROM oturumlar WHERE oturum_uye_id = '" . $row["uye_id"] . "' AND oturum_tip = 'oturum'");

                        }

                        $query = query("SELECT * FROM oturumlar WHERE oturum_uye_id = '" . $row["uye_id"] . "' AND oturum_key = '$key' AND oturum_tip = 'oturum'");
                        if (mysql_affected_rows()) {

                            $query = query("UPDATE oturumlar SET oturum_key = '$key' WHERE oturum_key = '$key' AND oturum_tip = 'oturum'");

                        } else {

                            $query = query("INSERT INTO oturumlar SET oturum_tip = 'oturum', oturum_key = '$key', oturum_uye_id = '" . $row["uye_id"] . "'");

                        }

                        $session = array(
                            "login" => true,
                            "uye_id" => $row["uye_id"],
                            "uye_adi" => $row["uye_adi"],
                            "uye_soyadi" => $row["uye_soyadi"],
                            "uye_resim" => $row["uye_resim"],
                            "uye_kadi" => $row["uye_kadi"],
                            "uye_tip" => $row["tip"]
                        );
                        session_olustur($session);

                        if (g("go") !== "") {

                            go("index.php?do=".g(("go")));

                        }else if (g("do") !== "") {

                            go(THIS);

                        } else {

                            go("index.php");

                        }
                    } else {
                        $gg = '';
                    }

                }

                ?>
            </center>

            <style media="screen">

                .gizle {

                    display: none;

                }

            </style>

            <!-- Simple login form -->
            <form method="post" autocomplete="off">

                <div class="panel panel-body login-form">
                    <? if (g("hata") == "baskacihazdaoturumacildi") { ?>
                        <div class="alert bg-danger"><?= $d["baskacihazdaoturumacildi"] ?></div><? } ?>
                    <div class="alert bg-danger <?= $gg ?>"><?= $d["girishata"] ?></div>

                    <?

                        if($unutma !== "evet"){

                    ?>

                    <div class="form-group has-feedback has-feedback-left">
                        <input name="kadi" type="text" class="form-control" placeholder="<?php echo $d["kadi"]; ?>">
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                    </div>

                    <? }else{ ?>

                            <div class="form-group has-feedback has-feedback-left">
                                <input readonly type="text" class="form-control" value="<?= $uye["uye_kadi"] ?>">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                    <? } ?>

                    <div class="form-group has-feedback has-feedback-left">
                        <input name="sifre" type="password" class="form-control"
                               placeholder="<?php echo $d["sifre"]; ?>">
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>
                    </div>

                    <?

                    if($unutma !== "evet"){

                    ?>

                    <div class="form-group">
                        <button name="giris" type="submit"
                                class="btn btn-primary btn-block"><?php echo $d["girisyap"]; ?> <i
                                    class="icon-circle-right2 position-right"></i></button>
                    </div>

                    <? }else{ ?>

                    <div class="form-group">
                        <button name="giris2" type="submit"
                                class="btn btn-primary btn-block"><?php echo $d["girisyap"]; ?> <i
                                    class="icon-circle-right2 position-right"></i></button>
                    </div>

                        <span style="cursor: pointer" onclick="window.location.href = 'oturumsil.php';" class="text-muted"><?= $d["farklihesaplaoturumac"] ?></span>

                    <? } ?>




            </form>
            <!-- /simple login form -->



        </div>
        <!-- /main content -->

        <center>

            <span class="text-muted"><span class="text-bold">lydSoft</span> - 2018 - <?= $d["copyright"] ?></span>

        </center>

    </div>
    <!-- /page content -->

</div>
