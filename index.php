<?php



// ini_set('display_errors', 1);
// error_reporting(E_ALL);



session_start();
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
ob_start();
include_once(ROOT . '/views/blocks/head.php');
ob_clean();
require_once(ROOT . "/components/Router.php");
require_once(ROOT . "/components/Db.php");


$router = new Router();
$router->run();