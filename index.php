<?php

require_once 'google/config.php';
session_start();
if (!isset($_SESSION["user_id"]) && $_SESSION["user_id"] == "") {
    header("location:" . SITE_URL . "view/signin.php");
} else {
    header("location:" . SITE_URL . "view/badgeUit.php");
}
exit();
?>