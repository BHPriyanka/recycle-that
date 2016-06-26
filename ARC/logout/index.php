<?php 

// var_dump($_SERVER['DOCUMENT_ROOT'] . '/../includes/config.php');
// exit;
require($_SERVER['DOCUMENT_ROOT'] . '/includes/config.php');

//logout
$user->user_logout();

//logged in return to index page
header('Location: http://' . $_SERVER["HTTP_HOST"] . "/showcase");
// var_dump($_SERVER["HTTP_HOST"]);
exit;

?>