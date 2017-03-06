<?php
                $servername = DB_HOST;
                $username_database = DB_USERNAME;
                $password_database = DB_PASSWORD;

                $conn = new mysqli($servername, $username_database, $password_database);
                
$username_form = $_POST['inputEmail'];
$password_form = $_POST['inputPassword'];
$timestamp = date('Y-m-d G:i:s');

$query = $conn->prepare("SELECT password FROM zartsn001.employee WHERE username = ?");
$query->bind_param('s', $username_form);
$query->execute();
$query->bind_result($password);
$query->fetch();
$query->close();

echo "succed SELECT";

if ($password_form == $password) {
    echo "password correct";
    session_start();
    $_SESSION['loggedIn'] = true;
    $_SESSION['username'] = $username_form;
    $query = $conn->prepare("INSERT INTO zartsn001.LastLogin (username, DateTime) VALUES (?, ?)");
    $query->bind_param('ss', $username_form, $timestamp);
    $query->execute();
    $query->close();
    
    echo "succed INSERT";
    
    header('location:../view/index.php');
    exit();
} else {
    echo "ERROR";
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

