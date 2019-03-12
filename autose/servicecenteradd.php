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

 <!--style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg'); background-repeat: no-repeat; background-size: cover-->
<div class="view full-page-intro";">

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="components/logout.php">
        <strong>RDC</strong>
      </a>

        </ul>

     

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
                  
                  <input type="text" hidden value="centerreg" name="type">
                  <h3 class="dark-grey-text text-center">
                    <strong>Registration</strong>
                  </h3>
                  <hr>

                  <div class="md-form">                  
                    <input type="text" id="name" class="form-control validate" name="cname" data-type="model">
                    <label for="form3">Center name</label>
                  </div>
                  <div class="md-form">
                    <input type="text" id="licno" class="form-control validate" name="licno" data-type="lic" maxlength=4 >
                    <label for="form2">Licence number</label>
                  </div>
                  <div class="md-form">                  
                  <select name="types" class="form-control" required>
                  <option value="">Choose Type of Center</option>
                  <option value="Authorized">Authorized</option>
                 <!-- <option value="Unauthorized">Unauthorized</option>-->
                  </select>
                  </div>
                  <div class="md-form">                  
                  <select name="brand" class="form-control" required >
                      <?php
                      include('data/brand.php')
                      ?>
                    </select>
                  </div>
                 <!-- <div class="md-form">                  
                    <input type="text" id="form3" class="form-control" name="email">
                    <label for="form3">Email</label>
                  </div>-->
                  <div class="md-form">                  
                    <input type="tel" id="mobno" class="form-control validate" name="mobno" maxlength=10>
                    <label for="form3">Mobile Number</label>
                  </div>
                  <div class="md-form" class="form-control" required>                  
                   <!--<input type="" id="form3" class="form-control" name="fanme"> -->
                   <select name="district" class="form-control" required>
                       <?php
                        include('data/districts.php');
                       ?>
                    </select >
                    <label for="form3"></label>
                  </div>
                  <div class="md-form">                  
                    <input type="text" id="place" class="form-control validate" name="place" data-type="model">
                    <label for="form3">place</label>
                  </div>
                 
                  <div class="md-form">                  
                    <input type="file" id="certificate" class="form-control " name="certificate" required>
                    <label for="form3"></label>
                  </div>
              <!--
                  <div class="md-form">                  
                    <input type="email" id="email" class="form-control validate" name="email">
                    <label for="form3">Email</label>
                  </div>
                  <div class="md-form">                  
                    <input type="password" id="password" class="form-control validate" name="pswd">
                    <label for="form3">password</label>
                  </div>
                  <div class="md-form">                  
                    <input type="password" id="password-confirm" class="form-control validate" name="cpswd">
                    <label for="form3">password</label>
                  </div> -->
                  <div class="text-center">
                    <input type="submit" class="btn btn-indigo" value="Register"> 
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
