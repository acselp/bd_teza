<?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/models/Product.php');
    
    
    class ProductController {

        
        public function actionShowById($id) {
            $prodList = array();
            $prodList = Product::getProductById($id);
            require_once($_SERVER['DOCUMENT_ROOT'] . '/views/shop.php');

            return true;
        }

        public function actionShowAll() {
            $prodList = array();
            $prodList = Product::getProductsAll();
            require_once($_SERVER['DOCUMENT_ROOT'] . '/views/shop.php');

            return true;
        }
    }