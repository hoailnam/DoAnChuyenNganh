<?php
// include '../utils/MYSQLUtils.php';

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
    public static function updateSoLuongLaptop($masp, $soluong, $tinhtrang, $conn)
    {
        $statement = $conn->prepare("update laptop
        set soluong=:soluong,tinhtrang=:tinhtrang where masp=:masp");
        $statement->bindValue(':soluong', $soluong);
        $statement->bindValue(':tinhtrang', $tinhtrang);
        $statement->bindValue(':masp', $masp);
        $statement->execute();
    }

    public static function deletePr($id)
    {
        $myDB = new MYSQLUtil();
        $query = "DELETE FROM `product` WHERE product_id = :product_id";
        $param = array(":product_id" => $id);
        $myDB->deleteData($query, $param);
        $myDB->disconnectDB();
    }
    
    // public static function updateSoLuongSP($product_id, $status, $quantily)
    // {
    //     $myDB = new MYSQLUtil();
    //     $query = "UPDATE `product` SET `status`=:status,`quantily`=:quantily WHERE product_id=:product_id";
    //     $param = array(":product_id" => $product_id, ":status"=> $status, ":quantily"=> $quantily);
    //     $myDB->deleteData($query, $param);
    //     $myDB->disconnectDB();
    // }

    

}
