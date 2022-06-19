<?php

    class Db {

        public static function getConnection() {
            $paramsPath = $_SERVER['DOCUMENT_ROOT'] . '/config/db_params.php';
            $params = include($paramsPath);
            $dsn = "mysql:dbname=$params[dbname];host=$params[host];port=$params[port];charset=utf8";

            $db = new PDO($dsn, $params["user"], $params["password"]);
            
            return $db;
        }

    }

    

