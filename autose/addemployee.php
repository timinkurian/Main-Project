<?php 
require('layouts/app_top');
require('data/session.php');
if(!sessionRedirect('3', 'designation_id'))
{
  $_SESSION['user_id'] = '';
  $_SESSION['designation_id'] = '';
  session_destroy();
  header('Location:index.php');
}
?>

<head>

</head>
<body>
<!--style="background-image: url('userimg.png'); background-repeat: no-repeat; background-size: cover;"-->
<div class="view full-page-intro"  style="background-image: url('realdeal.jpg'); background-repeat: repeat; background-size: cover;">

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="sevricecenterhome.php">
        <strong>Home</strong>
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
          <div class="offset-3 col-md-6 mb-4 text-left">

            <!--Card-->
            <div class="card">

              <!--Card content-->
              <div class="card-body">

                <!-- Form -->
                <form name="" id="login" method="post" action="data/centerdata.php" enctype="multipart/form-data" class="mt-5">
                  <!-- Heading -->
                  
                  <input type="text" hidden value="addemployee" name="type">
                  <h3 class="dark-grey-text text-center">
                    <strong>ADD NEW EMPLOYEE</strong>
                  </h3>
                  <hr>
                  <table class="table-hover table-sm" style="width:100%">
                  <tr>
                    <td><label>Choose Department</label></td>
                    <td>
                    <div class="md-form">                  
                   <!--<input type="" id="form3" class="form-control" name="fanme"> -->
                   <select class=" form-control " name="department" id="department" required> 
                   <?Php

                   include('data/department.php');
                   ?>
                   <!-- echo '<option value="">Choose Variant</option>';  -->
                 
                    </select >
                    </div>
                    </td>
                    </tr>
                    <tr>
                    <td><label>Email Id</label></td>
                    <td>
                    <div class="md-form">                  
                    <input type="email" id="email" class="form-control validate" name="email" data-type="model" >
                    </div>  
                    </td>
                    </tr>
                    </table>
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


 </div>
 <script>
$('.form-control-chosen-optgroup').chosen({
  width: '100%'
});
$(function() {
  $('[title="clickable_optgroup"]').addClass('chosen-container-optgroup-clickable');
});
</script>
 <?php
    require('layouts/app_end');
 ?>
</body>

</html>
