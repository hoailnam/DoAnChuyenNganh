<?php
session_start();
include_once './BaseController.php';
include '../dao/OrderDao.php';

class PayController extends BaseController
{
    public function __construct($order_action)
    {
        switch ($order_action) {
            case 'order':

                $name = $_POST["name"];
                $phone = $_POST["phone"];
                $email = $_POST["email"];
                $address = $_POST["address"];
                $note = $_POST["note"];
                $user_id = $_SESSION["user_ma"];
                $amount = $_POST['thanhtien'];
                OrderDao::insertOrder($user_id, $amount, $name, $address, $phone, $email, $note);

                $newOrder = OrderDao::getNewOrder();
                $madon = $newOrder[0]['order_id'];
                foreach ($_SESSION['cart'] as $value):
                    $id_pr=$value['product_id'];
                    $sum=0;
                    $sum = $value['price'] * $value['qty_value'];
                    OrderDao::insertDetailOrder($madon,$id_pr,$value['qty_value'],$sum);
                endforeach;
                alertM("Đặt Hàng Thành Công Thành Công !!! ", "../view/index.php");
                exit;
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

$order_action = "";
if (count($_POST) > 0) {
    $order_action = $_POST["order_action"];
}
$orderCortrol = new PayController($order_action);
