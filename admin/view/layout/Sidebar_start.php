<?php
if (isset($_SESSION['isLoginAdmin'])) {
?>
    <div class="nk-sidebar">
        <div class="nk-nav-scroll">
            <ul class="metismenu" id="menu">
                <li class="mega-menu mega-menu-sm">
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Admin</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="UserList.php">User List</a></li>
                        <li><a href="productlist.php">Product List</a></li>
                        <li><a href="product-portfolio.php">Product portfolio</a></li>
                        <li><a href="orderList.php">Order list</a></li>
                        <li><a href="page-register.php">Create Account</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
<?php
}
?>