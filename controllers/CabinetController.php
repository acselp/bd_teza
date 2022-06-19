<?php

    include_once(ROOT . "/models/User.php");

    class CabinetController {


        public function actionIndex() {

            $userData = ["Email", "Parola", "Prenume", "Nume", "Adresa", "Numarul de contact ", "Tip de account"];
            $userId = $_SESSION['user'];
            $user = User::getUserDataById($userId);
            $pageTitle = "Cabinet";
            include(ROOT . "/views/cabinet.php");
            return true;
        }

        public function actionEdit() {

            $edited = false;

            if(isset($_POST['submit'])) {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $adress = $_POST['adress'];
                $type = $_POST['type'];
                if($type === "Cumparator") {
                    $type = 1;
                }
                else {
                    $type = 2;
                }

                $nr_contact = $_POST['nr_contact'];

              
                $errors = false;

     
                if (!User::checkName($fname)) {
                    $errors[] = 'Numele trebuie sa aiba minim 2 caractere';
                }
                if (!User::checkEmail($email)) {
                    $errors[] = 'Nu exista asa Email';
                }
                
                if ($errors == false) {
                    $result = User::update($fname, $lname, $email, $password, $type, $nr_contact, $adress);
                    $edited = true;
                }

            }

            $id = $_SESSION['user'];
            $userData = User::getUserDataById($id);
            $otherType = "";
            if($userData['type'] === "Cumparator") {
                $otherType = "Vanzator";
            }
            else {
                $otherType = "Cumparator";
            }

            include(ROOT . "/views/editUser.php");
            return true;
        }
    }
