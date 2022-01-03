<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ./view/login.php");
}else{
    header("Location: ./view/index.php");
}
