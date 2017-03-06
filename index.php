<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    if (!($_SESSION['loggedIn'])){
    header('location:./view/signin.html');
    exit();}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1 style = "font-size:36px;">WELKOM!</h1>
        <?php
        // put your code here
        ?>
    </body>
</html>
