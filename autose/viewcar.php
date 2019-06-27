<?php
require "data/connect.php";
require "data/session.php";
require('layouts/app_top');
if(!sessionRedirect('1', 'designation_id'))
{
  $_SESSION['user_id'] = '';
  $_SESSION['designation_id'] = '';
  session_destroy();
  header('Location:index.php');
}
$userid = getSession('user_id');

?>

<html>

<head>
  <style>
    .image1 {
      max-height: 150px;
    }

    .button1 {
      background-color: #000000ed;
      max-height: 20%;
    }
  </style>
</head>

<body>
  <div class="view full-page-intro" style="background-image: url('realdeal.jpg'); background-repeat: no-repeat; background-size: cover;">

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
      <div class="container">

        <!-- Brand -->
        <a class="navbar-brand" href="user.php">
          <strong>Home</strong>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          </ul>

        </div>

      </div>
    </nav>

    <div class="main">
      <!-- <script>
        alert();
</script> -->
      <div class="row">
        <?php
        $sql = "SELECT * FROM `tbl_car` WHERE `user_id`=$userid AND status=1";
        // print_r($sql);
        // return;
        $val = mysqli_query($conn, $sql);
        if (mysqli_num_rows($val) > 0) {
          while ($result = mysqli_fetch_array($val)) {
            ?>
            <div class="col-md-4 pb-5">
              <div class="row">

                <div class="col">
                  <img src="data/<?php echo $result['photo']; ?>" class="image1">
                </div>
                <div class="col">
                  <label><b><?php echo $result['regno']; ?></b></label><br>
                  <?php
                  $sql1 = "SELECT tbl_brand.brand_name,tbl_brand.brand_id,tbl_model.model_name,tbl_model.model_id,tbl_variant.variant_name, tbl_variant.variant_id,tbl_fuel.fuel FROM tbl_variant JOIN tbl_car ON tbl_variant.variant_id=tbl_car.variant_id JOIN tbl_model ON tbl_model.model_id=tbl_variant.model_id JOIN tbl_brand ON tbl_brand.brand_id=tbl_model.brand_id JOIN tbl_fuel ON tbl_fuel.fuel_id=tbl_variant.fuel_id WHERE tbl_car.user_id=$userid AND tbl_car.regno='$result[regno]'";
                  $val1 = mysqli_query($conn, $sql1);
                  $result1 = mysqli_fetch_array($val1);

                  ?>
                  <label><b><?php echo $result1['brand_name']; ?></b></label><br>
                  <label><b><?php echo $result1['model_name']; ?></b></label><br>
                  <label><b><?php echo $result1['variant_name']; ?></b></label><br>
                  <label><b><?php echo $result1['fuel']; ?></b></label>
                </div>
              </div>
              <form name="" id="login" method="post" action="data/userdata.php" enctype="multipart/form-data">
                <input type="text" hidden value="deletecar" name="type">
                <input type="text" hidden value="<?php echo $result['car_id']; ?>" name="carid">
                <input type="text" hidden value="<?php echo $result['regno']; ?>" name="regno">
                <input type="text" hidden value="<?php echo $result1['brand_id']; ?>" name="brandid">
                <input type="text" hidden value="<?php echo $result1['model_id']; ?>" name="modelid">
                <input type="text" hidden value="<?php echo $result1['variant_id']; ?>" name="variantid">
                <button type="submit" class="btn button1" value="appointment" name="car">Service</button>
                <button type="submit" class="btn button1" value="delete" name="car">Delete</button>
                <button type="submit" class="btn button1" value="sell" name="car">Sell</button>

              </form>
            </div>
          <?php
        }
        ?>
        </div>

      </div>
      </div>
      <?php
        } else {
            ?>
                <div offset-4>
                    <img src="nothing.png" style="max-width:35%;margin-left: 110px; margin-right: auto; ">
                    <h3><?php echo "NOTHING TO SHOW ! SHOWS ONLY THE CARS THAT ARE APPROVED BY ADMIN !!"; ?></h3>
                </div>
            <?php
        } ?>
    

  </body>

</html>

