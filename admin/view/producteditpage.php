<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'layout/header.php'; ?>

</head>

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
                            <div>
                                <a href="productlist.php" type="button" class="btn btn-primary" style="margin:30px" class="fa fa-arrow-left"><i class="fa fa-arrow-left">&ensp;Back</i></a>
                            </div>
                        </li>
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
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <?php
                                    if (isset($_GET['edit']))
                                        $id = $_GET['edit'];
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "doan";
                                    try {
                                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $stmt = $conn->prepare("SELECT `product_id`, `product_name`, `price`, `avtar`, `type_id`,quantily,	status FROM `product` WHERE product_id=:product_id");
                                        $stmt->bindParam(':product_id', $id);
                                        $stmt->execute();
                                        $product = $stmt->fetchALL(PDO::FETCH_ASSOC);
                                        if ($product) {
                                            foreach ($product as $product) {
                                                echo '<form action="../controller/ProductController.php" method="POST" enctype="multipart/form-data" class="form-horizontal">';
                                                echo '<div class="row form-group">';
                                                echo '<div class="col col-md-3"><label for="text-input" class=" form-control-label">id</label></div>';
                                                echo '<div class="col-12 col-md-9"><input type="text" value="' . $product['product_id'] . '" id="txt_id" name="txt_id" class="form-control"></div>';
                                                echo '</div>';
                                                echo '<div class="row form-group">';
                                                echo '<div class="col col-md-3"><label for="text-input" class=" form-control-label">product name</label></div>';
                                                echo '<div class="col-12 col-md-9"><input type="text" value="' . $product['product_name'] . '" id="txt_name" name="txt_name" class="form-control"></div>';
                                                echo '</div>';
                                                echo '<div class="row form-group">';
                                                echo '<div class="col col-md-3"><label for="email-input" class=" form-control-label">price</label></div>';
                                                echo '<div class="col-12 col-md-9"><input id="txt_price" value="' . $product['price'] . '" name="txt_price" class="form-control" require></div>';
                                                echo '</div>';
                                                echo ' <div class="row form-group">';
                                                echo '<div class="col col-md-3"><label for="password-input" class=" form-control-label">Type</label></div>';
                                                echo '<div class="col-12 col-md-9"><input  id="txt_type" value="' . $product['type_id'] . '" name="txt_type" class="form-control"></div>';
                                                echo '</div>';
                                                echo '</div>';
                                                echo ' <div class="row form-group">';
                                                echo '<div class="col col-md-3"><label for="password-input" class=" form-control-label">Quantity</label></div>';
                                                echo '<div class="col-12 col-md-9"><input  id="txt_quantily" value="' . $product['quantily'] . '" name="txt_quantily" class="form-control"></div>';
                                                echo '</div>';

                                                echo ' <div class="row form-group"hidden>';
                                                echo '<div class="col col-md-3"><label for="password-input" class=" form-control-label">Status</label></div>';
                                                echo '<div class="col-12 col-md-9"><input  id="txt_status" value="' . $product['status'] . '" name="txt_status" class="form-control"></div>';
                                                echo '</div>';
                                                echo '<button type="submit"  name="action_pr" value="update" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> Update';
                                                echo '</button>';

                                                echo '</div>';
                                                echo '</form>';
                                            }
                                        }
                                    } catch (PDOException $e) {
                                        echo "Error: " . $e->getMessage();
                                    }
                                    $conn = null;
                                    ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
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