<?php 
require('layouts/app_top');
require('data/session.php');

?>
<link href="plugin/dist/css/component-chosen.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.6/chosen.jquery.min.js"></script>
<head>

</head>
<body>
<!--style="background-image: url('userimg.png'); background-repeat: no-repeat; background-size: cover;"-->
<div class="view full-page-intro" style="height: fit-content">

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
                  
                  <input type="text" hidden value="schemeadd" name="type">
                  <h3 class="dark-grey-text text-center">
                    <strong>ADD NEW SERVICE SCHEME</strong>
                  </h3>
                  <hr>
                  <table class="table-hover table-sm" style="width:100%">
                  <tr>
                  <td><label>Service Type</label></td>
                  <td>
                  <div class="md-form">                  
                  <select class="form-control " name="stype" id="sid" required>
                  <?php 
                    include('data/servicetype.php');
                  ?>
                  </select >
                  </div>
                  </td>
                  </tr>
                    <tr>
                    <td><label>Choose Model</label></td>
                    <td>
                    <div class="md-form">                  
                    <select class="form-control" name="model" id="model" required>
                    <?php
                      $val=getSession('brand');
                      echo '<option value disabled selected>Select Model</option>';
                      $sql = "SELECT * FROM `tbl_model` WHERE `brand_id`='$val'";
                      $result = mysqli_query($conn,$sql);
                      if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)) {
                      echo "<option value='".$row['model_id']."'>".$row['model_name']."</option>";
                      }
                      } 
                      ?>
                    </select >
                    </div>
                    </td>
                    </tr>
                    <tr>
                    <td><label>Choose Variant</label></td>
                    <td>
                    <div class="md-form">                  
                   <!--<input type="" id="form3" class="form-control" name="fanme"> -->
                   <select class=" form-control " name="variant" id="variant" required>  
                   echo '<option value="">Choose Variant</option>'; 
                 
                    </select >
                    </div>
                    </td>
                    </tr>
                    <tr>
                    <td colspan="2" class="text-left"><label>Replacing Parts</label></td>
                    <tr>
                    <td colspan="2">
                    <div class="">
                    <select name="val[]" id="optgroup_clickable" class="form-control form-control-chosen-optgroup" title="clickable_optgroup" data-placeholder="Please select..." multiple>
                   <?php
                   include('data/replacing.php');
                   ?>
                    </select>
                    </div>
                    </td>
                    </tr>
                    </tr>
                    <tr>
                    <td colspan="2"><label>Checking Parts</label></td>
                    </tr>
                    <tr>
                    <td colspan="2">
                    <select name="val1[]" id="optgroup_clickable" class="form-control form-control-chosen-optgroup" title="clickable_optgroup" data-placeholder="Please select..." multiple>
                   <?php
                   include('data/replacing.php');
                   ?>
                    </select>
                    </div>
                    </td>
                    </tr>
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
                    <td><label>Kilometer Limit </label></td>
                    <td>
                    <div class="md-form">                  
                    <input type="text" id="km" class="form-control validate" name="km" data-type="number" >
                    </div>  
                    </td>
                    </tr>
                    <tr>
                    <td><label>Labour Charge</label></td>
                    <td>
                    <div class="md-form">                  
                    <input type="text" id="amount" class="form-control validate" name="amount" data-type="number" >
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
