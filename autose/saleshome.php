<?php
require "data/connect.php";
require "data/session.php";
require('layouts/app_top');
if (!sessionRedirect('1', 'designation_id')) {
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
      background-color: #aeaeaeed;
      max-height: 20%;
      margin-top: -50px;
    }

    .card {
      box-shadow: none;
      border: 1px solid #b2b2b2;
    }
  </style>
</head>

<body>
  <div class="view full-page-intro" style="background-image: url('back.jpg'); background-repeat: no-repeat; background-size: cover;">

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

    <div class="main offset-md-1" >
      <div class="col-md-11" style="padding-left: -1;padding-left: 0px;">
        <div class="card">
          <div class="card-body">
            <form name="" id="login" method="post" action="data/userdata.php" enctype="multipart/form-data">
              <input type="text" hidden value="filtersearch" name="type">
             <label style="padding-right: 20px;">
                BRAND AND MODEL
             </label>
                <select name="brand" id="brand" style="width: 183px;">
                <?php
                include('data/brand.php');
                ?>
              </select>
              <select  name="model" id="model" style="width: 183px;" >
                echo '<option value="">Choose Model</option>'
              </select>
              <label style="padding-left: 50px;padding-right: 45px;">PRICE</label>
               <input type="text" class="validate" name="minprice" id="minprice" data-type="digits" placeholder="Min">
              <input type="text" class="validate" name="maxprice" id="maxprice" data-type="digits" placeholder="Max">
              <br>
              <label style="padding-right: 82px;">KM DRIVEN</label>
               <input type="text" class="validate" name="minkm" id="minkm" data-type="digits" placeholder="Min">
              <input type="text" class="validate" name="maxkm" id="maxkm" data-type="digits" placeholder="Max">
              <label style="padding-left: 50px;padding-right: 6px;">FUEL TYPE</label>
              <select  name="fuel" id="fuel" style="width: 183px;">
                    <?php
                      //echo '<option value="">Choose Model</option>';
                        include('data/fuel.php');
                     ?>
                    </select >
                    <input type="submit" class="button buyer-click"style="background-color: #c1c1c1;height: initial;width: 188px;" value="Apply Filter">
            </form>
          </div>
        </div>
      </div>
      <!-- <script>
        alert();
</script> -->
      <div class="row py-2">
        <?php
        $sql = "SELECT * FROM `tbl_advertisement` WHERE status=0 AND car_id NOT IN(SELECT car_id FROM tbl_car WHERE user_id='$userid') ";
        // print_r($sql);
        // return;
        $val = mysqli_query($conn, $sql);
        if (mysqli_num_rows($val) > 0) {
          while ($result = mysqli_fetch_array($val)) {
            $sql2 = "SELECT * FROM tbl_image WHERE advertisement_id='$result[advertisement_id]'";
            $val1 = mysqli_query($conn, $sql2);
            $image = mysqli_fetch_array($val1);
            ?>
            <div class="col-md-3 pb-3 " style="border-style: groove; margin-left:10px;">
              <div class="row">

                <div class="col">
                  <img src="data/<?php echo $image['image1']; ?>" class="image1" style="width: inherit;height: auto;">

                  <?php
                  $sql1 = "SELECT tbl_brand.brand_name,tbl_brand.brand_id,tbl_model.model_name,tbl_model.model_id,tbl_variant.variant_name, tbl_variant.variant_id,tbl_fuel.fuel FROM tbl_variant JOIN tbl_car ON tbl_variant.variant_id=tbl_car.variant_id JOIN tbl_model ON tbl_model.model_id=tbl_variant.model_id JOIN tbl_brand ON tbl_brand.brand_id=tbl_model.brand_id JOIN tbl_fuel ON tbl_fuel.fuel_id=tbl_variant.fuel_id WHERE tbl_car.car_id='$result[car_id]'";
                  $val2 = mysqli_query($conn, $sql1);
                  $result1 = mysqli_fetch_array($val2);
                  $sql3 = "SELECT * FROM tbl_car WHERE car_id='$result[car_id]'";
                  $val3 = mysqli_query($conn, $sql3);
                  $result3 = mysqli_fetch_array($val3);
                  ?>
                  <h3 style="font-size:30px;"><b>₹<?php echo $result['price']; ?></b></h3>
                  <label><b><?php echo $result1['brand_name']; ?> | </b></label>
                  <label><b><?php echo $result1['model_name']; ?> | </b></label>
                  <label><b><?php echo $result1['variant_name']; ?></b></label><br>
                  <label><b><?php echo $result3['manufactured_year']; ?> - </b></label>
                  <label><b><?php echo $result['odometer']; ?>KM</b></label><br>


                  <!-- <label><b><?php echo $result1['fuel']; ?></b></label> -->

                  <!-- <label><b><?php echo $result['description']; ?></b></label><br>
                                           -->

                  <form name="" id="login" method="post" action="data/userdata.php" enctype="multipart/form-data" class="mt-5">
                    <!-- Heading -->

                    <input type="text" hidden value="viewmore" name="type">
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
      <?php
    } else {
      ?>
        <div offset-md-5>
          <img src="nothing.png" style="max-width:35%;margin-left: auto; margin-right: auto; ">
          <h3><?php echo "NOTHING TO SHOW !  THERE  IS NO ADVERTISEMENT IS AVAILABLE !!"; ?></h3>
        </div>
      <?php
    } ?>
    </div>
  </div>

  </div>
<?php 
require('layouts/specialapp_end');
?>
</body>

</html>