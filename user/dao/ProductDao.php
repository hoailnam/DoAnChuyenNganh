<?php

include '../utils/MySQLUtil.php';
class ProductDao
{
    public function getAllUser()
    {
        $myDB = new MySQLUtil();
        $query = "SELECT product_id,product_name,price,avtar FROM product";
        $data = $myDB->getAllData($query);
        $myDB->disconnectDB();
        return $data;
    }
}
