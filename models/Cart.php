<?php

class Cart {

    public static function addProduct($id) {
        $id = intval($id);

        $cartProducts = array();

        if(isset($_SESSION['products'])) {
            $cartProducts = $_SESSION['products'];
        }
        
        if(array_key_exists($id, $cartProducts)) {
            $cartProducts[$id]++;
        }
        else {
            $cartProducts[$id] = 1;
        }

        $_SESSION['products'] = $cartProducts;

    }


    public static function removeAll($id) {
        $id = intval($id);

        $cartProducts = array();

        if(isset($_SESSION['products'])) {
            $cartProducts = $_SESSION['products'];
        }
        
        unset($cartProducts[$id]);

        $_SESSION['products'] = $cartProducts;
    }

    public static function removeProduct($id) {
        $id = intval($id);

        $cartProducts = array();

        if(isset($_SESSION['products'])) {
            $cartProducts = $_SESSION['products'];
        }
        
        if(array_key_exists($id, $cartProducts)) {
            if($cartProducts[$id] > 0)
                $cartProducts[$id]--;
            $_SESSION['products'] = $cartProducts;
        }
        else if(Cart::getNumberById($id) === 0) {
            Cart::removeAll($id);
        }
    }

    public static function getNumber() {

        if(isset($_SESSION['products'])) {
            $prods = $_SESSION['products'];

            $nr = 0;
            foreach($prods as $key => $value)
                $nr += $value;
            return $nr;
        }
        else {
            return 0;
        }
    }

    public static function getNumberById($id) {

        if(isset($_SESSION['products'])) {
            $prods = $_SESSION['products'];

            $nr = 0;
            foreach($prods as $key => $value) {
                if($key === $id) {
                    $nr += $value;
                }
            }
            return $nr;
        }
        else {
            return 0;
        }
    }

    public static function getTotalById($id) {
        if(isset($_SESSION['products']))
            $prods = $_SESSION['products'];
        
        $prodData = Product::getProductById($id);
        $nr = $prods[$id];

        return $prodData['pret'] * $nr;
    } 

    public static function getTotal() {
        if(isset($_SESSION['products'])) {
            $prods = $_SESSION['products'];
        
            $summ = 0;

            foreach($prods as $id => $nr) {
                $prodData = Product::getProductById($id);
                $summ += $nr * $prodData['pret'];
            }
            return $summ;
        }
    } 

    public static function clear() {
        unset($_SESSION['products']);
    }
}