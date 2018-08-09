<li class="dropdown dropdown-user">
  <a class="dropdown-toggle" data-toggle="dropdown">
    <img src="<?php echo $resim; ?>" alt="">
    <span><?php echo session("uye_adi")."</span><span class='text-black'>".session("uye_soyadi"); ?></span>
    <i class="caret"></i>
  </a>

  <ul class="dropdown-menu dropdown-menu-right">
   <!--  <li><a href="index.php?do=profil"><i class="icon-user"></i> <?php echo $d["profil"]; ?></a></li>
    <li class="divider"></li> -->
    <li><a href="cikis.php"><i class="icon-switch2"></i> <?php echo $d["cikisyap"]; ?></a></li>
  </ul>
</li>
