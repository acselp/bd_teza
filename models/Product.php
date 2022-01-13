<?php

class Product
{

    public static function getProductById($id)
    {
        $id = intval($id);

        $db = Db::getConnection();

        $sql = "SELECT * FROM products 
                INNER JOIN users 
                ON user_id = id_producator
                WHERE id_produs = '$id'";
        $res = $db->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        $prod = $res->fetch();

        return $prod;
    }

    public static function getProductsById($ids)
    {
        $idstr = implode(',', $ids);
        
        
        $db = Db::getConnection();

        $sql = "SELECT * FROM products 
                WHERE id_produs IN (".$idstr.");";
        $res = $db->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        $prod = $res->fetchAll();

        return $prod;
    }

    public static function getProducerProductById($id)
    {
        $id = intval($id);

        $db = Db::getConnection();

        $sql = "SELECT fname, lname FROM products 
                INNER JOIN users 
                ON user_id = id_producator
                WHERE id_produs = '$id'";
        $res = $db->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        $prod = $res->fetch();

        return $prod;
    }

    public static function getUnitProductById($id)
    {
        $id = intval($id);

        $db = Db::getConnection();

        $sql = "SELECT unit FROM 
                products AS t1 INNER JOIN unitati_mas AS t2 
                ON t1.id_unit = t2.id_unit
                WHERE id_produs = '$id'";
        $res = $db->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        $prod = $res->fetch();

        return $prod;
    }

    public static function getDispProductById($id)
    {
        $id = intval($id);

        $db = Db::getConnection();

        $sql = "SELECT nume_disp FROM 
                products AS t1 INNER JOIN disponibilitate AS t2 
                ON t1.id_disp = t2.id_disp
                WHERE id_produs = '$id'";
        $res = $db->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        $prod = $res->fetch();

        return $prod;
    }

    public static function getProductsAll()
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM products";
        $res = $db->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        $prodList = array();

        $i = 0;
        while ($row = $res->fetch()) {
            $prodList[$i]['id'] = $row['id_prod'];
            $prodList[$i]['name'] = $row['denumire'];
            $prodList[$i]['termen'] = $row['termen'];
            $prodList[$i]['pret'] = $row['pret'];
            $i++;
        }

        return $prodList;
    }


    public static function getProducts($limit)
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM products LIMIT $limit";
        $res = $db->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        $prodList = array();

        $i = 0;
        while ($row = $res->fetch()) {
            $prodList[$i] = $row;
            $i++;
        }

        return $prodList;
    }

    //Toate produsele doar al unui singur producator
    public static function getProductsAllByProdId($id)
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM products
                    INNER JOIN users
                    ON products.id_producator = users.user_id 
                    WHERE id_producator = '$id';";

        $res = $db->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        $prodList = array();

        $i = 0;
        while ($row = $res->fetch()) {
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


    public static function addProduct($den, $unit, $term, $dataFabr, $pret, $img_path, $desc)
    {

        $db = Db::getConnection();
        $id = $_SESSION['user'];

        $sql = 'INSERT INTO products (denumire_prod, id_producator, term_val, id_unit, pret, data_fabr, prod_img, description)'
            . "VALUES ('$den', '$id', '$term', '$unit', '$pret', '$dataFabr', '$img_path', '$desc')";

        $res = $db->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        return $res;
    }

    public static function editProduct($id_prod, $den, $unit, $term, $dataFabr, $pret, $disp)
    {

        $db = Db::getConnection();

        $sql = "UPDATE products SET 
                        denumire_prod = '$den',
                        term_val = '$term',
                        id_unit = '$unit',
                        pret = '$pret',
                        data_fabr = '$dataFabr',
                        id_disp = '$disp'
                    WHERE id_produs = '$id_prod';";

        $res = $db->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        return $res;
    }

    public static function removeProductById($id_prod)
    {

        $db = Db::getConnection();

        if (isset($id_prod)) {
            $sql = "DELETE FROM products
                    WHERE id_produs = '$id_prod';";
            $res = $db->query($sql);
            $res->setFetchMode(PDO::FETCH_ASSOC);
        }

        return $res;
    }

    /**
     * Upload imgs on upload folder
     * 
     * params: $img <- $_FILES['prod_img']
     */
    public static function uploadProdImg($img)
    {
        $target_dir = "upload/";
        $target_file = $target_dir . basename($img["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($img["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($img["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            return false;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($img["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($img["name"])) . " has been uploaded.";
                return true;
            } else {
                echo "Sorry, there was an error uploading your file.";
                return false;
            }
        }
    }
}
