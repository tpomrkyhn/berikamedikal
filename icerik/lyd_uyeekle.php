<div class="page-container">

  <div class="page-content">

    <div class="content-wrapper">

      <div class="panel">

        <div class="panel-body">

          <form id="uyeekle" class="form-horizontal" enctype="multipart/form-data" method="post" action="">
            <fieldset class="content-group">
              <legend class="text-bold"><?= $d["kullanicibilgileri"] ?></legend>

              <div class="form-group">
                <label class="control-label col-lg-2"><?= $d["kullaniciadi"] ?></label>
                <div class="col-lg-10">
                  <input type="text" name="kadi" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-2"><?= $d["mailadresi"] ?></label>
                <div class="col-lg-10">
                  <input type="email" name="mail" class="form-control" required>
                </div>
              </div>
              <script type="text/javascript">

                function kontrol() {

                  if(document.getElementById("sifre").value == document.getElementById("sifre2").value){

                    $("#birinci").removeClass("has-error");
                    $("#ikinci").removeClass("has-error");
                    $("#birinci").addClass("has-success");
                    $("#ikinci").addClass("has-success");
                    $("#hatamesaji").hide();
                    document.getElementById("buton").disabled = false;

                  }else{

                    $("#birinci").removeClass("has-success");
                    $("#ikinci").removeClass("has-success");
                    $("#birinci").addClass("has-error");
                    $("#ikinci").addClass("has-error");
                    $("#hatamesaji").show();
                    document.getElementById("buton").disabled = true;

                  }

                }

              </script>
              <div class="form-group" id="birinci">
                <label class="control-label col-lg-2"><?= $d["sifre"] ?></label>
                <div class="col-lg-10">
                  <input onkeyup="kontrol()" id="sifre" type="password" name="sifre" class="form-control" required>
                </div>
              </div>
              <div class="form-group" id="ikinci">
                <label class="control-label col-lg-2"><?= $d["sifretekrari"] ?></label>
                <div class="col-lg-10">
                  <input onkeyup="kontrol()" id="sifre2" type="password" name="sifre2" class="form-control" required>
                  <span style="display: none" id="hatamesaji" class="help-block"><?= $d["sifreleruyusmuyor"] ?></span>
                </div>
              </div>

            </fieldset>

            <fieldset class="content-group">
              <legend class="text-bold"><?= $d["sirketbilgileri"] ?></legend>

              <div class="form-group">
                <label class="control-label col-lg-2"> <?= $d["sirketadi"] ?></label>
                <div class="col-lg-10">
                  <select class="select-search" name="sirket" data-placeholder="">
                    <option value=""></option>
                    <optgroup label="<?= $d["tumsirketler"] ?>">
                      <?

                        $sirketquery = query("SELECT * FROM sirketler");

                        while($row = row($sirketquery)){

                      ?>
                      <option value="<?= ss($row["sirket_id"]) ?>"><?= ss($row["sirket_adi"]) ?> - <?= ss($row["sirket_unvani"]) ?></option>
                      <? } ?>
                    </optgroup>
                  </select>
                </div>
              </div>

            </fieldset>

            <fieldset class="content-group">
              <legend class="text-bold"><?= $d["kisiselbilgiler"] ?></legend>

              <div class="form-group">
                <label class="control-label col-lg-2"><?= $d["adisoyadi"] ?></label>
                <div class="col-lg-10">
                  <input type="text" name="adi" class="form-control" required>
                </div>
              </div>
            </fieldset>

            <fieldset class="content-group">
              <legend class="text-bold"><?= $d["gorseller"] ?></legend>

              <div class="form-group">
                <label class="control-label col-lg-2"><?= $d["profilfotografi"] ?></label>
                <div class="col-lg-10">
                  <input name="dosya[]" id="gorseller[]" type="file" class="file-styled">
                </div>
              </div>

            </fieldset>

            <fieldset class="content-group">
              <legend class="text-bold"><?= $d["onayyetkilendirmevegrup"] ?></legend>

              <div class="form-group">
                <label class="control-label col-lg-2"> <?= $d["onay"] ?></label>
                <div class="col-lg-10">
                  <select class="select" name="onay" data-placeholder="">
                      <option value="evet"><?= $d["evet"] ?></option>
                      <option value="hayir"><?= $d["hayir"] ?></option>
                    </optgroup>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-lg-2"> <?= $d["grup2"] ?></label>
                <div class="col-lg-10">
                  <select class="select" name="onay" data-placeholder="">
                      <option value="admin"><?= $d["admin"] ?></option>
                      <option value="yonetim"><?= $d["yonetim"] ?></option>
                      <option value="moderator"><?= $d["moderator"] ?></option>
                      <option selected value="uye"><?= $d["uye"] ?></option>
                    </optgroup>
                  </select>
                </div>
              </div>

            </fieldset>

            <fieldset class="content-group">
              <legend class="text-bold"><?= $d["ozelnotvekodlar"] ?></legend>

              <div class="form-group">
                <label class="control-label col-lg-2"> <?= $d["not"] ?></label>
                <div class="col-lg-10">
                  <textarea cols="18" rows="5" class="wysihtml5 wysihtml5-min form-control" placeholder="<?= $d["uyeyeozelnotlar"] ?>"></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-lg-2"> <?= $d["kod"] ?></label>
                <div class="col-md-5">
                  <button disabled type="button" class="btn btn-default"><i class="icon-floppy-disk position-left"></i> <?= $d["otomatikkayit"] ?></button><br><br>
                  <div id="php_editor">&lt?

    /*

    lydSoft © 2017
    --------------------------
    <?= $d["ustsecenekler"] ?>


    */

?></div>
                </div>
                <div class="col-md-5">
                  <button disabled type="button" class="btn btn-default"><i class="icon-floppy-disk position-left"></i> <?= $d["otomatikkayit"] ?></button><br><br>
                  <div id="php_editor2">&lt?

    /*

    lydSoft © 2017
    --------------------------
    <?= $d["altsecenekler"] ?>


    */

?></div>
                </div>
              </div>

            </fieldset>

            <script>
                var editor = ace.edit("php_editor");
                var editor2 = ace.edit("php_editor2");
                editor.getSession().setMode("ace/mode/php");
                editor2.getSession().setMode("ace/mode/php");
            </script>

            <div class="text-right">
              <button id="buton" type="submit" class="btn btn-primary"><?= $d["olustur"] ?> <i class="icon-arrow-right14 position-right"></i></button>
            </div>
          </form>

        </div>

      </div>

    </div>

  </div>

</div>
