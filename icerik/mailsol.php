<div class="sidebar-content">

    <!-- Actions -->
    <div class="sidebar-category">
        <div class="category-title">
            <span><?= $d["eylemler"] ?></span>
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>

        <div class="category-content">
            <a href="index.php?do=mailgonder" class="btn bg-indigo-400 btn-block"><?= $d["e-postayaz"] ?></a>
        </div>
    </div>
    <!-- /actions -->


    <!-- Sub navigation -->
    <div class="sidebar-category">
        <div class="category-title">
            <span><?= $d["menu"] ?></span>
            <ul class="icons-list">
                <li><a href="" data-action="collapse"></a></li>
            </ul>
        </div>


        <div class="category-content no-padding">
            <ul class="navigation navigation-alt navigation-accordion no-padding-bottom">
                <li class="navigation-header"><?= $d["klasorler"] ?></li>
                <li class="<? if(g("do") == "mailgelen"){ echo "active"; } ?>"><a href="index.php?do=mailgelen&s=1"><i class="icon-drawer-in"></i> <?= $d["gelenkutusu"] ?> <? if(mailgelenokunmamis() > 0){ ?><span class="badge badge-success"><?= mailgelenokunmamis() ?></span><? } ?></a></li>
                <li class="<? if(g("do") == "mailtaslak"){ echo "active"; } ?>"><a href="index.php?do=mailtaslak&s=1"><i class="icon-drawer3"></i> <?= $d["taslaklar"] ?></a></li>
                <li class="<? if(g("do") == "mailgiden"){ echo "active"; } ?>"><a href="index.php?do=mailgiden&s=1"><i class="icon-drawer-out"></i> <?= $d["gidenkutusu"] ?></a></li>
                <li class="<? if(g("do") == "mailyildiz"){ echo "active"; } ?>"><a href="index.php?do=mailyildiz&s=1"><i class="icon-stars"></i> <?= $d["yildizlilar"] ?></a></li>
                <li class="navigation-divider"></li>
                <li class="<? if(g("do") == "mailcop"){ echo "active"; } ?>"><a href="index.php?do=mailcop&s=1"><i class="icon-bin"></i> <?= $d["cop"] ?></a></li>
            </ul>
        </div>
    </div>
    <!-- /sub navigation -->

</div>