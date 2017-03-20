<?php 
    require_once "../google/config.php";
        if (!isset($_SESSION["user_id"]) && $_SESSION["user_id"] == "") {
            header("location:" . SITE_URL);
        exit();}
    include './header.php';
?>


