<?php
include '../utils/MYSQLUtils.php';

class ProductDao{
    public static function getProduct($product_id)
    {

        $myDB = new MySQLUtil();
        $query = "SELECT `product_id`, `product_name`, `price`, `avtar`, `type_id` FROM `product` WHERE product_id=:product_id";
        $param = array(":product_id" => $product_id);
        $data = $myDB->getData($query, $param);
        $myDB->disconnectDB();
        return $data[0];
    }


    public function getAllProduct()
    {

        $myDB = new MYSQLUtil();
        $query = "SELECT `product_id`, `product_name`, `price`, `avtar`, `type_id` FROM `product`";
        $data = $myDB->getAllData($query);
        $myDB->disconnectDB();
        return $data;
    }

    public static function deleteProduct($id)
    {
        $myDB = new MYSQLUtil();
        $query = "DELETE FROM `product` WHERE product_id = :product_id";
        $param = array(":product_id" => $id);
        $myDB->updateData($query, $param);
        $myDB->disconnectDB();
    }
    public static function updateProduct($id, $product_id, $product_name, $price, $avtar, $type_id)
    {

        $myDB = new MYSQLUtil();
        $query = "UPDATE `product` SET product_id=:product_id,product_name=:product_name,price=:price,avtar=:avtar,type_id:type_id WHERE product_id=:id";
        $param = array(":id" => $id, ":product_id" => $product_id, ":product_name" => $product_name, ":price" => $price, ":avtar" => $avtar, ":type_id" => $type_id);
        $myDB->updateData($query, $param);
        $myDB->disconnectDB();
    }

    public static function checkExistDonHangSanPham($id)
    {
        $myDB = new MySQLUtil();
        $query = "SELECT `product_id` FROM `order_detail` WHERE product_id =:product_id;";
        $param = array(":product_id" => $id);
        $data = $myDB->getDataa($query, $param);
        $myDB->disconnectDB();
        if (!empty($data)) return true;
        return false;
    }
    public static function updatePr($product_id, $product_name, $price, $type_id, $quantily)
    {
        $myDB = new MYSQLUtil();
        $query = "UPDATE `product` SET `product_id`=:product_id,`product_name`=:product_name,`price`=:price,`type_id`=:type_id,`quantily`=:quantily WHERE product_id=:product_id";
        $param = array(":product_id" => $product_id, ":product_name" => $product_name, ":price" => $price, ":type_id" => $type_id, ":quantily" => $quantily);
        $myDB->updateData($query, $param);
        $myDB->disconnectDB();
    }

    public static function insertProduct($product_id, $product_name, $price, $avtar, $type_id, $quantily, $status)
    {
        $myDB = new MYSQLUtil();
        $query = "INSERT INTO `product`(`product_id`, `product_name`, `price`, `avtar`, `type_id`,quantily,status	 ) VALUES (:product_id,:product_name,:price,:avtar,:type_id,:quantily,:status	)";
        $param = array(":product_id" => $product_id, ":product_name" => $product_name, ":price" => $price, ":avtar" => $avtar, ":type_id" => $type_id, ":quantily" => $quantily, ":status"=> $status);
        $myDB->insertData($query, $param);
        $myDB->disconnectDB();
    }
    public static function deletePr($id)
    {
        $myDB = new MYSQLUtil();
        $query = "DELETE FROM `product` WHERE product_id = :product_id";
        $param = array(":product_id" => $id);
        $myDB->deleteData($query, $param);
        $myDB->disconnectDB();
    }

    public static function gettype()
    {
        $myDB = new MYSQLUtil();
        $query = "SELECT *FROM `type`";
        $data = $myDB->getAllData($query);
        $myDB->disconnectDB();
        return $data;
    }

    

}
