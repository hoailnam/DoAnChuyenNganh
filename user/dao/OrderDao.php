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
}