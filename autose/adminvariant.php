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
<!--style="background-image: url('userimg.png'); background-repeat: no-repeat; background-size: cover;"-->
<div class="view full-page-intro"  style="background-image: url('realdeal.jpg'); background-repeat: repeat; background-size: cover;">

  <!-- Navbar -->
  <?php
 include('layouts/adminmenu.php');
 ?>

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
                <form name="" id="login" method="post" action="data/admindata.php" enctype="multipart/form-data" class="mt-5">
                  <!-- Heading -->
                  
                  <input type="text" hidden value="newvariant" name="type">
                  <h3 class="dark-grey-text text-center">
                    <strong>ADD NEW VARIANT</strong>
                  </h3>
                  <hr>
                  <div class="md-form">
                  <select class="form-control md-form" name="brand" id="brand" required>
                     <?php
                        include('data/brand.php');
                     ?>
                    </select >
                  </div>
                  <div class="md-form">                  
                     <!--<input type="" id="form3" class="form-control" name="fanme"> -->
                    <select class="form-control" name="model" id="model" required>
                     echo '<option value="">Choose Model</option>'
                    </select >
                </div>
                <div class="md-form">                  
                    <select class="form-control" name="fuel" id="fuel" required>
                    <?php
                      //echo '<option value="">Choose Model</option>';
                        include('data/fuel.php');
                     ?>
                    </select >
                    </div>
                  <div class="md-form">
                <input type="text" class="form-control validate" name="variant" id="variant" data-type="name" placeholder="Variant Name" required>                   
                </div>
                  
                  <div class="text-center">
                    <input type="submit" class="btn btn-indigo" value="Add"> 
                    <hr>

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
