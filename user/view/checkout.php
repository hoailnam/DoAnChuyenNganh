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
                <h2>Checkout</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================Checkout Area =================-->
    <section class="checkout_area section_padding">
      <div class="container">


        <div class="billing_details">
          <form class="row contact_form" action="../controller/PayController.php" method="post" novalidate="novalidate">
            <div class="row">
              <div class="col-lg-6">
                <h3>Billing Details</h3>
                <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                  <div class="col-md-12 form-group p_star">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" />
                  </div>
                  <div class="col-md-6 form-group p_star">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" />
                  </div>
                  <div class="col-md-6 form-group p_star">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" />
                  </div>
                  <div class="col-md-12 form-group p_star">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
                  </div>
                  <div class="col-md-12 form-group">
                    <textarea class="form-control" id="note" name="note" rows="1" placeholder="Order Notes"></textarea>
                  </div>
                </form>
              </div>
              <div class="col-lg-6">
                <?php
                $sum = 0;

                echo '<div class="order_box">';
                echo '<h2>Your Order</h2>';
                echo '<ul class="list"> ';
                echo '<li>';
                echo '<a href="#">Product ';
                echo '<span>Total</span>';
                echo '</a> ';
                echo '</li>';

                foreach ($_SESSION['cart'] as $key => $value) :
                  echo '<li> ';
                  echo '<a href="#">' . $value['product_name'] . ' <span class="middle">x ' . $_SESSION['cart'][$key]['qty_value'] . '</span><span class="last">' . number_format($value['price'] * $_SESSION['cart'][$key]['qty_value']) . ' VND</span></a> ';
                  echo '</li> ';
                  $sum += $value['price'] * $_SESSION['cart'][$key]['qty_value'];
                endforeach;
                echo '</ul> ';
                echo '<ul class="list list_2">';
                echo '<li> ';
                echo '<a href="#">Total <span class="last">' . number_format($sum) . ' VND</span> ';
                echo '</a>';
                echo '<input name="thanhtien" type="text" hidden value="'.$sum.'">';
                echo '</li> ';
                echo '</ul>';
                echo '</br> ';
                echo ' <button type="submit"  name="order_action" value="order" class="btn_3">Đặt Hàng</button>';
                echo '</div>';

                ?>
                
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!--================End Checkout Area =================-->
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