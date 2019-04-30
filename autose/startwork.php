<?php 
require('data/connect.php');
require('data/session.php');
require('layouts/app_top');
if(!sessionRedirect('4', 'designation_id'))
{
  $_SESSION['user_id'] = '';
  $_SESSION['designation_id'] = '';
  session_destroy();
  header('Location:index.php');
}
?>
   
   <html>  
<head>
  <!-- <style>
  .image1{
    max-width: 100%;
}
.button1{
  background-color: #aeaeaeed;
  max-height: 20%;
}
  </style> -->
</head>

<body>
  <!-- <?php
// print_r($modelid);
// return;
?> -->
<div class="view full-page-intro" style="height: fit-content">

<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
  <div class="container">

    <!-- Brand -->
    <a class="navbar-brand" href="employeehome.php">
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

  <div class="main">
      <!-- Content -->
      <div class="container ">

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
        <input type="text" hidden value="startwork" name="type">
        <input type="text" hidden value="<?php echo $_POST['appointment_id'];?>" name="appointment_id">
        <h3 class="dark-grey-text text-center">
        <strong>Car Status</strong>
        </h3>
        <hr>
      <table>

      <!-- <tr>
      <td>Vehicle number</label></td>
      <td>
      <div class="md-form"> 
        <?php
        // $regno=getSession('regno');
        // print_r($regno);
        // return;
        ?>               
      <label ></label>
        </div>
     </td>
     </tr> -->
        <tr>
        <td><label>Fuel Level</label></td>
        <td>
        <div class="md-form">                  
       <!--<input type="" id="form3" class="form-control" name="fanme"> -->
       <select class="form-control" name="fuel" id="fuel" required>
       <option value disabled selected>Choose Fuel Condition</option>
       <option value="full">Full Tank</option>
       <option value="half">Half Tank</option>
       <option value="reserve">Reserve</option>
       <option value="first">Reserve-Half Tank</option>
       <option value="second">Half-Full Tank</option>
        </select >
        </div>
        </td>
        </tr>
        <tr>
        <tr>
        <td><label>Odometer Reading</label></td>
        <td>
        <div class="md-form">
        <input type="text" class="form-control validate" name="meter" id="meter"  data-type="digits" required>                   
        </div>
        </td>
        </tr>
        <tr>
        <td><label>Damages</label></td>
        <td>
        <div class="md-form">
        <textarea rows="3" class="form-control" name="damages" id="damages" required></textarea>                   
        </div>
        </td>
        </tr>
        </table>
      <div class="text-center">
        <input type="submit" class="btn btn-indigo" value="Start"> 
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
      minDate: "+1d",
      maxDate: "+1m +1w"
    });
  } );
  </script>

</body>

</html>
