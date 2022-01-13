<?php
include(ROOT . "/models/Product.php");
class SiteController {

    public function actionIndex() {
        
        $products = Product::getProducts(6);

        include_once($_SERVER['DOCUMENT_ROOT'] . "/views/index.php");

        return true;
    }

}