<?php
session_start();
$value = $_GET["btn_qty"];
$product_id = $_GET['id'];
include '../utils/MySQLUtil.php';
$dbCon = new MySQLUtil();
$param = array();
$query = "";
if (isset($_GET['id'])) {
    $query = "select * from product where product_id=?";
    $param[] = $_GET['id'];
}
$pr = $dbCon->getPrDetails($query, $param);
if(isset($_GET['vitri'])){
    $vitri = $_GET['vitri'];
    unset($_SESSION['cart'][$vitri]);
    header('Location: ../view/giohang.php');
}
if (isset($_SESSION['cart'])) {
    if ($value == 0) {
        unset($_SESSION['cart'][$product_id]);
        header("Location:../view/product_details.php?product_id=$product_id");
    } else {
        switch ($value) {
            case 1:
                $_SESSION['cart'][$product_id]['qty_value'] = $_SESSION['cart'][$product_id]['qty_value'] + 1;
                break;
            case -1:
                $_SESSION['cart'][$product_id]['qty_value'] = $_SESSION['cart'][$product_id]['qty_value'] - 1;
                if ($_SESSION['cart'][$product_id]['qty_value'] <= 0) {
                    unset($_SESSION['cart'][$product_id]);
                    header("Location:../view/cart.php");
                    exit();
                }
                break;
            default:
                $_SESSION['cart'][$product_id]['qty_value'] = $_SESSION['cart'][$product_id]['qty_value'] + $value;
                break;
        }
        $_SESSION['cart'][$product_id]['product_id'] = $pr['product_id'];
        $_SESSION['cart'][$product_id]['product_name'] = $pr['product_name'];
        $_SESSION['cart'][$product_id]['avtar'] = $pr['avtar'];
        $_SESSION['cart'][$product_id]['price'] = $pr['price'];
    }
    if (isset($_SESSION['isLogin'])) {
        header("Location:../view/cart.php");
    } else {
        header("Location:../view/login.php");
    }
    
    exit();
} else {
    $_SESSION['cart'][$product_id]['product_id'] = $pr['product_id'];
    $_SESSION['cart'][$product_id]['avtar'] = $pr['avtar'];
    $_SESSION['cart'][$product_id]['product_name'] = $pr['product_name'];
    $_SESSION['cart'][$product_id]['price'] = $pr['price'];
    $_SESSION['cart'][$product_id]['qty_value'] = $value;
    if (isset($_SESSION['isLogin'])) {
        header("Location:../view/cart.php");
    } else {
        header("Location:../view/login.php");
    }
    exit();
}
