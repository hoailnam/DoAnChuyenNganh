<div class="header-right">
    <ul>
        <li>
            <div class="nav-search search-switch">
                <span class="flaticon-search"></span>
            </div>
        </li>
        <?php
        session_start();

        if (isset($_SESSION["isLogin"])) {
            echo '<li> <a href="./history.php"><span class="flaticon-user">' . $_SESSION["user_email"] . '</span></a></li>';
            echo '<li><a href="logoutpage.php"><i class="icon-key"></i> <span>Logout</span></a></li>';
            echo '<li><a href="cart.php"><span class="flaticon-shopping-cart"></span></a> </li>';
        ?>
            <div class="count">
                <?php if (isset($_SESSION['cart'])) echo count($_SESSION['cart']);
                else echo "0";
                ?>
            </div>
            <?php
        } else {
            echo '<li> <a href="login.php"><span class="flaticon-user"></span></a></li>';
            echo '<li><a href="cart.php"><span class="flaticon-shopping-cart"></span></a> </li>';
        }
            ?>
    </ul>
</div>