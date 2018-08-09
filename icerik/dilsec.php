<?php if($giris == "evet"){}else{ echo '<li class="dropdown language-switch">'; } ?>
  <a class="dropdown-toggle" data-toggle="dropdown">
    <img src="assets/images/flags/<?php echo $dil; ?>.png" class="position-left" alt="">
    <?php echo $d[$dil]; ?>
    <span class="caret"></span>
  </a>

  <ul class="dropdown-menu">
    <li><a href="<?= $_SERVER['REQUEST_URI'] ?><? if(strstr($_SERVER['REQUEST_URI'],"?")){ echo "&"; }else{ echo "?"; } ?>dil=tr"><img src="assets/images/flags/tr.png" alt=""> <?php echo $d["tr"]; ?></a></li>
    <li><a href="<?= $_SERVER['REQUEST_URI'] ?><? if(strstr($_SERVER['REQUEST_URI'],"?")){ echo "&"; }else{ echo "?"; } ?>dil=en"><img src="assets/images/flags/en.png" alt=""> <?php echo $d["en"]; ?></a></li>
  </ul>
<?php if($giris == "evet"){}else{ echo '</li>'; } ?>
