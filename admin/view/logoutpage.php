<?php
session_start();
session_unset();
$_SESSION['isLoginAdmin']= false;
$_SESSION["admin_email"] ="";
echo '<script language="javascript">';
echo 'alert("Đăng Xuất Thành Công !!! ")';
echo '</script>';
echo '<script type="text/javascript">window.location = "../index.php" </script>';
