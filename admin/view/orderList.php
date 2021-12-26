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
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tbody>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "doan";
                        try {
                          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                          $stmt = $conn->prepare("SELECT `order_id`, `user_id`, order_name,order_address,order_phone,`order_date`, `order_status`, `amount` FROM `order`");
                          $stmt->execute();
                          $product = $stmt->fetchALL(PDO::FETCH_ASSOC);
                          if ($product) {
                            foreach ($product as $product) {

                              echo '<tr>';
                              echo '<td >' . $product['order_id'] . '</td>';
                              echo '<td ><span>' . $product['order_date'] . '</span> </td>';
                              echo '<td ><span>' . $product['order_name'] . '</span> </td>';
                              echo '<td>';
                              echo '<span>' . $product['order_phone'] . '</span>';
                              echo '</td>';
                              echo '<td ><span >' . $product['order_address'] . '</span> </td>';
                              echo '<td ><span >' . number_format($product['amount'], 0, ",", ".") . ' VND</span> </td>';
                              echo '<td ><span >' . $product['order_status'] . '</span> </td>';
                              echo '<td width="30px">';
                              echo '<a href="../controller/OrderController.php?order_id=' . $product['order_id'] . '" type = "button" class = "btn btn-success"><i class = "fa fa-edit"></i> Sửa</a>';
                              echo '</td>';
                              if ($product['order_status'] == "Chưa giao") {
                                echo '<td width="30px">';
                                echo '<a href="../controller/OrderController.php?order_id=' . $product['order_id'] . '&action=duyet" type = "button" class = "btn btn-success"><i class = "fa fa-edit"></i> Duyệt</a>';
                                echo '</td>';
                              }else{
                                echo '<td width="30px">';
                                echo '<a href="../controller/OrderController.php?order_id=' . $product['order_id'] . '&action=delete" type = "button" class = "btn btn-danger" "  ><i class = "fa fa-times"></i> Xóa</a>';
                                echo '</td>';
                              }
                              echo '</tr>';
                            }
                          }
                        } catch (PDOException $e) {
                          echo "Error: " . $e->getMessage();
                        }
                        $conn = null;
                        ?>


                      </tbody>

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