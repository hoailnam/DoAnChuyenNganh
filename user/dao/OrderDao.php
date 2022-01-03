<?php
include '../utils/MySQLUtil.php';
class OrderDao{
    public static function insertOrder($user_id,$order_name, $amount, $order_address, $order_phone, $order_email, $order_note)
    { 
        $myDB = new MySQLUtil();
        $query = "INSERT INTO `order`(`user_id`, `amount`, `order_name`, `order_address`, `order_phone`, `order_email`, `order_note`) VALUES (:user_id ,:order_name,:amount,:order_address,:order_phone,:order_email,:order_note)";
        $param = array(":user_id" =>$user_id, ":order_name" =>$order_name, ":amount" => $amount, ":order_address" =>$order_address, ":order_phone" => $order_phone, ":order_email"=> $order_email, ":order_note"=> $order_note);
        $myDB->insertData($query, $param);
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
}