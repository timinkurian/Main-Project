<?php
require('data/connect.php');
require('data/session.php');
require('layouts/app_top');
if (!sessionRedirect('3', 'designation_id')) {
  $_SESSION['user_id'] = '';
  $_SESSION['designation_id'] = '';
  session_destroy();
  header('Location:index.php');
}
?>

<body>
  <!-- <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar"> -->
  <?php
  include('layouts/servicemenu.php');
  ?>
  <!-- </nav> -->
  <!-- Navbar -->
  <!-- <nav>

<ul id='menu'>
  <li><a class='home' href='sevricecenterhome.php'>Home</a></li>
  
  <li><a class='prett' href='#' title='Services'>Services</a>
    <ul class='menus'>
    <li><a href='addservicetypes.php' title='stypes'  data-type="stypes" >Add Service Types</a></li>
    <li><a href='Addservicescheme.php' title='schemes'  data-type="schemes" >Add Schemes</a></li>
      <li><a href='' title='schemes' class="cntr-nav" data-type="viewschemes">View Schemes</a></li>
    </ul>
  </li> 
  <li><a class='prett' href='#' title='Appointment'>Appointment</a>
    <ul class='menus'>
    <li><a href='' title='View Appointments' class="cntr-nav" data-type="viewappointment">View Appointment</a></li>
    <li><a href='' title='Started works' class="cntr-nav" data-type="startedworks">Started Works</a></li>
    <li><a href='leave.php' title='Leave Management' data-type="leave">Leave Management</a></li>
    </ul>
  </li>
  <li><a class='menus' href="components/logout.php">Logout</a></li>

</ul>
</nav> -->

  <!-- Full Page Intro -->
  <div id="pageData" class="view full-page-intro " style="background-image: url('realdeal.jpg'); background-repeat: repeat; background-size: cover;">

    <!-- Mask & flexbox options-->
    <div class="mask d-flex justify-content-center align-items-center">

      <!-- Content -->
      <div class="container-fluid">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div class="col-md-8">
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
  require('layouts/app_end');
  ?>
</body>

</html>