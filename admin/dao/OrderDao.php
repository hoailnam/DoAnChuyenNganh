<?php
include '../utils/MYSQLUtils.php';
class OrderDao{
    public static function insertOrder($user_id,$order_name, $amount, $order_address, $order_phone, $order_email, $order_note)
    { 
        $myDB = new MYSQLUtil();
        $query = "INSERT INTO `order`(`user_id`, `amount`, `order_name`, `order_address`, `order_phone`, `order_email`, `order_note`) VALUES (:user_id ,:order_name,:amount,:order_address,:order_phone,:order_email,:order_note)";
        $param = array(":user_id" =>$user_id, ":order_name" =>$order_name, ":amount" => $amount, ":order_address" =>$order_address, ":order_phone" => $order_phone, ":order_email"=> $order_email, ":order_note"=> $order_note);
        $myDB->insertData($query, $param);
        $myDB->disconnectDB();
    }
    public static function deleteOrder($id)
    {
        $myDB = new MYSQLUtil();
        $query = "DELETE FROM `order` WHERE order_id = :order_id";
        $param = array(":order_id" => $id);
        $myDB->deleteData($query, $param);
        $myDB->disconnectDB();
    }
    public static function deleteOrderDe($id)
    {
        $myDB = new MYSQLUtil();
        $query = "DELETE FROM `order_detail` WHERE order_id = :order_id";
        $param = array(":order_id" => $id);
        $myDB->deleteData($query, $param);
        $myDB->disconnectDB();
        
    }
    public static function deleteOadmin($id)
    {
        $myDB = new MYSQLUtil();
        $query = "DELETE FROM `oadmin` WHERE order_id = :order_id";
        $param = array(":order_id" => $id);
        $myDB->deleteData($query, $param);
        $myDB->disconnectDB();
    
    }
    public static function insertDetailOrder($order_id,$product_id, $quaility, $price_sale)
    {
        $myDB = new MySQLUtil();
        $query = "INSERT INTO `order_detail`( `order_id`, `product_id`, `quaility`, `price_sale`) VALUES (:order_id,:product_id,:quaility,:price_sale)";
        $param = array(":order_id" => $order_id, ":product_id" => $product_id, ":quaility" => $quaility, ":price_sale" => $price_sale);
        $myDB->insertData($query, $param);
        $myDB->disconnectDB();
    }

    public static function getNewOrder()
    {
        $myDB = new MySQLUtil();
        $query = "SELECT `order_id`FROM `order` order by order_id desc limit 1";
        $data = $myDB->getAllData($query);
        $myDB->disconnectDB();
        return $data;
    }
    public static function getOrder($id)
    {
        $myDB = new MySQLUtil();
        $query = "SELECT  `order_id`, DATE_FORMAT(order_date, '%d/%m/%Y')as `order_date`, `order_status`, `amount`, `order_name`, `order_address`, `order_phone`, `order_email`, `order_note` FROM `order` WHERE order_id=$id";
        $data = $myDB->getAllData($query);
        $myDB->disconnectDB();
        return $data;
    }

    public static function getDetailsOrder($id)
    {     
        $myDB = new MySQLUtil();
        $query = "select d.product_id, sp.product_name, sp.price, d.quaility, d.price_sale,sp.type_id from order_detail as d join product as sp on d.product_id=sp.product_id where d.order_id=$id";
        $data = $myDB->getAllData($query);
        $myDB->disconnectDB();
        return $data;
    }

    public static function browseOrder($id)
    {
        $myDB = new MYSQLUtil();
        $query = "UPDATE `order` SET`order_status`='Đã Giao'WHERE order_id=$id;";   
        $myDB->update($query);
        $myDB->disconnectDB();
    }

    public static function adminBrowseOrder($admin_id, $order_id)
    {
        $myDB = new MYSQLUtil();
        $query = "INSERT INTO `oadmin`( `admin_id`, `order_id`) VALUES (:admin_id,:order_id)";
        $param = array(":admin_id" => $admin_id, ":order_id" => $order_id);
        $myDB->insertData($query, $param);
        $myDB->disconnectDB();
    }

    

    

    public static function getProduct($product_id)
    {

        $myDB = new MySQLUtil();
        $query = "SELECT `product_id`, `product_name`, `price`, `avtar`, `type_id`,quantily FROM `product` WHERE product_id=:product_id";
        $param = array(":product_id" => $product_id);
        $data = $myDB->getData($query, $param);
        $myDB->disconnectDB();
        return $data[0];
    }
    public static function updateSoLuongSP($product_id, $status, $quantily)
    {
        $myDB = new MYSQLUtil();
        $query = "UPDATE `product` SET `status`=:status,`quantily`=:quantily WHERE product_id=:product_id";
        $param = array(":product_id" => $product_id, ":status" => $status, ":quantily" => $quantily);
        $myDB->updateData($query, $param);
        $myDB->disconnectDB();
    }
    
}