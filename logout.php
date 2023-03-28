<?php
    session_start();

    if($_SESSION['user'] && $_SESSION['adm']){
        header("Location: index.php");
        exit;
    }

    if (isset($_GET['logout'])) {
        unset($_SESSION['user']);
        unset($_SESSION['adm']);

        session_unset();
        session_destroy();
        header("Location: index.php");
        exit;
    }
