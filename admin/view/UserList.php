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
                <a href="Usercreatepage.php" type="button" class="btn btn-primary" style="margin:30px" class="fa fa-plus"><i class="fa fa-plus">&ensp;New User</i></a>
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
                          <th>Image</th>
                          <th>id</th>
                          <th>Name</th>
                          <th>email</th>
                          <th>phone</th>
                          <th>address</th>
                          <th>Setting</th>
                        </tr>
                      </thead>
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
                          $stmt = $conn->prepare("SELECT `user_id`, `user_name`, `user_email`, `user_pass`, `user_phone`, `user_address` FROM `user`");
                          $stmt->execute();
                          $user = $stmt->fetchALL(PDO::FETCH_ASSOC);
                          if ($user) {

                            foreach ($user as $user) {
                              echo '<form action="../controller/usersController.php" method="POST" enctype="multipart/form-data" class="form-horizontal"';
                              echo '<tr>';
                              echo '<td class = "avatar">';
                              echo '<div class = "round-img">';
                              echo '<a href = "#"><img class = "rounded-circle" src = "images/1.jpg" alt = ""></a>';
                              echo '</div>';
                              echo '</td>';
                              echo '<td name="txt_id">' . $user['user_id'] . '</td>';
                              echo '<td name="txt_name"> <span class = "name">' . $user['user_name'] . '</span> </td>';
                              echo '<td name="txt_email"> <span class = "price">' . $user['user_email'] . '</span> </td>';
                              echo '<td name="txt_phone">';
                              echo '<span class = "type phone">' . $user['user_phone'] . '</span>';
                              echo '</td>';
                              echo '<td name="txt_adress"> <span class = "adress">' . $user['user_address'] . '</span> </td>';
                              echo '<td width="50px">';
                              echo '<a href="userseditpage.php?edit=' . $user['user_id'] . '" type = "button" class = "btn btn-success"><i class = "fa fa-edit"></i> S???a</a>';
                              echo '</td>';
                              echo '<td width="50px">';
                              echo '<a href="../controller/usersController.php?delete=' . $user['user_id'] . '" type = "button" class = "btn btn-danger" "  ><i class = "fa fa-times"></i> X??a</a>';
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
            $sql = "select count(*) from user";
            $sotrang = $dbCon->getPage($sql, $param);
            for ($i = 1; $i <= $sotrang; $i++)
              echo ' <li class="page-item"><a class="page-link" href="UserList.php?page=' . $i . '">' . $i . '</a></li> ';
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