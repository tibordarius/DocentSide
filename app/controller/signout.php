<?php
session_start();
session_destroy();
header('location: https://oege.ie.hva.nl/~artsn001/index.php');
exit();
?>