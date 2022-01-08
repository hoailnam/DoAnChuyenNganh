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

    <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

    <!--**********************************
    
            Sidebar start
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
                <a href="product-portfolio-create.php" type="button" class="btn btn-primary" style="margin:30px" class="fa fa-plus"><i class="fa fa-plus">&ensp;New Type</i></a>
              </div>
            </li>
            <li class="icons dropdown">

              <?php include '../view/layout/menupage.php' ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
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

                          <th>id</th>
                          <th>Name</th>
                          <th>Setting</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tbody>
                        <?php
                        $page = 1;
                        $param = array();
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "doan";
                        try {
                          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                          $stmt = $conn->prepare("SELECT `type_id`, `type_name` FROM `type`");
                          $stmt->execute();
                          $product = $stmt->fetchALL(PDO::FETCH_ASSOC);
                          if ($product) {
                            foreach ($product as $product) {
                              echo '<form action="../controller/product-portfolio-Controller.php" method="POST" enctype="multipart/form-data" class="form-horizontal"';
                              echo '<tr>';
                              echo '<td name="txt_id">' . $product['type_id'] . '</td>';
                              echo '<td name="txt_name"> <span class = "name">' . $product['type_name'] . '</span> </td>';
                              echo '<td width="50px">';
                              echo '<a href="product-portfolio-edit.php?edit=' . $product['type_id'] . '" type = "button" class = "btn btn-success"><i class = "fa fa-edit"></i> Sửa</a>';
                              echo '</td>';
                              echo '<td width="50px">';
                              echo '<a href="../controller/product-portfolio-Controller.php?delete=' . $product['type_id'] . '" type = "button" class = "btn btn-danger" "  ><i class = "fa fa-times"></i> Xóa</a>';
                              echo '</td>';
                              echo '</tr>';
                              echo '</form>';
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
        <div class="custom-pagination">
          <ul class="pagination">
            <?php
            include '../utils/MYSQLUtils.php';
            $dbCon = new MYSQLUtil();
            $sql = "select count(*) from type";
            $sotrang = $dbCon->getPage($sql, $param);
            for ($i = 1; $i <= $sotrang; $i++)
              echo ' <li class="page-item"><a class="page-link" href="product-portfolio.php?page=' . $i . '">' . $i . '</a></li> ';
            ?>
          </ul>
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