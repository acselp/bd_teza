<?php

class Orders {

    public static function addOrder($fname, $lname, $tel, $products, $id) {
        $db = Db::getConnection();

        $sql = "INSERT INTO orders (fname, lname, tel, id_cump)
                VALUES ('$fname', '$lname', '$tel', '$id');";
        $res = $db->query($sql);

        //Selectam id-ul ultimei comenzi 
        $sql = "SELECT * FROM orders ORDER BY id DESC LIMIT 1";
        $res = $db->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        
        $order = $res->fetch();


        foreach($products as $key => $value) {
            $sql = "INSERT INTO orders_products (id_order, id_product, cantitate) 
                    values('$order[id]', '$key', $value)";
            $res = $db->query($sql);
        }

        


        unset($_SESSION['products']);
        return $res;
    }

    public static function getOrdersByCumpId($id) {
        $db = Db::getConnection();

        $sql = "SELECT * FROM orders WHERE id_cump = $id";
        $res = $db->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        
        return $res->fetchAll();
    }

    public static function getOrderById($id) {
        $db = Db::getConnection();

        $sql = "SELECT * FROM orders WHERE id = $id";
        $res = $db->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        
        return $res->fetchAll();
    }

    public static function getOrderDataForProd($id) {
        $db = Db::getConnection();

        $sql = "SELECT * FROM orders AS t1
                INNER JOIN orders_products AS t2
                ON t1.id = t2.id_order
                INNER JOIN products AS t3
                ON t2.id_product = t3.id_produs
                INNER JOIN users AS t4
                ON t3.id_producator = t4.user_id
                WHERE user_id = $id";

        $res = $db->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        
        return $res->fetchAll();
    }

    public static function getTotalSummOrder($id_cump, $id_order) {
        $sql = "SELECT * FROM orders AS t1
                INNER JOIN orders_products AS t2
                ON t1.id = t2.id_order
                INNER JOIN products AS t3
                ON t2.id_product = t3.id_produs
                INNER JOIN users AS t4
                ON t3.id_producator = t4.user_id
                WHERE id_cump = '$id_cump' AND t1.id = '$id_order'";
        
        $db = Db::getConnection();
        
        $res = $db->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $prods = $res->fetchAll();

        $summ = 0;

        foreach($prods as $prod) {
            $summ += $prod['cantitate'] * $prod['pret'];
        }
        return $summ;
    }

    public static function getProdsForOrder($order_id) {
        $sql = "SELECT id_product, cantitate FROM orders_products 
                INNER JOIN products 
                ON id_product = id_produs 
                WHERE id_order = $order_id";
        $db = Db::getConnection();
        $res = $db->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        return $res->fetchAll();
    } 
}