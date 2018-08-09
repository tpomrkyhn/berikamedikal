<?

    $query = query("SELECT * FROM ayarlar LIMIT 1");
    $ayar = row($query);

?>

<div class="page-container">

    <div class="page-content">

        <div class="content-wrapper">

            <?


                if($_POST){

                    $sirket_adi = p("sirket_adi");
                    $sirket_unvani = p("sirket_unvani");
                    $sirket_adres = p("sirket_adres");
                    $sirket_telefon_1 = p("sirket_telefon_1");
                    $sirket_telefon_2 = p("sirket_telefon_2");
                    $sirket_telefon_3 = p("sirket_telefon_3");
                    $sirket_fax_1 = p("sirket_fax_1");
                    $sirket_fax_2 = p("sirket_fax_2");
                    $sirket_fax_3 = p("sirket_fax_3");
                    $sirket_il = p("sirket_il");
                    $sirket_ilce = p("sirket_ilce");
                    $sirket_web = p("sirket_web");
                    $sirket_mail = p("sirket_mail");
                    $sirket_vergidairesi = p("sirket_vergidairesi");
                    $sirket_vergino = p("sirket_vergino");
                    $lisans_kod = p("lisans_kod");
                    $lisans_anahtar = p("lisans_anahtar");
                    $lisans_sirketkod = p("lisans_sirketkod");
                    $lisans_sifre = p("lisans_sifre");
                    $tanimli_dil = p("tanimli_dil");
                    $tanimli_doviz = p("tanimli_doviz");
                    $tanimli_kusurat = p("tanimli_kusurat");
                    $tanimli_cari_kalangun = p("tanimli_cari_kalangun");
                    $tanimli_cari_sutun1 = p("tanimli_cari_sutun1");
                    $tanimli_cari_sutun2 = p("tanimli_cari_sutun2");
                    $tanimli_cari_sutun3 = p("tanimli_cari_sutun3");
                    $tanimli_cari_sutun4 = p("tanimli_cari_sutun4");
                    $tanimli_urun_azadet = p("tanimli_urun_azadet");
                    $tanimli_urun_sutun1 = p("tanimli_urun_sutun1");
                    $tanimli_urun_sutun2 = p("tanimli_urun_sutun2");
                    $tanimli_urun_sutun3 = p("tanimli_urun_sutun3");
                    $tanimli_urun_sutun4 = p("tanimli_urun_sutun4");

                    $update = query("UPDATE ayarlar SET
                    sirket_adi = '$sirket_adi',
                    sirket_unvani = '$sirket_unvani',
                    sirket_adres = '$sirket_adres',
                    sirket_telefon_1 = '$sirket_telefon_1',
                    sirket_telefon_2 = '$sirket_telefon_2',
                    sirket_telefon_3 = '$sirket_telefon_3',
                    sirket_fax_1 = '$sirket_fax_1',
                    sirket_fax_2 = '$sirket_fax_2',
                    sirket_fax_3 = '$sirket_fax_3',
                    sirket_il = '$sirket_il',
                    sirket_ilce = '$sirket_ilce',
                    sirket_web = '$sirket_web',
                    sirket_mail = '$sirket_mail',
                    sirket_vergidairesi = '$sirket_vergidairesi',
                    sirket_vergino = '$sirket_vergino',
                    lisans_kod = '$lisans_kod',
                    lisans_anahtar = '$lisans_anahtar',
                    lisans_sirketkod = '$lisans_sirketkod',
                    lisans_sifre = '$lisans_sifre',
                    tanimli_dil = '$tanimli_dil',
                    tanimli_doviz = '$tanimli_doviz',
                    tanimli_kusurat = '$tanimli_kusurat',
                    tanimli_cari_kalangun = '$tanimli_cari_kalangun',
                    tanimli_cari_sutun1 = '$tanimli_cari_sutun1',
                    tanimli_cari_sutun2 = '$tanimli_cari_sutun2',
                    tanimli_cari_sutun3 = '$tanimli_cari_sutun3',
                    tanimli_cari_sutun4 = '$tanimli_cari_sutun4',
                    tanimli_urun_azadet = '$tanimli_urun_azadet',
                    tanimli_urun_sutun1 = '$tanimli_urun_sutun1',
                    tanimli_urun_sutun2 = '$tanimli_urun_sutun2',
                    tanimli_urun_sutun3 = '$tanimli_urun_sutun3',
                    tanimli_urun_sutun4 = '$tanimli_urun_sutun4'
                    ");

                    $dovizler2 = query("SELECT * FROM dovizler");
                    while ($doviz2 = row($dovizler2)) {

                        $ddoviz = $doviz2["doviz_kod"];

                        $kur = ondaliksil(p($ddoviz));

                        $update = query("UPDATE dovizler SET doviz_kur = '$kur' WHERE doviz_kod = '$ddoviz'");

                    }

                    if($update){

                        go(THIS);

                    }

                }


            ?>

            <div class="panel">

                <div class="panel-body">

                    <form id="urunekle" class="form-horizontal" enctype="multipart/form-data" method="post" action="">

                        <fieldset class="content-group">

                            <legend class="text-bold"><?= $d["sirketbilgileri"] ?></legend>

                            <div class="form-group">
                                <label class="control-label col-lg-2"><?= $d["sirketadi"] ?></label>
                                <div class="col-lg-10">
                                    <input type="text" name="sirket_adi" class="form-control" value="<?= $ayar["sirket_adi"] ?>" placeholder="<?= $d["sirketadi"] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2"><?= $d["sirketunvani"] ?></label>
                                <div class="col-lg-10">
                                    <input type="text" name="sirket_unvani" class="form-control" value="<?= $ayar["sirket_unvani"] ?>" placeholder="<?= $d["sirketunvani"] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2"><?= $d["adres"] ?></label>
                                <div class="col-lg-10">
                                    <textarea name="sirket_adres" cols="30" rows="3" class="form-control" placeholder="<?= $d["adres"] ?>"><?= $ayar["sirket_adres"] ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2"><?= $d["telefon"] ?></label>
                                <div class="col-lg-4">
                                    <input type="text" name="sirket_telefon_1" class="form-control" value="<?= $ayar["sirket_telefon_1"] ?>" placeholder="<?= $d["telefon"] ?> 1">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" name="sirket_telefon_2" class="form-control" value="<?= $ayar["sirket_telefon_2"] ?>" placeholder="<?= $d["telefon"] ?> 2">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" name="sirket_telefon_3" class="form-control" value="<?= $ayar["sirket_telefon_3"] ?>" placeholder="<?= $d["telefon"] ?> 3">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2"><?= $d["fax"] ?></label>
                                <div class="col-lg-4">
                                    <input type="text" name="sirket_fax_1" class="form-control" value="<?= $ayar["sirket_fax_1"] ?>" placeholder="<?= $d["fax"] ?> 1">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" name="sirket_fax_2" class="form-control" value="<?= $ayar["sirket_fax_2"] ?>" placeholder="<?= $d["fax"] ?> 2">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" name="sirket_fax_3" class="form-control" value="<?= $ayar["sirket_fax_3"] ?>" placeholder="<?= $d["fax"] ?> 3">
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2"><?= $d["ilveilce"] ?></label>
                                <div class="col-lg-5">
                                    <input type="text" name="sirket_il" class="form-control" value="<?= $ayar["sirket_il"] ?>" placeholder="<?= $d["il"] ?>">
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" name="sirket_ilce" class="form-control" value="<?= $ayar["sirket_ilce"] ?>" placeholder="<?= $d["ilce"] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2"><?= $d["web"] ?></label>
                                <div class="col-lg-5">
                                    <input type="text" name="sirket_web" class="form-control" value="<?= $ayar["sirket_web"] ?>" placeholder="<?= $d["webadresi"] ?>">
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" name="sirket_mail" class="form-control" value="<?= $ayar["sirket_mail"] ?>" placeholder="<?= $d["mailadresi"] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2"><?= $d["vergidairesi"] ?></label>
                                <div class="col-lg-5">
                                    <input type="text" name="sirket_vergidairesi" class="form-control" value="<?= $ayar["sirket_vergidairesi"] ?>" placeholder="<?= $d["vergidairesi"] ?>">
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" name="sirket_vergino" class="form-control" value="<?= $ayar["sirket_vergino"] ?>" placeholder="<?= $d["verginoyadatc"] ?>">
                                </div>
                            </div>


                        </fieldset>

                        <fieldset class="content-group">

                            <legend class="text-bold"><?= $d["sistemayarlari"] ?></legend>

                            <div class="form-group">
                                <label class="control-label col-lg-2"><?= $d["lisans"] ?></label>
                                <div class="col-lg-3">
                                    <input type="text" name="lisans_kod" class="form-control" placeholder="<?= $d["lisanskodu"] ?>" value="<?= $ayar["lisans_kod"] ?>" autocomplete="off">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" name="lisans_anahtar" class="form-control" placeholder="<?= $d["lisansanahtari"] ?>" value="<?= $ayar["lisans_anahtar"] ?>" autocomplete="off">
                                </div>
                                <div class="col-lg-2">
                                    <input type="text" name="lisans_sirketkod" class="form-control" placeholder="<?= $d["lisanssirketkodu"] ?>" value="<?= $ayar["lisans_sirketkod"] ?>" autocomplete="off">
                                </div>
                                <div class="col-lg-2">
                                    <input type="password" name="lisans_sifre" class="form-control" placeholder="<?= $d["lisansasifre"] ?>" value="<?= $ayar["lisans_sifre"] ?>" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2"><?= $d["veritabani"] ?></label>
                                <div class="col-lg-3">
                                    <input readonly type="text" class="form-control" value="<?= $host ?>">
                                </div>
                                <div class="col-lg-3">
                                    <input readonly type="text" class="form-control" value="<?= $db ?>">
                                </div>
                                <div class="col-lg-2">
                                    <input readonly type="text" class="form-control" value="<?= $user ?>">
                                </div>
                                <div class="col-lg-2">
                                    <input readonly type="password" class="form-control" value="<?= $pass ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2"><?= $d["tanimlidil"] ?></label>
                                <div class="col-lg-10">
                                    <select class="select" name="tanimli_dil">

                                        <?

                                        $diller = query("SELECT * FROM diller");
                                        while($dil = row($diller)){

                                            $ddil = $dil["dil"];

                                        ?>

                                        <option <? if($ddil == $ayar["tanimli_dil"]){ echo "selected"; } ?> value="<?= $ddil ?>"><?= $d[$ddil] ?></option>

                                        <? } ?>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2"><?= $d["doviztercih"] ?></label>
                                <div class="col-lg-10">
                                    <select class="select" name="tanimli_doviz">

                                        <?

                                        $dovizler = query("SELECT * FROM dovizler");
                                        while($doviz = row($dovizler)){

                                            $ddoviz = $doviz["doviz_kod"];

                                            ?>

                                            <option <? if($ddoviz == $ayar["tanimli_doviz"]){ echo "selected"; } ?> value="<?= $ddoviz ?>"><?= $d[$ddoviz]." ".$doviz["doviz_simge"] ?> - <?= ondalik(doviz($ddoviz)) ?></option>

                                        <? } ?>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2"><?= $d["kusurattercih"] ?></label>
                                <div class="col-lg-10">
                                    <input type="number" name="tanimli_kusurat" class="form-control" value="<?= $ayar["tanimli_kusurat"] ?>">
                                </div>
                            </div>

                        </fieldset>

                        <fieldset class="content-group">

                            <legend class="text-bold"><?= $d["carihareketleri"] ?></legend>

                            <div class="form-group">
                                <label class="control-label col-lg-2"><?= $d["ceksenetkalantercihi"] ?></label>
                                <div class="col-lg-10">
                                    <input type="text" name="tanimli_cari_kalangun" class="form-control" value="<?= $ayar["tanimli_cari_kalangun"] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2"><?= $d["carihareketsutunlar"] ?></label>
                                <div class="col-lg-3">
                                    <select class="select" name="tanimli_cari_sutun1">
                                            <option <? $sutun = "sirketno"; if($sutun == $ayar["tanimli_cari_sutun1"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                            <option <? $sutun = "sirketunvani"; if($sutun == $ayar["tanimli_cari_sutun1"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                            <option <? $sutun = "sirketadi"; if($sutun == $ayar["tanimli_cari_sutun1"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                            <option <? $sutun = "adres"; if($sutun == $ayar["tanimli_cari_sutun1"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                            <option <? $sutun = "telefon"; if($sutun == $ayar["tanimli_cari_sutun1"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                            <option <? $sutun = "vergi"; if($sutun == $ayar["tanimli_cari_sutun1"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <select class="select" name="tanimli_cari_sutun2">
                                        <option <? $sutun = "sirketno"; if($sutun == $ayar["tanimli_cari_sutun2"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "sirketunvani"; if($sutun == $ayar["tanimli_cari_sutun2"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "sirketadi"; if($sutun == $ayar["tanimli_cari_sutun2"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "adres"; if($sutun == $ayar["tanimli_cari_sutun2"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "telefon"; if($sutun == $ayar["tanimli_cari_sutun2"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "vergi"; if($sutun == $ayar["tanimli_cari_sutun2"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <select class="select" name="tanimli_cari_sutun3">
                                        <option <? $sutun = "sirketno"; if($sutun == $ayar["tanimli_cari_sutun3"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "sirketunvani"; if($sutun == $ayar["tanimli_cari_sutun3"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "sirketadi"; if($sutun == $ayar["tanimli_cari_sutun3"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "adres"; if($sutun == $ayar["tanimli_cari_sutun3"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "telefon"; if($sutun == $ayar["tanimli_cari_sutun3"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "vergi"; if($sutun == $ayar["tanimli_cari_sutun3"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <select class="select" name="tanimli_cari_sutun4">
                                        <option <? $sutun = "sirketno"; if($sutun == $ayar["tanimli_cari_sutun4"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "sirketunvani"; if($sutun == $ayar["tanimli_cari_sutun4"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "sirketadi"; if($sutun == $ayar["tanimli_cari_sutun4"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "adres"; if($sutun == $ayar["tanimli_cari_sutun4"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "telefon"; if($sutun == $ayar["tanimli_cari_sutun4"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "vergi"; if($sutun == $ayar["tanimli_cari_sutun4"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                    </select>
                                </div>
                            </div>

                        </fieldset>

                        <fieldset class="content-group">

                            <legend class="text-bold"><?= $d["urunhareketleri"] ?></legend>

                            <div class="form-group">
                                <label class="control-label col-lg-2"><?= $d["uyariadedi"] ?></label>
                                <div class="col-lg-10">
                                    <input type="text" name="tanimli_urun_azadet" class="form-control" value="<?= $ayar["tanimli_urun_azadet"] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2"><?= $d["carihareketsutunlar"] ?></label>
                                <div class="col-lg-3">
                                    <select class="select" name="tanimli_urun_sutun1">
                                        <option <? $sutun = "urunkodu"; if($sutun == $ayar["tanimli_urun_sutun1"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "urunadi"; if($sutun == $ayar["tanimli_urun_sutun1"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "urungrubu"; if($sutun == $ayar["tanimli_urun_sutun1"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "fiyat"; if($sutun == $ayar["tanimli_urun_sutun1"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <select class="select" name="tanimli_urun_sutun2">
                                        <option <? $sutun = "urunkodu"; if($sutun == $ayar["tanimli_urun_sutun2"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "urunadi"; if($sutun == $ayar["tanimli_urun_sutun2"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "urungrubu"; if($sutun == $ayar["tanimli_urun_sutun2"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "fiyat"; if($sutun == $ayar["tanimli_urun_sutun2"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <select class="select" name="tanimli_urun_sutun3">
                                        <option <? $sutun = "urunkodu"; if($sutun == $ayar["tanimli_urun_sutun3"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "urunadi"; if($sutun == $ayar["tanimli_urun_sutun3"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "urungrubu"; if($sutun == $ayar["tanimli_urun_sutun3"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "fiyat"; if($sutun == $ayar["tanimli_urun_sutun3"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <select class="select" name="tanimli_urun_sutun4">
                                        <option <? $sutun = "urunkodu"; if($sutun == $ayar["tanimli_urun_sutun4"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "urunadi"; if($sutun == $ayar["tanimli_urun_sutun4"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "urungrubu"; if($sutun == $ayar["tanimli_urun_sutun4"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                        <option <? $sutun = "fiyat"; if($sutun == $ayar["tanimli_urun_sutun4"]){ echo "selected"; } ?> value="<?= $sutun ?>"><?= $d[$sutun] ?></option>
                                    </select>
                                </div>
                            </div>

                        </fieldset>

                        <fieldset class="content-group">

                            <legend class="text-bold"><?= $d["dovizkurlari"] ?></legend>

                            <?

                                $dovizler = query("SELECT * FROM dovizler");
                                while ($doviz = row($dovizler)){

                                    $ddoviz = $doviz["doviz_kod"];

                            ?>

                            <div class="form-group has-feedback has-feedback-left">
                                <label class="control-label col-lg-2"><?= $d[$ddoviz] ?></label>
                                <div class="col-lg-10">
                                    <input type="text" name="<?= $ddoviz ?>" class="form-control" value="<?= ondalik($doviz["doviz_kur"]) ?>">
                                    <div class="form-control-feedback">
                                        <?= $doviz["doviz_simge"] ?>
                                    </div>
                                </div>
                            </div>

                            <? } ?>

                        </fieldset>

                        <div class="text-right">

                            <button type="submit" class="btn btn-primary"><?= $d["kaydet"] ?> <i class="icon-gear position-right"></i></button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>
