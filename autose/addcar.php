<?php 
require('data/connect.php');
require('data/session.php');
require('layouts/app_top');
if(!sessionRedirect('1', 'designation_id'))
{
  header('Location:index.php');
}

?>

<body>
  <!-- Navbar -->
  <?php
 include('layouts/usermenu.php');
 if(!getSession('user_id'))
{
  header('Location:index.php');
}
 ?>
 
  <!-- Navbar -->

<!--style="background-image: url('userimg.png'); background-repeat: no-repeat; background-size: cover;"-->
<div class="view full-page-intro" >



  <div class="main">
      <!-- Content -->
      <div class="container">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->

          <!--Grid column-->
          <div class="offset-2 col-md-8" >

          <div class="card">

<!--Card content-->
<div class="card-body">
    <!-- Form -->
    <form name="" id="login" method="post" action="data/userdata.php" enctype="multipart/form-data" class="mt-5">
      <!-- Heading -->
      <!--Card-->

      <input type="text" hidden value="addcar" name="type">
      <h3 class="dark-grey-text text-center">
        <strong>ADD YOUR CAR</strong>
      </h3><hr>
      <div class="row">
        <div class="col-md-6">
        <div class="md-form">                  
        <input type="text" id="vehno" class="form-control validate" name="vehno" maxlength=13 data-type="regno" placeholder="Vehicle Number"></td>
      <!--  <label for="form3">Service Name</label>-->
     </div>
        </div>
        <div class="col-md-6">
        <div class="md-form">                  
       <!--<input type="" id="form3" class="form-control" name="fanme"> -->
       <select class="form-control" name="brand" id="brand" required>
           <?php
            include('data/brand.php');
           ?>
        </select >
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
        <div class="md-form">                  
       <!--<input type="" id="form3" class="form-control" name="fanme"> -->
       <select class="form-control" name="model" id="model" required>
       echo '<option value="">Choose Model</option>'
        </select >
        </div>
        </div>
        <div class="col-md-6">
        <div class="md-form">                  
       <!--<input type="" id="form3" class="form-control" name="fanme"> -->
       <select class=" form-control" name="variant" id="variant" required>        
        echo '<option value="">Choose Variant</option>';
        </select >
        </div>
        </div>  
        </div>  
        <div class="row">
        <div class="col-md-6">
        <div class="md-form">
        <input type="text" class="form-control validate" name="color" id="color" data-type="name" placeholder="Color" required>                   
        </div>
        </div>
        <div class="col-md-6">
        <div class="md-form">
        <input type="text" readonly id="datepicker" class="form-control " name="datepicker" required placeholder="Select Manufactured Year"> 
        </div>
        </div>  
        </div>  
        <div class="row">
        <div class="col-md-6">
        <div class="md-form">
        <input type="text" class="form-control validate" name="engineno" id="engineno" data-type="engineno" placeholder="Engine Number">                   
        </div>
        </div>
        <div class="col-md-6">
        <div class="md-form">                  
        <input type="text" id="chasisno" class="form-control validate" name="chasisno" data-type="chasisno" placeholder="Chasis Number">
        </div> 
        </div>  
        </div>
        <div class="row">
        <div class="col-md-6">
        <div class="md-form">    
        <label>Choose RC Book</label><br><br>              
        <input type="file" id="rcbook" class="form-control" name="rcbook" accept=".jpeg,.jpg,.png" required >
        </div>
        </div>
        <div class="col-md-6">
        <div class="md-form"> 
        <label>Choose Car Image</label><br><br>                  
        <input type="file" id="car" class="form-control " name="car" accept=".jpeg,.jpg,.png" required>
        <label for="form3"></label>
        </div> 
        </div>  
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

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      minDate: "-1y",
      maxDate: "-1d"
    });
  } );
  </script>
</body>

</html>
