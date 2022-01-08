<?php

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . '/views/blocks/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . "/components/Router.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/components/Db.php");




$router = new Router();
$router->run();