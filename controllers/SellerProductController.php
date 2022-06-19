<?php   

    include_once(ROOT . "/models/Product.php");

    class SellerProductController {

        public function actionShowAllForCurrProd() {
            $id = $_SESSION['user']; //Id-ul utilizatorului logat

            $prodList = array();
            $prodList = Product::getProductsAllByProdId($id);
            
            require_once($_SERVER['DOCUMENT_ROOT'] . '/views/productList.php');

            return true;    
        }

        public function actionAddProd() {
            $id = $_SESSION['user']; //Id-ul utilizatorului logat

            $added = false;
            $addPg = true;
            $editPg = false;
            $edited = false;
            if(isset($_POST['submit'])) {
                $den = $_POST['den'];
                $pret = $_POST['pret'];
                $term = $_POST['term'];
                $fabr = $_POST['fabr'];
                $unit = $_POST['unit'];
                $img = $_FILES["prod_img"];
                $desc = $_POST['description'];

                $uploaded = Product::uploadProdImg($img);
                
                if($uploaded) {
                    $added = Product::addProduct($den, $unit, $term, $fabr, $pret, "\/upload/" . $img['name'], $desc);
                }
            }

            $prodData = array();
            require_once($_SERVER['DOCUMENT_ROOT'] . '/views/addProduct.php');

            return true;    
        }

        public function actionEditProd($id) {

            $added = false;
            $editPg = true;
            $addPg = false;
            $edited = false;

            $prodData = Product::getProductById($id);
            $den = $prodData['denumire_prod'];
            $pret = $prodData['pret'];
            $term = $prodData['term_val'];
            $fabr = $prodData['data_fabr'];
            $unit = $prodData['id_unit'];
            
            if(isset($_POST['submit'])) {
                $den = $_POST['den'];
                $pret = $_POST['pret'];
                $term = $_POST['term'];
                $fabr = $_POST['fabr'];
                $unit = $_POST['unit'];
                $disp = $_POST['disp'];
                
                $edited = Product::editProduct($id, $den, $unit, $term, $fabr, $pret, $disp);
            }

            $unitName = "";
            $otherUnitName = "";
            if($unit === 1) {
                $otherUnit = 2;
                $unitName = "Kg";
                $otherUnitName = "Litri";
            }
            else {
                $otherUnit = 1;
                $unitName = "Litri";
                $otherUnitName = "Kg";
            }

            require_once($_SERVER['DOCUMENT_ROOT'] . '/views/addProduct.php');

            return true;    
        }


        public function actionRemoveProd($id) {
            $id = intval($id);
            
            $deleted = Product::removeProductById($id);

            require_once($_SERVER['DOCUMENT_ROOT'] . '/views/productList.php');

            return true;    
        }
    }