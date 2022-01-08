<?php

    class User {


        public static function register($fname, $lname, $email, $password, $type, $nr_contact, $adress) {
            
            $db = Db::getConnection();

       
            $sql = 'INSERT INTO users (fname, lname, email, password, type, contact_nr, adress) '
                    . 'VALUES (:fname, :lname, :email, :password, :type, :contact_nr, :adress)';

            $result = $db->prepare($sql);
            $result->bindParam(':fname', $fname, PDO::PARAM_STR);
            $result->bindParam(':lname', $lname, PDO::PARAM_STR);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->bindParam(':password', $password, PDO::PARAM_STR);
            $result->bindParam(':type', $type, PDO::PARAM_STR);
            $result->bindParam(':contact_nr', $nr_contact, PDO::PARAM_STR);
            $result->bindParam(':adress', $adress, PDO::PARAM_STR);

            return $result->execute();
        }


        public static function checkName($name) {
            if(strlen($name) < 2) {
                return false;
            }
            else {
                return true;
            }
        }

        public static function checkEmail($email) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            }
            else {
                return false;
            }
        }


        public static function isGuest() {
            if(!isset($_SESSION['user'])) {
                return true;
            }
            else {
                return false;
            }
        }
    }