<?php
ob_start();
session_start();

//database credentials
define('DBHOST','localhost');
define('DBUSER','jastcode_rt');
define('DBPASS','!Pl23R7DVk}Z');
define('DBNAME','jastcode_rt');

//application URL
define('DIR','http://sample.com/');
define('SITEEMAIL','noreply@sample.com');

try {

    //create PDO connection
    $db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    //show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

//include the user class, pass in the database connection
include(  $_SERVER['DOCUMENT_ROOT'] . '/classes/userClass.php');
$user = new UserClass($db);
?>
