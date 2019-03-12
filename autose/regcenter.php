<?php 
require('layouts/app_top');
session_start();
if(isset($_SESSION['logid'])){
    switch($_SESSION['utype']){
        case '1':
            header('location:user.php');
            break;
        default:
            break;
    }
}
?>

<body>
<!--style="background-image: url('userimg.png'); background-repeat: no-repeat; background-size: cover;"-->
<div class="view full-page-intro" >

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="index.php">
        <strong>RDC</strong>
      </a>

   
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->

  <div class="main">
      <!-- Content -->
      <div class="container">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div class="offset-4 col-md-4 mb-4" ">

            <!--Card-->
            <div class="card">

              <!--Card content-->
              <div class="card-body">

                <!-- Form -->
                <form name="" id="login" method="post" action="data/data.php" enctype="multipart/form-data" class="mt-5">
                  <!-- Heading -->
                  
                  <input type="text" hidden value="reguser" name="type">
                  <h3 class="dark-grey-text text-center">
                    <strong>Registration</strong>
                  </h3>
                  <hr>

                 <div class="md-form">                  
                  <select name="designation" class="form-control">
                      <?php
                      include('data/susertype.php')
                      ?>
                    </select>
                  </div>
                  <div class="md-form">                  
                    <input type="email" id="email" class="form-control validate" name="email">
                    <label for="form3">Email</label>
                  </div>
                  <div class="md-form">                  
                    <input type="password" id="password" class="form-control validate" name="pswd">
                    <label for="form3">Password</label>
                  </div>
                  <div class="md-form">                  
                    <input type="password" id="password-confirm" class="form-control validate" name="cpswd">
                    <label for="form3">Confirm Password</label>
                  </div>
                  <div class="text-center">
                    <input type="submit" class="btn btn-indigo" value="Next"> 
                    <hr>
                <!-- <fieldset class="form-check">
                      <input type="checkbox" class="form-check-input" id="checkbox1">
                      <label for="checkbox1" class="form-check-label dark-grey-text">Rememer Me</label>-->
                    </fieldset>
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

 <?php
    require('layouts/app_end');
 ?>
 </div>
</body>

</html>
