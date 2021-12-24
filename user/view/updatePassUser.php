<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php include 'layout/headerpage.php'; ?>
</head>

<body>
    <main>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Update User</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!--================login_part Area =================-->
        <section class="login_part section_padding ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_text text-center">
                            <div class="login_part_text_iner">
                                <h2>New to our Shop?</h2>
                                <p>There are advances being made in science and technology
                                    everyday, and a good example of this is the</p>
                                <a href="login.php" class="btn_3">Login</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>Welcome Back ! <br>
                                    Please Sign in now</h3>
                                <form class="row contact_form" action="../controller/UserController.php" method="POST" novalidate="novalidate">
                                    <div class="col-md-12 form-group p_star">
                                        <input type="email" class="form-control" id="login_email" name="login_email" value="" placeholder="Email">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="login_password" name="login_password" value="" placeholder="Password">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="new_password" name="new_password" value="" placeholder="New-Password">
                                    </div>
                                    <div class="col-md-12 form-group">


                                        <button type="submit" id="btn_test" name="user_group_action" value="user_update" class="btn_3">
                                            Update
                                        </button>

                                        <a class="lost_pass" href="#">forget password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================login_part end =================-->
    </main>
    <?php include 'layout/scriptpage.php'; ?>

</body>

</html>