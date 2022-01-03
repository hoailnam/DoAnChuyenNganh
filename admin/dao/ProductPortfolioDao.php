<?php
include '../utils/MYSQLUtils.php';
class ProductPortfolioDao
{
    public function getAllProduct()
    {

        $myDB = new MYSQLUtil();
        $query = "SELECT `type_id`, `type_name` FROM `type`";
        $data = $myDB->getAllData($query);
        $myDB->disconnectDB();
        return $data;
    }

    public static function insertProduct($type_id, $type_name)
    {
        $myDB = new MYSQLUtil();
        $query = "INSERT INTO `type`(`type_id`, `type_name`) VALUES (:type_id,:type_name)";
        $param = array(":type_id" => $type_id, ":type_name" => $type_name);
        $myDB->insertData($query, $param);
        $myDB->disconnectDB();
    }

    public static function getProduct($id)
    {
        $myDB = new MYSQLUtil();
        $query = "SELECT `type_id`, `type_name` FROM `type`where type_id=:type_id";
        $param = array(":type_id" => $id);
        $data = $myDB->getData($query, $param);
        $myDB->disconnectDB();
        return $data[0];
    }
    public static function deleteProduct($id)
    {
        $myDB = new MYSQLUtil();
        $query = "DELETE FROM `type` WHERE type_id = :type_id";
        $param = array(":type_id" => $id);
        $myDB->updateData($query, $param);
        $myDB->disconnectDB();
    }
    public static function updateProduct($type_id, $type_name)
    {

        $myDB = new MYSQLUtil();
        $query = "UPDATE `type` SET type_id=:type_id,type_name=:type_name WHERE type_id=:type_id";
        $param = array(":type_id" => $type_id, ":type_name" => $type_name);
        $myDB->updateData($query, $param);
        $myDB->disconnectDB();
    }
}
?>