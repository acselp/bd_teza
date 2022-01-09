<?php

    class Db {

        public static function getConnection() {
            $paramsPath = $_SERVER['DOCUMENT_ROOT'] . '\/config\/db_params.php';
            $params = include($paramsPath);

            $db = new PDO("mysql:host={$params['host']};dbname={$params['dbname']}", $params['user'], $params['password']);
            
            return $db;
        }

    }

    

