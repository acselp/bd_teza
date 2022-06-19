<?php
include(ROOT . "/models/Product.php");
include(ROOT . "/models/Orders.php");
include(ROOT . "/models/User.php");

class OrderController {

    public function actionShowProdsByIds($orderId) {

        $order_prods = Orders::getOrderById($orderId);

        $prods = json_decode($order_prods['produse']);
        $ids = array();

        foreach($prods as $key => $value) {
            $ids[] = $key;
        }

        $prodData = Product::getProductsById($ids);

        include(ROOT . "/views/index.php");
        return true;
    }

    public function actionShowMyOrders() {
        $id = intval($_SESSION['user']);
        if(isset($_SESSION['user']))
            $user_id = $_SESSION['user'];

        $seller = '';

        if(User::isSeller($user_id))
            $seller = true;
        else
            $seller = false;

        $orderList = Orders::getOrdersByCumpId($id);

        include(ROOT . "/views/myOrders.php");
        return true; 
    }

    public function actionShowMyOrderProducts($order_id) {
        $id = intval($_SESSION['user']);
        
        $prodList = array();
        $prods = Orders::getProdsForOrder($order_id);

        foreach($prods as $prod) {
            $prodList[] = Product::getProductById($prod['id_product']);
        }
   
        include(ROOT . "/views/productList.php");
        return true; 
    }
}