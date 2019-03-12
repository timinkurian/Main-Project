<?php 
require('layouts/app_top');
require('data/session.php');

if(isset($_SESSION['logid'])){
    switch($_SESSION['utype']){
        case '1':
            header('location:adminhome.php');
            break;
        default:
            break;
    }
}

if(!getSession('logid'))
{
  header('Location:index.php');
}
?>

<body>
<!--style="background-image: url('userimg.png'); background-repeat: no-repeat; background-size: cover;"-->
<div class="view full-page-intro" >

  <!-- Navbar -->
  <nav>

<ul id='menu'>
  <li><a class='home' href='adminhome.php'>Home</a></li>
</ul>
</nav>

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
                <form name="" id="login" method="post" action="data/admindata.php" enctype="multipart/form-data" class="mt-5">
                  <!-- Heading -->
                  
                  <input type="text" hidden value="brand" name="type">
                  <h3 class="dark-grey-text text-center">
                    <strong>ADD NEW BRAND</strong>
                  </h3>
                  <hr>

                  <div class="md-form">                  
                    <input type="text" id="brand" class="form-control validate" name="brand" data-type="name" >
                    <label for="form3">Brand Name</label>
                  </div>
                <!--  <div class="md-form">
                    <input type="text" id="mname" class="form-control validate" name="mname">
                    <label for="form2">Middle Name</label>
                  </div>-->

                 
                  <div class="md-form">                  
                    <input type="text" id="model" class="form-control validate" name="model" data-type="model" >
                    <label for="form3"> Model</label>
                  </div>
                 
                  <div class="md-form">                  
                    <input type="text" id="Variant" class="form-control validate" name="variant" data-type="model" >
                    <label for="form3">Variant</label>
                  </div> 
                  <div class="md-form">                    
                    <select class="form-control" name="fuel" id="fuel" required>
                      <?php
                        include('data/addfuel.php');
                       ?>
                     </select >
                  </div>
                  <div class="text-center">
                    <input type="submit" class="btn btn-indigo" value="Add"> 
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
