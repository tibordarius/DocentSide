<?php
                $servername = 'oege.ie.hva.nl';
                $username_database = 'artsn001';
                $password_database = '7L1fsVAUG5KngR';

                $conn = new mysqli($servername, $username_database, $password_database);
                
$username_form = $_POST['uname'];
$password_form = $_POST['psw'];
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
    
    header('location:https://oege.ie.hva.nl/~artsn001/DocentSide/view/index.php ');
    exit();
} else {
    echo "ERROR";
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

