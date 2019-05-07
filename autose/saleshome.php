<?php
require "data/connect.php";
require "data/session.php";
require('layouts/app_top');
// if(!sessionRedirect('1', 'designation_id'))
// {
//   $_SESSION['user_id'] = '';
//   $_SESSION['designation_id'] = '';
//   session_destroy();
//   header('Location:index.php');
// }
// $userid = getSession('user_id');

?>

<html>

<head>
  <style>
    .image1 {
      max-height: 150px;
    }

    .button1 {
      background-color: #aeaeaeed;
      max-height: 20%;
    }
  </style>
</head>

<body>
  <div class="view full-page-intro">

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
      <div class="row py-2">
        <?php
        $sql = "SELECT * FROM `tbl_advertisement` WHERE status=0";
        // print_r($sql);
        // return;
        $val = mysqli_query($conn, $sql);
        if ($val) {
          while ($result = mysqli_fetch_array($val)) {
            $sql2 = "SELECT * FROM tbl_image WHERE car_id='$result[car_id]'";
            $val1 = mysqli_query($conn, $sql2);
            $image = mysqli_fetch_array($val1);
            ?>
            <div class="col-md-3 pb-3 offset-md-1" style="border-style: groove;">
              <div class="row">

                <div class="col">
                  <img src="data/<?php echo $image['image1']; ?>" class="image1">

                  <?php
                  $sql1 = "SELECT tbl_brand.brand_name,tbl_brand.brand_id,tbl_model.model_name,tbl_model.model_id,tbl_variant.variant_name, tbl_variant.variant_id,tbl_fuel.fuel FROM tbl_variant JOIN tbl_car ON tbl_variant.variant_id=tbl_car.variant_id JOIN tbl_model ON tbl_model.model_id=tbl_variant.model_id JOIN tbl_brand ON tbl_brand.brand_id=tbl_model.brand_id JOIN tbl_fuel ON tbl_fuel.fuel_id=tbl_variant.fuel_id WHERE tbl_car.car_id='$result[car_id]'";
                  $val2 = mysqli_query($conn, $sql1);
                  $result1 = mysqli_fetch_array($val2);
                  $sql3="SELECT * FROM tbl_car WHERE car_id='$result[car_id]'";
                  $val3 = mysqli_query($conn, $sql3);
                  $result3 = mysqli_fetch_array($val3);
                  ?>
                  <h3 style="font-size:30px;"><b>₹<?php echo $result['price']; ?></b></h3>
                  <label><b><?php echo $result1['brand_name']; ?> | </b></label>
                  <label><b><?php echo $result1['model_name']; ?> | </b></label>
                  <label><b><?php echo $result1['variant_name']; ?></b></label><br>
                  <label><b><?php echo $result3['manufactured_year']; ?>  -  </b></label>
                  <label><b><?php echo $result['odometer']; ?>KM</b></label><br>
                  
                  
                  <!-- <label><b><?php echo $result1['fuel']; ?></b></label> -->

                  <!-- <label><b><?php echo $result['description']; ?></b></label><br>
                       -->
                  
                  <form name="" id="login" method="post" action="viewmore.php">
                    <input type="text" hidden value="<?php echo $result['car_id']; ?>" name="carid">
                    <button type="submit" class="btn button1" value="appointment" name="car">View More</button>
                  </form>
                </div>
              </div>

            </div>
          <?php
        }
        ?>
        </div>
      </div>

    </div>

  </body>

  </html>
<?php
} else {
  echo "0 results";
}
