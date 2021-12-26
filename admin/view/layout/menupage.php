<div class="user-img c-pointer position-relative" data-toggle="dropdown">
  <span class="activity active"></span>
  <img src="images/1.jpg" height="40" width="40" alt="">
</div>
<?php
session_start();
if (isset($_SESSION["isLogin"])) {
  echo '<div class="drop-down dropdown-profile animated fadeIn dropdown-menu">';
  echo '<div class="dropdown-content-body"> ';
  echo '<ul>';
  echo '<li>';
  echo '<a href="app-profile.html"><i class="icon-user"></i> <span>' . $_SESSION["admin_email"] . '</span></a> ';
  echo '</li>';
  echo '<li><a href="logoutpage.php"><i class="icon-key"></i> <span>Logout</span></a></li>';
  echo '</ul>';
  echo '</div>';
  echo '</div>';
} else {
  echo '<div class="drop-down dropdown-profile animated fadeIn dropdown-menu">';
  echo '<div class="dropdown-content-body"> ';
  echo '<ul>';
  echo '<li><a href="login.php"><i class="icon-key"></i> <span>Sign Up</span></a></li>';
  echo '</ul>';
  echo '</div>';
  echo '</div>';
}
