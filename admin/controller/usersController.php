<?php
session_start();
include '../dao/UserDao.php';
include_once './BaseController.php';

function alertM($smg, $link)
{
    echo '<script language="javascript">';
    echo 'alert("' . $smg . '")';
    echo '</script>';
    echo '<script type="text/javascript">
            window.location = "' . $link . '" </script>';
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    UserDao::deleteUser($id);
    alertM("Delete user Thành Công", "../view/UserList.php");
} 
$user_group_action = $_POST["user_group_action"];
switch ($user_group_action) {
    case 'admin_login':

        $login_email = isset($_POST['login_email']) ? $_POST['login_email'] : '';
        $login_password = isset($_POST['login_password']) ? $_POST['login_password'] : '';
        $login_password = md5($login_password);
        $data = UserDao::getAdmin($login_email);
        
        if (isset($data["admin_email"]) == null) {
            alertM("Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. !!!", "../view/login.php");
            exit;
        } elseif (!$login_email || !$login_password) {
            alertM("Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu !!! ", "../view/login.php");
            exit;
        } elseif ($login_password != $data["admin_pass"]) {
            alertM("Mật khẩu bạn không chính xác. Vui lòng kiểm tra lại. !!!", "../view/login.php");
            exit;
        } elseif ($login_email == $data["admin_email"] && $login_password == $data["admin_pass"]) {
            $_SESSION["admin_email"] = $login_email;
            $_SESSION["isLoginAdmin"] = true;
            $_SESSION["admin"] = $data["admin_id"];
            alertM("Đăng Nhập Thành Công", "../view/index.php");
          
        } else {
            header("Location: ../view/login.php");
        }
        break;
    case 'user_create':
        $txt_id = $_POST["txt_id"];
        $txt_name = $_POST["txt_name"];
        $txt_email = $_POST["txt_email"];
        $txt_pass = md5($_POST["txt_pass"]);
        $txt_phone = $_POST["txt_phone"];
        $txt_address = $_POST["txt_adress"];
        UserDao::insertUser($txt_id, $txt_name, $txt_email, $txt_pass, $txt_phone, $txt_address);
        alertM("Thêm user Thành Công", "../view/UserList.php");

    case 'admin_create':
        
        $txt_name = $_POST["txt_name"];
        $txt_email = $_POST["txt_email"];
        $txt_password = md5($_POST["txt_password"]);
        $txt_phone = $_POST["txt_phone"];
        $txt_Address = $_POST["txt_Address"];
        UserDao::insertAdmin($txt_name, $txt_email, $txt_password, $txt_phone, $txt_Address);
        alertM("Thêm user Thành Công", "../view/UserList.php");
        break;
    case 'user_update':
        $txt_id = $_POST["txt_id"];
        $txt_name = $_POST["txt_name"];
        $txt_gmail = $_POST["txt_gmail"];
        $txt_phone = $_POST["txt_phone"];
        $txt_address = $_POST["txt_adress"];
        UserDao::updateUser($txt_id, $txt_name, $txt_gmail, $txt_phone, $txt_address);
        alertM("Update user Thành Công", "../view/UserList.php");
        break;

}
