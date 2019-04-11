<?php 
require('data/connect.php');
require('data/session.php');
require('layouts/app_top');
if(!sessionRedirect('3', 'designation_id'))
{
  header('Location:index.php');
}

?>

<body>
  <!-- Navbar -->
  <?php
 //include('layouts/menu.php');
 if(!getSession('user_id'))
{
  header('Location:index.php');
}


 ?>
 
  <!-- Navbar -->

<!--style="background-image: url('userimg.png'); background-repeat: no-repeat; background-size: cover;"-->
<div class="view full-page-intro" >
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
    <form name="" id="login" method="post" action="data/centerdata.php" enctype="multipart/form-data" class="mt-5">
      <!-- Heading -->
      <!--Card-->

      <input type="text" hidden value="addparts" name="type">
      <h3 class="dark-grey-text text-center">
        <strong>ADD SPARE PARTS</strong>
      </h3><hr>

      <div class="row">
        <div class="col-md-6">
        <div class="md-form">                  
       <!--<input type="" id="form3" class="form-control" name="fanme"> -->
       <select class="form-control" name="model" id="model1" required>
       <?php
            // include('data/centermodel.php');
        //    print_r($val);
        //    return;
            $val=getSession('brand');
        // echo $val;
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
        </div>
        <div class="col-md-6">
        <div class="md-form">                  
       <!--<input type="" id="form3" class="form-control" name="fanme"> -->
       <select class=" form-control" name="fuel" id="fuel1" required>        
        echo '<option value="">Choose Fuel</option>';
        </select >
        </div>
        </div>  
        </div>  
        <div class="row">
        <div class="col-md-6">
        <div class="md-form">
        <input type="text" class="form-control validate" name="part" id="part" data-type="general" placeholder="Parts Name" required>                   
        </div>
        </div>
        <div class="col-md-6">
        <div class="md-form">
        <input type="text"  id="price" class="form-control validate " data-type="digits" name="price"required placeholder="Price"> 
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
<!-- 
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
  </script> -->
</body>

</html>
