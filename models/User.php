<?php

    class User {


        public static function update($fname, $lname, $email, $password, $type, $nr_contact, $adress) {
            
            $db = Db::getConnection();
            $idUser = $_SESSION['user'];
            
            $sql = "UPDATE users
                    SET fname = '$fname', 
                        lname = '$lname', 
                        email = '$email', 
                        password = '$password', 
                        type = '$type', 
                        contact_nr = '$nr_contact', 
                        adress = '$adress'
                    WHERE user_id = '$idUser';";
                    

            $res = $db->query($sql);
            $res->setFetchMode(PDO::FETCH_ASSOC);

            return $res->fetch();
        }
        

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
            if(strlen($name) <= 2) {
                return false;
            }
            else {
                return true;
            }
        }

        public static function checkPassword($pass) {
            if(strlen($pass) <= 8) {
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

        public static function userExists($email) {
            $sql = "SELECT email FROM users WHERE email = '$email'";
            $db = Db::getConnection();

            $res = $db->query($sql);
            $res->setFetchMode(PDO::FETCH_ASSOC);
            if($res->rowCount() === 1) {
                return true;
            }           
            else {
                return false;
            }
        }

        public static function login($email, $password) {
            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $db = Db::getConnection();
            $res = $db->query($sql);
            $res->setFetchMode(PDO::FETCH_ASSOC);
            $row = $res->fetch();

            if($res->rowCount() === 1) {
                $_SESSION['user'] = $row['user_id'];
                header("Location: /index.php");
                return true;
            }
            else {
                return false;
            }
        }

        public static function logout() {
            unset($_SESSION['user']);
            unset($_SESSION['products']);
            header("Location: /index.php");
        }

        public static function getUserDataById($id) {
            $sql = "SELECT * FROM users AS t1
                    INNER JOIN user_type AS t2
                    on t1.type = t2.id_type 
                    WHERE user_id = '$id'";
            $db = Db::getConnection();
            

            $res = $db->query($sql);
            $res->setFetchMode(PDO::FETCH_ASSOC);

            if($res->rowCount() === 1) {
                return $res->fetch();
            }
            else {
                return false;
            }
        }

        public static function isSeller($id) {
            $userType = "SELECT type FROM users WHERE user_id = $id";

            $db = Db::getConnection();
            $res = $db->query($userType);
            $res->setFetchMode(PDO::FETCH_ASSOC);
            
            $type = $res->fetch();
            if($type === 2) {
                return true;
            }
            else {
                return false;
            }
        }

        public static function isSellerNoId() {
            $id = $_SESSION['user'];
            $userType = "SELECT type FROM users WHERE user_id = $id";

            $db = Db::getConnection();
            $res = $db->query($userType);
            $res->setFetchMode(PDO::FETCH_ASSOC);
            
            $type = $res->fetch();
            if($type === 2) {
                return true;
            }
            else {
                return false;
            }
        }
    }