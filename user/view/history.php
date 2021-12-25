<!doctype html>
<html class="no-js" lang="zxx">

<?php include "../dao/UserDao.php" ?>

<head>
    <?php include 'layout/headerpage.php'; ?>
</head>

<body>
    <header>
        <!-- Header Start -->
        <?php include 'layout/header1page.php'; ?>
        <!-- Header End -->
    </header>
    <main>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>History Order</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================Cart Area =================-->

        <section class="cart_area section_padding">
            <div class="container">
                <div class="cart_inner">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $user_id = $_SESSION['user_ma'];
                                $history = UserDao::getHistoryOrder($user_id);
                                foreach ($history as $his) :
                                    echo '<tr >';
                                    echo '<th scope="row">' . $his['order_id'] . '</th> ';
                                    echo '<th scope="row">' . $his['order_date'] . '</th>';
                                    echo '<th scope="row">' . $his['order_name'] . '</th> ';
                                    echo '<th scope="row">' . $his['order_status'] . '</th>';
                                    echo '<th scope="row">' . $his['order_address'] . '</th> ';
                                    echo '<th scope="row"><a href="confirmation.php?order_id=' . $his['order_id']. '" class="genric-btn info radius">Xem</a> </th>';
                            
                                    echo '</tr>';
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                        <div class="checkout_btn_inner float-right">
                            <a class="btn_1" href="../view/shop.php">Continue Shopping</a>
                        </div>
                    </div>
                </div>
        </section>
        <!--================End Cart Area =================-->
    </main>>
    <footer>
        <!-- Footer Start-->
        <?php include 'layout/footerpage.php'; ?>
        <!-- Footer End-->
    </footer>
    <!--? Search model Begin -->
    <?php include 'layout/search.php'; ?>
    <!-- Search model end -->

    <!-- JS here -->

    <?php include 'layout/scriptpage.php'; ?>

</body>

</html>