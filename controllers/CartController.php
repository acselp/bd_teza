<?php

include_once ROOT . "/models/Product.php";
include_once ROOT . "/models/Cart.php";

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

    // public function actionRemoveAll($id) { //Sterge total produsul din cos
    //     $id = intval($id);
    //     Cart::removeAll($id);

    //     header("Location: /cart");
    // } 
}