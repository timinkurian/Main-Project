<?php 
require('layouts/app_top');
// require('data/connect.php');
// require('data/session.php');
// if(!getSession('user_id'))
// {
//   header('Location:index.php');
// }
?>
<body>

  <!-- Navbar -->
 <?php
 include('layouts/usermenu.php');
 ?>
  <!-- Navbar -->
  

  <!-- Full Page Intro -->
  <div  id="pageData"  class="view full-page-intro" >

    <!-- Mask & flexbox options-->
    <div class="mask d-flex justify-content-center align-items-center">

      <!-- Content -->
      <div class="container-fluid">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div  class="col-md-12">
          <h4>
                Welcome! User 
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
