<?php
session_start();
session_unset();
session_destroy();
echo '<script language="javascript">';
echo 'alert("Đăng Xuất Thành Công !!! ")';
echo '</script>';
echo '<script type="text/javascript">window.location = "index.php" </script>';
