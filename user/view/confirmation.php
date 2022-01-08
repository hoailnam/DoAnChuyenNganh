<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <?php include 'layout/headerpage.php'; ?>
</head>
<?php include "../dao/OrderDao.php" ?>
<?php
$history = OrderDao::getOrder($_GET['order_id']);
$details = OrderDao::getDetailsOrder($_GET['order_id']);
?>

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
                <h2>Confirmation</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================ confirmation part start =================-->
    <section class="confirmation_part section_padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="confirmation_tittle">
              <span>Thank you. Your order has been received.</span>
            </div>
          </div>
          <div class="col-lg-6 col-lx-4">
            <div class="single_confirmation_details">
              <h4>order info</h4>
              <ul>
                <li>
                  <p>order number</p><span> : <?php echo $history[0]['order_id'] ?></span>
                </li>
                <li>
                  <p>data</p><span> : <?php echo $history[0]['order_date'] ?></span>
                </li>
                <li>
                  <p>total</p><span> : <?php echo number_format($history[0]['amount'], 0, ",", ".") ?> VND</span>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-6 col-lx-4">
            <div class="single_confirmation_details">
              <h4>shipping Address</h4>
              <ul>
                <li>
                  <p>Address</p><span> : <?php echo $history[0]['order_address'] ?></span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="order_details_iner">
              <h3>Order Details</h3>
              <table class="table table-borderless">
                <?php

                echo '<thead>';
                echo '<tr> ';
                echo '<th scope="col" colspan="2">Product</th>';
                echo '<th scope="col">Quantity</th> ';
                echo '<th scope="col">Total</th>';
                echo '</tr> ';
                echo '</thead>';
                foreach ($details as $i => $pr) :
                echo '<tbody> ';
                echo '<tr>';
                  echo '<th colspan="2"><span>' . $pr['product_name'] . '</span></th> ';
                  echo '<th>x ' . $pr['quaility'] . ' </th>';
                  echo '<th> <span>' . number_format($pr['price'], 0, ",", ".") . ' VND</span></th> ';
                echo '</tr>';
                echo '</tbody> ';
                endforeach;
                echo '<tfoot>';
                echo '<tr>';
                echo '<th scope="col" colspan="3">Total</th>';
                echo '<th scope="col">' . number_format($history[0]['amount'], 0, ",", ".") . ' VND</th> ';
                echo '</tr>';
                echo '</tfoot>';
                ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ confirmation part end =================-->
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