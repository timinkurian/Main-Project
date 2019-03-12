<?php 
require('layouts/app_top');
require('data/session.php');

if(isset($_SESSION['user_id'])){
  switch($_SESSION['designation_id']){
      case '1':
          header('location:user.php');
          break;
      default:
          break;
  }
}



// if(!getSession('designation_id')){
//             header('location:user.php');  some problems
//     }
?>

<body>
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="index.php">
        <strong>RDC</strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">

        <!--  <li class="nav-item">
            <a class="nav-link" href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">About RDC</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://mdbootstrap.com/getting-started/" target="_blank">Gallery</a>
          </li>-->
          <!--
          <li class="nav-item">
            <a class="nav-link" href=servicecenteradd.php target="_blank">Register your service center</a>
          </li>
          -->
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a href="https://www.facebook.com/timinkurian" class="nav-link" target="_blank">
              <i class="fa fa-facebook"></i>
            </a>
          </li>
          <!--
          <li class="nav-item">
            <a href="https://twitter.com/MDBootstrap" class="nav-link" target="_blank">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="nav-link border border-light rounded"
              target="_blank">
              <i class="fa fa-github mr-2"></i>MDB GitHub
            </a>
          </li>
          -->
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->

  <!-- Full Page Intro -->
  <div class="view full-page-intro" >
<!-- video -->
  <div class="background-wrap">
			<video id="video-bg-elem" preload="auto" autoplay="true" loop="loop" muted="muted"> 
				<source src="video.mp4" type="video/mp4">
				Video not supported
			</video>          
		</div>



    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

      <!-- Content -->
      <div class="container">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div class="col-md-8 mb-4 white-text text-center text-md-left">

            <h1 class="display-4 font-weight-bold">Real Deal Cars</h1>

            <hr class="hr-light">

            <p>
              <strong>Welcome to Real Deal Cars </strong>
            </p>

            <p class="mb-4 d-none d-md-block">
              <strong>It's a world of Cars </strong>
            </p>

            <a href=regcenter.php class="btn btn-indigo btn-lg">Register your service center
              <i class="fa fa-graduation-cap ml-2"></i>
            </a>

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-4 mb-4">

            <!--Card-->
            <div class="card">

              <!--Card content-->
              <div class="card-body">

                <!-- Form -->
                <form name="" id="login" method="post" action="data/data.php">
                  <!-- Heading -->
                  <div class="alert alert-box" style="display:none">
                    <div class="alert-data"></div>
                  </div>
                  <input type="text" hidden value="login" name="type">
                  <h3 class="dark-grey-text text-center">
                    <strong>Sign In:</strong>
                  </h3>
                  <hr>

                  <div class="md-form">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input type="email" id="form3" class="form-control" name="username">
                    <label for="form3">user name</label>
                  </div>
                  <div class="md-form">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <input type="password" id="form2" class="form-control" name="password">
                    <label for="form2">Password</label>
                  </div>



                  <div class="text-center">
                    <input type="submit" class="btn btn-indigo" value="Login">
                    <hr>
                    <!-- <fieldset class="form-check">
                      <input type="checkbox" class="form-check-input" id="checkbox1">
                      <label for="checkbox1" class="form-check-label dark-grey-text">Rememer Me</label>
                    </fieldset>-->
                  </div>
                  <div class="md-form">

                    <a class="nav-link" align="center" href="reguser.php" target="">New user? Register here</a>
                    <a class="nav-link" align="center" href="forget.php" target="">Forgot password?</a>
                  </div>

                </form>
                <!-- Form -->

              </div>

            </div>
            <!--/.Card-->

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