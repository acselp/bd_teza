<?php

    class Product {

        public static function getProductById($id) {
            $id = intval($id);

            $db = Db::getConnection();

            $sql = "SELECT * FROM products WHERE id_prod = '$id' LIMIT 1";
            $res = $db->query($sql);
            $res->setFetchMode(PDO::FETCH_ASSOC);

            $prod = array();
            $row = $res->fetch();

            $prod[0]['id'] = $row['id_prod'];
            $prod[0]['name'] = $row['denumire'];
            $prod[0]['termen'] = $row['termen'];
            $prod[0]['pret'] = $row['pret'];
            
            return $prod;
        }

        public static function getProductsAll() {
            $db = Db::getConnection();

            $sql = "SELECT * FROM products";
            $res = $db->query($sql);
            $res->setFetchMode(PDO::FETCH_ASSOC);
            
            $prodList = array();

            $i = 0;
            while($row = $res->fetch()) {
                $prodList[$i]['id'] = $row['id_prod'];
                $prodList[$i]['name'] = $row['denumire'];
                $prodList[$i]['termen'] = $row['termen'];
                $prodList[$i]['pret'] = $row['pret'];
                $i++;
            }
            
            return $prodList;
        }
    }