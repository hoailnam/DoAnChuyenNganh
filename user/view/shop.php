<!doctype html>
<html class="no-js" lang="zxx">

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
                                <h2>Watch Shop</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!-- Latest Products Start -->
        <section class="popular-items latest-padding">
            <div class="container">
                <div class="row product-btn justify-content-between mb-40">
                    <div class="properties__button">
                        <!--Nav Button  -->
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <?php

                                include '../utils/MySQLUtil.php';
                                $dbCon = new MySQLUtil();
                                $query = 'SELECT * FROM type';
                                $dbCon->getType($query);
                                ?>
                            </div>
                        </nav>
                        <!--End Nav Button  -->
                    </div>
                    <!-- Grid and List view -->
                    <div class="grid-list-view">
                    </div>
                    <!-- Select items -->
                    <?php
                    $page = 1;
                    $param = array();
                    $sql = "select count(*) from product";
                    $sotrang = $dbCon->getPage($sql, $param);
                    echo ' <div class="select-this">';
                    echo '<form action="#"> ';
                    echo '<div class="custom-pagination">';
                    echo '<ul class="pagination"> ';
                    if (isset($_GET['type_id']))
                        for ($i = 1; $i <= $sotrang; $i++)
                            echo ' <li class="page-item"><a class="page-link" href="shop.php?type_id=' . $_GET['type_id'] . '&page=' . $i . '">' . $i . '</a></li> ';

                    else {
                        for ($i = 1; $i <= $sotrang; $i++)
                            echo ' <li class="page-item"><a class="page-link" href="shop.php?page=' . $i . '">' . $i . '</a></li> ';
                    }
                    echo '</ul> ';
                    echo '</div>';
                    echo '</form> ';
                    echo '</div>';


                    ?>

                </div>
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                    <!-- card one -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            <?php
                            if (isset($_GET['page']))
                                $page = $_GET['page'];
                            if (isset($_GET['type_id'])) {
                                $query = "select * from product where type_id=?";
                                $param[] = $_GET['type_id'];
                            } else
                                $query = "select * from product";
                            $query .= ' limit ' . ($page - 1) * 6 . ',' . 6;
                            $list = $dbCon->getDataPr($query, $param);
                            foreach ($list as $pr) {
                                echo '<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">';
                                echo '<div class="single-popular-items mb-50 text-center"> ';
                                echo '<div class="popular-img">';
                                echo '<a href="product_details.php?product_id=' . $pr['product_id'] . '"><img src="assets/img/gallery/' . explode(',', $pr['avtar'])[0] . '" alt=""></a> ';
                                echo '<div class="img-cap">';
                                echo '<span>Add to cart</span> ';
                                echo '</div>';
                                echo '<div class="favorit-items"> ';
                                echo '<span class="flaticon-heart"></span>';
                                echo '</div> ';
                                echo '</div>';
                                echo '<div class="popular-caption"> ';
                                echo '<h3><a href="product_details.php?product_id=' . $pr['product_id'] . '">' . $pr['product_name'] . '</a></h3>';
                                echo '<span>' . number_format($pr['price']) . ' VND</span> ';
                                echo '</div>';
                                echo '</div> ';
                                echo '</div>';
                            }

                            ?>
                        </div>
                    </div>

                </div>

            </div>
            <!-- End Nav Card -->
            </div>
        </section>
        <!-- Latest Products End -->
    </main>
    <footer>
        <!-- Footer Start-->
        <?php include 'layout/footerpage.php'; ?>
        <!-- Footer End-->
    </footer>
    <!--? Search model Begin -->
    <?php include 'layout/search.php'; ?>
    <!-- Search model end -->

    <!-- JS here -->
    <!-- All JS Custom Plugins Link Here here -->
    <?php include 'layout/scriptpage.php'; ?>

</body>

</html>