<?php
require "data/connect.php";
require "data/session.php";
require('layouts/app_top');
$regno=getSession('regno');
$brandid=getSession('brandid');
 $modelid=getSession('modelid');
 $variantid=getSession('variantid');
?>
   
   <html>  
<head>
  <style>
  .image1{
    max-width: 100%;
}
.button1{
  background-color: #aeaeaeed;
  max-height: 20%;
}
  </style>
</head>

<body>
  <!-- <?php
// print_r($modelid);
// return;
?> -->
<div class="view full-page-intro" >

<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
  <div class="container">

    <!-- Brand -->
    <a class="navbar-brand" href="user.php">
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
    <form name="" id="login" method="post" action="data/userdata.php" enctype="multipart/form-data" class="mt-5">
      <!-- Heading -->
      
      <input type="text" hidden value="appointment" name="type">
      <input hidden name="date" value=<?php echo date("m/d/Y"); ?>>
      <input type="text" hidden value="<?php echo $_POST['licenceno']?>" name="licenceno">    
      <input type="text" hidden value="<?php echo $regno?>" name="regno">
      <h3 class="dark-grey-text text-center">
        <strong>Make An Appointment</strong>
      </h3>
      <hr>
      <table>
      <tr>
      <td>Pick a Date</label></td>
      <td>
      <div class="md-form">                
       <input type="text" readonly id="apdate" class="form-control" name="datepicker" data-type="dat" >
       <!-- datepicker -->
        </div>
     </td>
     </tr>
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
        <td><label>Choose Service Type</label></td>
        <td>
        <div class="md-form">                  
       <!--<input type="" id="form3" class="form-control" name="fanme"> -->
       <select class="form-control" name="stype" id="stype" required>
          <?php
          include('data/service.php');
          ?>
        </select >
        </div>
        </td>
        </tr>
        <tr>
        <td><label>Advance Payment Amount</label></td>
        <td>
        <div class="md-form">
        <input type="text" readonly class="form-control" name="price" id="price">                   
        </div>
        </td>
        </tr>
        <tr>
        <td><label>Odometer Reading</label></td>
        <td>
        <div class="md-form">
        <input type="text" class="form-control validate" name="odometer" id="odometer"  data-type="digits" required>                   
        </div>
        </td>
        </tr>
        <tr>
        <td><label>Remarks</label></td>
        <td>
        <div class="md-form">
        <textarea rows="3" class="form-control" name="remarks" id="remarks"></textarea>                   
        </div>
        </td>
        </tr>
        </table>
      <div class="text-center">
        <input type="submit" class="btn btn-indigo" value="Book"> 
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
  <link rel="stylesheet" href="assets/css/dtpicker.css">
  <!-- //code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css -->
  <link rel="stylesheet" href="/resources/demos/style.css">
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
  <script>
  // $( function() {
  //   $( "#datepicker" ).datepicker({
  //     minDate: "+1d",
  //     maxDate: "+1w"
  //   });
  // } );
  </script>
<script>
        var d = new Date();
        var year = d.getFullYear();
        d.setFullYear(year);
        $('#apdate').datepicker({ changeYear: true, changeMonth: true, maxDate:'7d',minDate:'2d', defaultDate: d});
</script>
</body>

</html>
