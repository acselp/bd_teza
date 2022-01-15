<?php

include_once ROOT . "/models/Product.php";
include_once ROOT . "/models/Cart.php";
include_once ROOT . "/models/User.php";
include_once ROOT . "/models/Orders.php";

class CartController {

    public function actionIndex() {
        $prodData = array();
        $ids = array();
        $total = Cart::getTotal();
        $totalPerProd = array();

        if(isset($_SESSION['products']) && !empty($_SESSION['products'])) {
            $products = $_SESSION['products'];
            //var_dump($products);

            foreach($products as $key => $value) {
                $ids[] = $key;
                $totalPerProd[$key] = Cart::getTotalById($key);
            }
                
            $prodData = Product::getProductsById($ids);
        }   

        


        include(ROOT . "/views/cartIndex.php");
        return true;
    }

    public function actionAddProduct($id, $loc) {
        $id = intval($id);

        Cart::addProduct($id);
        header("Location: /$loc");
        return true;
    } 

    public function actionRemoveProduct($id) {
        $id = intval($id);
        Cart::removeProduct($id);

        header("Location: /cart");
        return true;
    } 

    public function actionRemoveProductAll($id) {
        $id = intval($id);
        Cart::removeAll($id);

        header("Location: /cart");
        return true;
    } 

    public function actionConfirmOrder() {   


        $ordered = false;
        if(isset($_POST['submit'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $tel = $_POST['tel'];
            $prods = $_SESSION['products'];

            $ordered = true;
            $id = 0;

            if(isset($_POST['id'])) {
                $id = $_POST['id'];
            }
            else {
                $id = NULL;
            }

            Orders::addOrder($fname, $lname, $tel, $prods, $id);
        }
        if(isset($_SESSION['user'])) {
            $user_id = $_SESSION['user'];
        }
        

        $userData = array();

        if(!User::isGuest()) {
            $userData = User::getUserDataById($user_id);
        } 


        include(ROOT . "/views/checkout.php");
        return true;
    }

}