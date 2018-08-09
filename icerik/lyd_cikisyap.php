<?php

    session_destroy();

    $_SESSION['login'] = null;
    unset($_SESSION['login']);

    go("index.php");


 ?>
