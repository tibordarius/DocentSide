<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ob_start();
session_start();

define('PROJECT_NAME', 'IJburg College');

define('DB_DRIVER', 'mysql');
define('DB_SERVER', 'oege.ie.hva.nl');
define('DB_SERVER_USERNAME', 'artsn001');
define('DB_SERVER_PASSWORD', '7L1fsVAUG5KngR');
define('DB_DATABASE', 'zartsn001');

$dboptions = array(
    PDO::ATTR_PERSISTENT => FALSE,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
try {
  $DB = new PDO(DB_DRIVER . ':host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, $dboptions);
} catch (Exception $ex) {
  echo $ex->getMessage();
  die;
}

/* make sure the url end with a trailing slash */
define("SITE_URL", "http://oege.ie.hva.nl/~artsn001/");
/* the page where you will be redirected for authorzation */
define("REDIRECT_URL", SITE_URL."google/login.php");

/* * ***** Google related activities start ** */
define("CLIENT_ID", "386290369432-apops34elv931sovs3demr1r8dmprru1.apps.googleusercontent.com"); 
define("CLIENT_SECRET", "asVj1SMi5BPphwduN95hg3F-");

/* permission */
define("SCOPE", 'https://www.googleapis.com/auth/userinfo.email '.
		'https://www.googleapis.com/auth/userinfo.profile' );



/* logout both from google and your site **/
define("LOGOUT_URL", "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=". urlencode(SITE_URL."google/logout.php"));
/* * ***** Google related activities end ** */
?>