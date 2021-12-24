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
                                <h2>About Us</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!-- About Details Start -->
        <div class="about-details section-padding30">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-1 col-lg-8">
                        <?php
                        include '../utils/MySQLUtil.php';
                        $dbCon = new MySQLUtil();
                        $query = 'SELECT * FROM about';
                        $dbCon->getAbout($query);
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- About Details End -->
        <!--? Video Area Start -->
        <div class="video-area mb-100">
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
        <!-- Video Area End -->

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