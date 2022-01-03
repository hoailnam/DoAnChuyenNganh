<?php
include '../utils/MYSQLUtils.php';
class UserDao
{
    public function getAllUser()
    {

        $myDB = new MYSQLUtil();
        $query = "SELECT `user_id`, `user_name`, `user_email`, `user_pass`, `user_phone`, `user_address` FROM `user`";
        $data = $myDB->getAllData($query);
        $myDB->disconnectDB();
        return $data;
    }

    public static function insertUser($user_id, $user_name, $user_email, $user_pass,$user_phone, $user_address)
    {
        $myDB = new MYSQLUtil();
        $query = "INSERT INTO `user`(`user_id`, `user_name`, `user_email`, `user_pass`, `user_phone`, `user_address`) VALUES (:user_id,:user_name,:user_email,:user_pass,:user_phone,:user_address)";
        $param = array(":user_id" => $user_id, ":user_name" => $user_name, ":user_email" => $user_email, ":user_pass" => $user_pass, ":user_phone" => $user_phone,":user_address" => $user_address);
        $myDB->insertData($query, $param);
        $myDB->disconnectDB();
    }

    public static function getUser($user_email)
    {
        $myDB = new MySQLUtil();
        $query = "SELECT user_email,user_pass FROM user where user_email=:user_email";
        $param = array(":user_email" => $user_email);
        $data = $myDB->getData($query, $param);
        $myDB->disconnectDB();
        return $data[0];
    }
    public static function deleteUser($id)
    {
        $myDB = new MYSQLUtil();
        $query = "DELETE FROM `user` WHERE user_id = :user_id";
        $param = array(":user_id" => $id);
        $myDB->updateData($query, $param);
        $myDB->disconnectDB();
    }
    public static function updateUser($user_id, $user_name, $user_email,$user_phone, $user_address)
    {
        $myDB = new MYSQLUtil();
        $query = "UPDATE `user` SET `user_id`=:user_id,`user_name`=:user_name,`user_email`=:user_email,`user_phone`=:user_phone,`user_address`=:user_address WHERE user_id=:user_id";
        $param = array(":user_id" => $user_id, ":user_name" => $user_name, ":user_email" => $user_email, ":user_phone" => $user_phone,":user_address" => $user_address);
        $myDB->updateData($query, $param);
        $myDB->disconnectDB();
    }

    public static function getAdmin($user_email)
    {
        $myDB = new MySQLUtil();
        $query = "SELECT admin_id,admin_email,admin_pass FROM admin where admin_email=:admin_email";
        $param = array(":admin_email" => $user_email);
        $data = $myDB->getData($query, $param);
        $myDB->disconnectDB();
        return $data[0];
    }
    public static function insertAdmin( $admin_name, $admin_email, $admin_pass, $admin_address, $admin_phone)
    {
        $myDB = new MYSQLUtil();
        $query = "INSERT INTO `admin`( `admin_name`, `admin_email`, `admin_pass`, `admin_address`, `admin_phone`) VALUES (:admin_name,:admin_email,:admin_pass,:admin_address,:admin_phone)";
        $param = array( ":admin_name" => $admin_name, ":admin_email" => $admin_email, ":admin_pass" => $admin_pass, ":admin_address" => $admin_address, ":admin_phone" => $admin_phone);
        $myDB->insertData($query, $param);
        $myDB->disconnectDB();
    }
}
?>