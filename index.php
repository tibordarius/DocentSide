<?php
    session_start();
    if (!($_SESSION['loggedIn'])){
        header('location:view/signin.php');
        exit();}
    else {
        header('location:view/dashboard.php');
        exit();}     
