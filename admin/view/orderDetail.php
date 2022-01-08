<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'layout/header.php'; ?>

</head>
<?php
include '../dao/OrderDao.php';
$history = OrderDao::getOrder($_GET['order_id']);
$details = OrderDao::getDetailsOrder($_GET['order_id']);

?>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <?php include 'layout/Preloader_start.php'; ?>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?php include 'layout/Nav_header_start.php'; ?>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>

                <div class="header-right">
                    <ul class="clearfix">

                        <li class="icons dropdown">
                            <?php include '../view/layout/menupage.php' ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include 'layout/Sidebar_start.php'; ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3>Chi Tiết Đơn Hàng</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="active-member">
                                    <div class="table-responsive">
                                        <table class="table table-xs mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Product Avatar</th>
                                                    <th>Product Id</th>
                                                    <th>Product Name</th>
                                                    <th>Amount</th>
                                                    <th>Quaility</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <thead>
                                                    <?php foreach ($details as $i => $product) : ?>
                                                        <tr>

                                                            <th><img src="./images/<?php echo  $product['avtar'] ?>"></th>
                                                            <th><?php echo  $product['product_id'] ?></th>
                                                            <th><?php echo  $product['product_name'] ?></th>
                                                            <th><?php echo  $product['price'] ?></th>
                                                            <th><?php echo  $product['quaility'] ?></th>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </thead>
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="active-member">
                                    <div class="table-responsive">
                                        <table class="table table-xs mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Order Id</th>
                                                    <th>Order Date</th>
                                                    <th>Order Name</th>
                                                    <th>Order Phone</th>
                                                    <th>Order Address</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <thead>
                                                    <tr>
                                                        <th><?php echo $history[0]['order_id']; ?></th>
                                                        <th><?php echo $history[0]['order_date']; ?></th>
                                                        <th><?php echo $history[0]['order_name']; ?></th>
                                                        <th><?php echo $history[0]['order_phone']; ?></th>
                                                        <th><?php echo $history[0]['order_address']; ?></th>
                                                        <th><?php echo $history[0]['amount']; ?></th>
                                                        <th><?php echo $history[0]['order_status']; ?></th>
                                                    </tr>
                                                </thead>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>







                <?php include 'layout/mxh.php'; ?>
                <!-- #/ container -->

                <!--**********************************
            Content body end
        ***********************************-->


                <!--**********************************
            Footer start
        ***********************************-->
                <?php include 'layout/Footer.php'; ?>
                <!--**********************************
            Footer end
        ***********************************-->

                <!--**********************************
        Main wrapper end
    ***********************************-->

                <!--**********************************
        Scripts
    ***********************************-->
                <?php include 'layout/Scripts.php'; ?>

</body>

</html>