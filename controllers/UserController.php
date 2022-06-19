<?php
    include_once($_SERVER['DOCUMENT_ROOT'] . "/models/User.php");

    class UserController {

        public function actionRegister() {
            // Переменные для формы
            $fname = false;
            $lname = false;
            $email = false;
            $password = false;
            $adress = false;
            $nr_contact = false;
            $type = false;

            $result = false;
            $registered = false;

            if (isset($_POST['submit'])) {
                
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

                // Флаг ошибок
                $errors = false;

                // Валидация полей
                if (!User::checkName($fname)) {
                    $errors[] = 'Numele trebuie sa aiba minim 2 caractere';
                }
                if (!User::checkEmail($email)) {
                    $errors[] = 'Nu exista asa Email';
                }
                
                if ($errors == false) {
                    $result = User::register($fname, $lname, $email, $password, $type, $nr_contact, $adress);
                    $registered = true;
                }
            }

            include_once($_SERVER['DOCUMENT_ROOT'] . '/views/register.php');
            return true;
        }

        public function actionLogin() {
            
            
            $errors = false;

            if(isset($_POST['submit'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
            

                if (!User::checkEmail($email)) {
                    $errors[] = 'Emailul a fost introdus gresit';
                } 

                if(!User::checkPassword($password)) {
                    $errors[] = 'Parola trebuie sa contina minim 8 caractere';
                }

                if(User::userExists($email)) {
                    if(User::login($email, $password)) {
                        return true;
                    }
                    else {
                        $errors[] = 'Ati gresit parola sau loginul';
                    }
                }
                else {
                    $errors[] = 'Acest utilizator nu exista';
                }
            }
            

            
            include_once($_SERVER['DOCUMENT_ROOT'] . "/views/login.php");
            return true;
        }

        public function actionLogout() {
            User::logout();
        }
    }