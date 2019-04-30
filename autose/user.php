<?php 
require('data/connect.php');
require('data/session.php');
require('layouts/app_top');
if(!sessionRedirect('1', 'designation_id'))
{
  $_SESSION['user_id'] = '';
  $_SESSION['designation_id'] = '';
  session_destroy();
  header('Location:index.php');
}
?>
<body>

  <!-- Navbar -->
 <?php
 include('layouts/usermenu.php');
 ?>
  <!-- Navbar -->
  

  <!-- Full Page Intro -->
  <div  id="pageData"  class="view full-page-intro" >
<!-- video -->
<div class="background-wrap">
			<video id="video-bg-elem" preload="auto" autoplay="true" loop="loop" muted="muted"> 
				<source src="traffic.mp4" type="video/mp4">
				Video not supported
			</video>          
		</div>
    <!-- Mask & flexbox options-->
    <div class="mask d-flex justify-content-center align-items-center">

      <!-- Content -->
      <div class="container-fluid">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div  class="col-md-12">
          <h4>
                Welcome! User <br>
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
