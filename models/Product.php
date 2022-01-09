<?php

    class Product {

        public static function getProductById($id) {
            $id = intval($id);

            $db = Db::getConnection();

            $sql = "SELECT * FROM products WHERE id_produs = '$id' LIMIT 1";
            $res = $db->query($sql);
            $res->setFetchMode(PDO::FETCH_ASSOC);

            $prod = $res->fetch();

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


        //Toate produsele doar al unui singur producator
        public static function getProductsAllByProdId($id) {
            $db = Db::getConnection();

            $sql = "SELECT * FROM products
                    INNER JOIN users
                    ON products.id_producator = users.user_id 
                    WHERE id_producator = '$id';";

            $res = $db->query($sql);
            $res->setFetchMode(PDO::FETCH_ASSOC);
            
            $prodList = array();

            $i = 0;
            while($row = $res->fetch()) {
                $prodList[$i] = $row;
                // $prodList[$i]['denumire_rod'] = $row['denumire_prod'];
                // $prodList[$i]['term_val'] = $row['term_val'];
                // $prodList[$i]['pret'] = $row['pret'];
                // $prodList[$i]['id_unit'] = $row['id_unit'];
                // $prodList[$i]['producer'] = $row[''];
                // $prodList[$i]['data_adaug'] = $row['term_val'];
                // $prodList[$i]['data_fabr'] = $row['pret'];
                $i++;
            }
            
            return $prodList;
        }


        public static function addProduct($den, $unit, $term, $dataFabr, $pret) {
            
            $db = Db::getConnection();
            $id = $_SESSION['user'];
            
            $sql = 'INSERT INTO products (denumire_prod, id_producator, term_val, id_unit, pret, data_fabr)'
                    . "VALUES ('$den', '$id', '$term', '$unit', '$pret', '$dataFabr')";

            $res = $db->query($sql);
            $res->setFetchMode(PDO::FETCH_ASSOC);

            return $res;
        }

        public static function editProduct($id_prod, $den, $unit, $term, $dataFabr, $pret) {
            
            $db = Db::getConnection();
            
            $sql = "UPDATE products SET 
                        denumire_prod = '$den',
                        term_val = '$term',
                        id_unit = '$unit',
                        pret = '$pret',
                        data_fabr = '$dataFabr'
                    WHERE id_produs = '$id_prod';";

            $res = $db->query($sql);
            $res->setFetchMode(PDO::FETCH_ASSOC);

            return $res;
        }

        public static function removeProductById($id_prod) {
            
            $db = Db::getConnection();
            
            if(isset($id_prod)) {
                $sql = "DELETE FROM products
                    WHERE id_produs = '$id_prod';";
                $res = $db->query($sql);
                $res->setFetchMode(PDO::FETCH_ASSOC);
            }   

            return $res;
        }
    }