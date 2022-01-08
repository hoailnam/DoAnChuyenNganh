
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
        <!--================Single Product Area =================-->
        <div class="product_image_area">
            <div class="container">
                
                <?php
                include '../utils/MySQLUtil.php';
                $dbCon = new MySQLUtil();
                $param = array();
                $query ="";
                if (isset($_GET['product_id'])) {
                    $query = "select * from product where product_id=?";
                    $param[] = $_GET['product_id'];
                } else {
                    $query = "select * from product";
                }
                $pr= $dbCon-> getPrDetails($query, $param);
                echo '<div class="row s_product_inner">';
                echo '<div class="col-lg-6"> ';
                echo '<div class="product_img_slide owl-carousel">';
                echo '<div class="single_product_img"> ';
                echo '<img src="assets/img/gallery/' . explode(',', $pr['avtar'])[0] . '" alt="#" class="img-fluid">';
                echo '</div> ';
                echo '<div class="single_product_img">';
                echo '<img src="assets/img/gallery/' . explode(',', $pr['avtar'])[0] . '" alt="#" class="img-fluid"> ';
                echo '</div>';
                echo '<div class="single_product_img"> ';
                echo '<img src="assets/img/gallery/' . explode(',', $pr['avtar'])[0] . '" alt="#" class="img-fluid">';
                echo '</div> ';
                echo '</div>';
                echo '</div> ';
                echo '<div class="col-lg-5 offset-lg-1">';
                echo '<div class="s_product_text"> ';
                echo '<h3>' . $pr['product_name'] . '</h3>';
                echo '<h2>' . number_format($pr['price']) . ' VNĐ</h2> ';
                echo '<div class="card_area"> ';
                echo '<div class="product_count_area"> ';
                echo '<p>Quantity</p> ';
                echo '<form action="../controller/CartController.php" method="GET" >';
                echo '<input type="hidden" name="id" value="'.$pr['product_id'].'">';
                echo '<div class="product_count d-inline-block"> ';
                echo '<span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>';
                echo '<input class="product_count_item input-number" name="btn_qty" type="text" value="1" min="0" max="10"> ';
                echo '<span class="product_count_item number-increment"> <i class="ti-plus"></i></span>';
                echo '</div> ';
                echo '</div>';
                echo '<div class="add_to_cart">';
                echo '<input  type="submit" value="ADD TO CART" class="btn_3"> ';
                echo '</div>';
                echo '</form>';
                echo '</div> ';
                echo '</div>';
                echo '</div> ';
                echo '</div>';
                ?>

            </div>
        </div>

        <!--================End Single Product Area =================-->
        <!-- subscribe part here -->
        <div class="video-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="video-wrap">
                            <div class="play-btn "><a class="popup-video" href="https://www.youtube.com/watch?v=KMc6DyEJp04"><i class="fas fa-play"></i></a></div>
                        </div>
                    </div>
                </div>
                <!-- Arrow -->
                <div class="thumb-content-box">
                    <div class="thumb-content">
                        <h3>Next Video</h3>
                        <a href="#"> <i class="flaticon-arrow"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- subscribe part end -->
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

    <?php include 'layout/scriptpage.php'; ?>

</body>

</html>