<?php
session_start();
include_once '../utils/DataValidactionUtils.php';
include_once './BaseController.php';
include '../dao/UserDao.php';

class UserController extends BaseController{
    public function __construct($user_group_action){
        switch ($user_group_action) {
            case 'user_create':
                $txt_name = $_POST["txt_name"];
                $txt_email = $_POST["txt_email"];
                $txt_password = md5($_POST["txt_password"]);
                $txt_phone = $_POST["txt_phone"];
                $txt_Address = $_POST["txt_Address"];
                UserDao::insertUser($txt_name, $txt_email, $txt_password, $txt_phone, $txt_Address);
                alertM("Đăng Ký Thành Công", "../view/login.php");
                break;
            case 'user_login':

                $login_email = isset($_POST['login_email']) ? $_POST['login_email'] : '';
                $login_password = isset($_POST['login_password']) ? $_POST['login_password'] : '';

                $login_password = md5($login_password);

                $data = UserDao::getUser($login_email);

                if (isset($data["user_email"]) == false) {
                    alertM("Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. !!!", "../view/login.php");
                    exit;
                } elseif (!$login_email || !$login_password) {
                    alertM("Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu !!! ", "../view/login.php");
                    exit;
                } elseif ($login_password != $data["user_pass"]) {
                    alertM("Mật khẩu bạn không chính xác. Vui lòng kiểm tra lại. !!!", "../view/login.php");
                    exit;
                } elseif ($login_email == $data["user_email"] && $login_password == $data["user_pass"]) {
                    $_SESSION["user_email"] = $login_email;
                    $_SESSION["isLoginUser"] = true;
                    alertM("Đăng Nhập Thành Công", "../view/index.php");
                    die();
                } else {
                    header("Location: ../view/login.php");
                }
                break;
            case 'user_update':

                $login_email = $_POST["login_email"];
                $login_password = md5($_POST["login_password"]);
                $new_password = md5($_POST["new_password"]);
                $data = UserDao::getUser($login_email);

                if (isset($data["user_email"]) == false) {
                    alertM("Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. !!!", "../view/updatePassUser.php");
                    exit;
                } elseif (!$login_email || !$login_password) {
                    alertM("Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu !!! ", "../view/updatePassUser.php");
                    exit;
                } elseif ($login_password != $data["user_pass"]) {
                    alertM("Mật khẩu bạn không chính xác. Vui lòng kiểm tra lại. !!!", "../view/updatePassUser.php");
                    exit;
                } elseif ($login_email == $data["user_email"] && $login_password == $data["user_pass"]) {
                    UserDao::updateUser($login_email, $new_password);
                    alertM("Cập Nhật Thành Công Thành Công !!! ", "../view/login.php");
                    exit;
                }
                break;
        }
    }
}

function alertM($smg, $link)
{
    echo '<script language="javascript">';
    echo 'alert("' . $smg . '")';
    echo '</script>';
    echo '<script type="text/javascript">
            window.location = "' . $link . '" </script>';
}

$user_group_action = "";
if (count($_POST) > 0) {
    $user_group_action = $_POST["user_group_action"];
}
$userContr = new UserController($user_group_action);

    



?>