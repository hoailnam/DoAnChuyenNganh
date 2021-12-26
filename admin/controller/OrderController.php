<?php
include '../dao/OrderDao.php';
session_start();
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'delete':
            $order_id = $_GET['order_id'];
            OrderDao::deleteOrder($order_id);
            header("Location: ../view/orderList.php");
            break;
        case 'duyet':
            $admin_id= $_SESSION['admin'];
            $order_id = $_GET['order_id'];
            $detail= OrderDao::getDetailsOrder($order_id);
            OrderDao::adminBrowseOrder($admin_id,$order_id);
            OrderDao::browseOrder($order_id);
            OrderDao::deleteOrderDe($order_id);
            OrderDao::deleteOadmin($order_id);
            foreach($detail as $pr_detail){
                $product = OrderDao::getProduct($pr_detail[0]['product_id']);
                $soLuongMoi = $product['quantily'] - $pr_detail['quaility'];
                if ($soLuongMoi == 0) {
                    OrderDao::updateSoLuongSP($pr_detail['product_id'], $soLuongMoi, "Hết hàng");
                    
                }else{
                    
                    OrderDao::updateSoLuongSP($pr_detail['product_id'], $soLuongMoi, "Còn Hàng");
                    
                }
            }
            header("Location: ../view/orderList.php");
                
    }
}

?>
