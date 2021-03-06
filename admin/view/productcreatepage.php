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
                                    <form action="../controller/productController.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">ID</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="txt_id" name="txt_id" class="form-control"></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">NAME</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="txt_name" name="txt_name" class="form-control"></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">PRICE</label></div>
                                            <div class="col-12 col-md-9"><input id="txt_price" name="txt_price" class="form-control" require></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">TYPE</label></div>
                                            <div class="col-12 col-md-9" style="width:200px;">
                                                <select name="txt_type">
                                                    <?php
                                                    include '../dao/ProductDao.php';
                                                    $tp = ProductDao::gettype();
                                                    foreach ($tp as $type) :
                                                        echo '<option value="' . $type['type_id'] . '">' . $type['type_name'] . '</option>';
                                                    endforeach
                                                    ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">QUANTITY</label></div>
                                            <div class="col-12 col-md-9"><input id="txt_qty" name="txt_qty" class="form-control"></div>
                                        </div>
                                        <div class="row form-group" hidden>
                                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">STATUS</label></div>
                                            <div class="col-12 col-md-9"><input id="txt_stt" name="txt_stt" class="form-control"></div>
                                        </div>
                                        <div class="row form-group">

                                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Avatar</label></div>
                                            <div class="col-12 col-md-9"><input type="file" name="fileToUpload" id="fileToUpload" class="form-control-file"></div>

                                        </div>
                                        <div>
                                            <button name="save" value="save" type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Create
                                            </button>

                                        </div>
                                    </form>
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