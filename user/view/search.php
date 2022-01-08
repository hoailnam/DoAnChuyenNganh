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
    <?php
    include('../utils/ConnectDB.php');
    $paraTim = array();
    $trang = 1;
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $search1 = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $search);
    if ($search1 == '') {
        echo '<script language="javascript">';
        echo 'alert("Không được để trống ")';
        echo '</script>';
    }
    if (isset($_GET['submitTim'])) {
        $sql = "SELECT * FROM product WHERE product_name LIKE '%$search1%'";
        $sql .= ' limit ' . ($trang - 1) * 6 . ',' . 6;
        $paraTim[] = $search1;
        $stmt = $conn->prepare($sql);
        //$stmt->execute($paraTim);
        $xe = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    ?>

    <section class="new-product-area section-padding30">
        <h5 class="latest-product">KẾT QUẢ TÌM: <?php echo $search; ?></h5>
        <div class="container">
            <!-- Section tittle -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-tittle mb-70">
                        <h2>New Arrivals</h2>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <?php 
                if(isset($_GET['submitTim'])){
                    foreach($xe as $key  =>$value){
                        echo '<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">';
                        echo '<div class="single-popular-items mb-50 text-center"> ';
                        echo '<div class="popular-img">';
                        echo '<a href="product_details.php?product_id=' . $value['product_id'] . '"><img src="assets/img/gallery/' . explode(',', $value['avtar'])[0] . '" alt=""></a> ';
                        echo '<div class="img-cap">';
                        echo '<span>Add to cart</span> ';
                        echo '</div>';
                        echo '<div class="favorit-items"> ';
                        echo '<span class="flaticon-heart"></span>';
                        echo '</div> ';
                        echo '</div>';
                        echo '<div class="popular-caption"> ';
                        echo '<h3><a href="product_details.php?product_id=' . $value['product_id'] . '">' . $value['product_name'] . '</a></h3>';
                        echo '<span>' . number_format($value['price']) . ' VND</span> ';
                        echo '</div>';
                        echo '</div> ';
                        echo '</div>';
                    }
                }


                
                ?>

            </div>
        </div>
    </section>

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