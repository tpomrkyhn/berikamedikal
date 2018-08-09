<?

require_once "../sistem/ayar.php";
require_once "../sistem/fonksiyon.php";

?>
<ul class="media-list dropdown-content-body">

    <?

    $query = query("SELECT * FROM belgeler WHERE belge_tip = 'siparis' AND belge_oku = 'hayir'");
    $adet = mysql_num_rows($query);
    if ($adet == 0) {

        ?>

        <li class="media">

            <div class="media-body text-center">
                <span class="text-muted">Yeni Sipariş Yok</span>
            </div>

        </li>

        <?

    }
    while ($belge = row($query)) {

        ?>

        <li class="media">

            <div class="media-body">
                <a href="index.php?do=siparisler&id=<?= $belge["belge_id"] ?>" class="media-heading">
                    <span class="text-semibold"><?= $belge["belge_no"] ?></span>
                    <span class="media-annotation pull-right"><?= sure($belge["belge_tarih"]) ?></span>
                </a>

                <span class="text-muted"><?= sirket("unvan", $belge["belge_sirket_id"]) ?></span>
            </div>

        </li>

        <?

    }

    ?>
</ul>
