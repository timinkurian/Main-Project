<?php
require('data/connect.php');
require('data/session.php');
require('layouts/app_top');
if (!sessionRedirect('2', 'designation_id')) {
  $_SESSION['user_id'] = '';
  $_SESSION['designation_id'] = '';
  session_destroy();
  header('Location:index.php');
}
?>

<body>
  <!-- Navbar -->
  <?php
  include('layouts/adminmenu.php');
  ?>
  <!-- <nav>
  <ul id='menu'>
    <li><a class='home' href='adminhome.php'>Home</a></li>
    <li><a class='prett' href='#' title='Service center'>Service center</a>
      <ul class='menus'>
      <li><a href='' title='Approval' class="adm-nav" data-type="approval" >approval</a></li>
        <li><a href='' title='View all' class="adm-nav" data-type="view">View All</a></li>
      </ul>
    </li>
    <li><a class='prett' href='#' title='Brand'>Brand</a>
      <ul class='menus'>
      <li><a href='adminbrand.php' title='New Brand' data-type="addbrand">New brand</a></li>
      <li><a href='#' title='List all' class="adm-nav" data-type="viewbrand">View All</a></li>
      </ul>
      <li><a class='prett' href='#' title='Car'>Car</a>
      <ul class='menus'>
      <li><a href='' title='Approve Car' class="adm-nav" data-type="Caraprove">Aprove or Reject</a></li>
      <li><a href='#' title='View Car' class="adm-nav" data-type="viewcar">View All</a></li>
      </ul>
    </li>
    <li><a class='prett' href='#' title='District'>District</a>
      <ul class='menus'>
      <li><a href='districtadd.php' title='New District' data-type="district">Add District</a></li>
      <li><a href='' title='List all' class="adm-nav" data-type="viewdistrict">View Districts</a></li>
      </ul>
    </li>
    <li><a class='prett' href='#' title='Users'>Users</a>
      <ul class='menus'>
      <li><a href='' title='New Brand' class="adm-nav" data-type="viewuser">View Users</a></li>
      </ul>
    </li>
    <li><a class='menus' href="components/logout.php">Logout</a></li>
 
  </ul>
</nav> -->


  <!-- Full Page Intro -->
  <div id="pageData" class="view full-page-intro" style="background-image: url('realdeal.jpg'); background-repeat: repeat; background-size: cover;">


    <!-- Mask & flexbox options-->
    <div class="mask d-flex justify-content-center align-items-center">

      <!-- Content -->
      <div class="container-fluid">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div id="pageData" class="col-md-12">
            <h4 style="font-size: -webkit-xxx-large;font-style: normal;font-family: fantasy;">
              Welcome to real deal cars! <br>
              You Are In The World of Cars

            </h4>
          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </div>
      <!-- Content -->

    </div>
    <!-- Mask & flexbox options-->

  </div>
  <!-- Full Page Intro -->

  <?php
  require('layouts/specialapp_end');
  ?>
</body>

</html>