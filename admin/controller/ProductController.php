<?php

include '../dao/ProductDao.php';
if (isset($_GET['delete'])) {
    $product_id = $_GET['product_id'];
    $check = ProductDao::checkExistDonHangSanPham($product_id);
    if ($check == true) {
        alertM("Product còn tồn tại trong đơn hàng", "../view/productlist.php");
    }else{
        ProductDao::deletePr($product_id);
        alertM("Delete Sản Phẩm $product_id Thành Công", "../view/productlist.php");
    }
    
} else if (isset($_POST['save'])) {
    $txt_id = $_POST["txt_id"];
    $txt_name = $_POST["txt_name"];
    $txt_price = $_POST["txt_price"];
    $txt_type = $_POST["txt_type"];
    $txt_qty = $_POST["txt_qty"];
    $txt_stt = "Còn Hàng";
    $txt_avtar = $_FILES['fileToUpload']['name'];
    ProductDao::insertProduct($txt_id, $txt_name, $txt_price, $txt_avtar, $txt_type, $txt_qty,$txt_stt);
    alertM("Insert product Thành Công", "../view/productList.php");
}
$action_pr = $_POST['action_pr'];
switch ($action_pr) {
    case 'update':
        $txt_id = $_POST["txt_id"];
        $txt_name = $_POST["txt_name"];
        $txt_price = $_POST["txt_price"];
        $txt_type = $_POST["txt_type"];
        $txt_quantily = $_POST["txt_quantily"];

        ProductDao::updatePr($txt_id, $txt_name, $txt_price, $txt_type, $txt_quantily);
        alertM("Update user Thành Công", "../view/productlist.php");
        break;
}
    
function alertM($smg, $link)
{
    echo '<script language="javascript">';
    echo 'alert("' . $smg . '")';
    echo '</script>';
    echo '<script type="text/javascript">
            window.location = "' . $link . '" </script>';
}
