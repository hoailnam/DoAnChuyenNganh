<?php
include '../dao/ProductPortfolioDao.php';
include_once './BaseController.php';
session_start();

function alertM($smg, $link)
{
    echo '<script language="javascript">';
    echo 'alert("'.$smg.'")';
    echo '</script>';
    echo '<script type="text/javascript">
            window.location = "'.$link.'" </script>';
}
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    ProductPortfolioDao::deleteProduct($id);
    alertM("Delete Thành Công", "../view/product-portfolio.php");
}
else if(isset($_POST['save'])){
  $txt_id=$_POST["txt_id"];
  $txt_name = $_POST["txt_name"];

  ProductPortfolioDao::insertProduct($txt_id, $txt_name);
  alertM("Insert Thành Công", "../view/product-portfolio.php");
} 
// else if(isset($_GET['update'])){
//   $id=$_GET['update'];
//   $txt_id = $_POST["txt_id"];
//   $txt_name = $_POST["txt_name"];
//   var_dump($_GET);
//   die;

// }

$action_type = $_POST['action_type'];
switch ($action_type) {
  case 'update':
    $txt_name = $_POST["txt_name"];
    $txt_id = $_POST["txt_id"];
    ProductPortfolioDao::updateProduct($txt_id, $txt_name);
    alertM("Update Thành Công", "../view/product-portfolio.php");
    break;
 
}


?>
