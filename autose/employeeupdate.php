<?php 
require('layouts/app_top');
require('data/session.php');


if(!getSession('user_id'))
{
  header('Location:index.php');
}
?>

<body>
<!--style="background-image: url('userimg.png'); background-repeat: no-repeat; background-size: cover;"-->
<div class="view full-page-intro" >

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="components/logout.php">

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
          <div class="offset-4 col-md-4 mb-4" >

            <!--Card-->
            <div class="card">

              <!--Card content-->
              <div class="card-body">

                <!-- Form -->
                <form name="" id="login" method="post" action="data/employeedata.php" enctype="multipart/form-data" class="mt-5">
                  <!-- Heading -->
                  
                  <input type="text" hidden value="employeereg" name="type">
                  <h3 class="dark-grey-text text-center">
                    <strong>Profile </strong>
                  </h3>
                  <hr>

                  <div class="md-form">                  
                    <input type="text" id="fname" class="form-control validate" name="fname" data-type="name" required>
                    <label for="form3">First Name</label>
                  </div>
                <!--  <div class="md-form">
                    <input type="text" id="mname" class="form-control validate" name="mname">
                    <label for="form2">Middle Name</label>
                  </div>-->
                  <div class="md-form">                  
                    <input type="text" id="lname" class="form-control validate" name="lname" data-type="name" required >
                    <label for="form3">Last Name</label>
                  </div>
                 
                  <div class="md-form">                  
                    <input type="tel" id="mobno" class="form-control validate" name="mobno" required maxlength=10 >
                    <label for="form3">Mobile Number</label>
                  </div>
                  <div class="md-form">                  
                   <!--<input type="" id="form3" class="form-control" name="fanme"> -->
                   <select name="district" class="form-control validate" required>
                       <?php
                        include('data/districts.php');
                       ?>
                    </select >
                    <label for="form3"></label>
                  </div>
                  <div class="md-form">                  
                    <input type="text" id="place" class="form-control validate" name="place" data-type="name" required>
                    <label for="form3">place</label>
                  </div>
                  <div class="md-form">                  
                    <input type="file" id="photo" class="form-control validate" name="photo" accept=".jpg,.jpeg,.png" required>
                    <label for="form3"></label>
                  </div>
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
