<?php 
require('data/connect.php');
require('data/session.php');
require('layouts/app_top');
if(!sessionRedirect('2', 'designation_id'))
{
  header('Location:index.php');
}
?>

<body>
<div class="view full-page-intro" >
  <!-- Navbar -->
  <?php
 include('layouts/adminmenu.php');
 ?>
  <!-- Navbar -->

  <div class="main">
      <!-- Content -->
      <div class="container">

        <!--Grid row-->
        <div class="row wow fadeIn">


          <!--Grid column-->
          <div class="offset-4 col-md-4 mb-4">

            <!--Card-->
            <div class="card">

              <!--Card content-->
              <div class="card-body">

                <!-- Form -->
                <form name="" id="login" method="post" action="data/admindata.php" class="mt-5">
                  <!-- Heading -->
                  
                  <input type="text" hidden value="servicetype" name="type">
                  <h3 class="dark-grey-text text-center">
                    <strong>Add Service Type</strong>
                  </h3>
                  <hr>
                  <div class="md-form">                  
                    <input type="text" id="stype" class="form-control validate" name="stype" data-type="servicetype" placeholder="Service Type">
                    <!-- <label for="form3">District Name</label> -->
                  </div>
                  <div class="text-center">
                    <input type="submit" class="btn btn-indigo" value="ADD"> 
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
    require('layouts/specialapp_end');
 ?>
 </div>
</body>

</html>
