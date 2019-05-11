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
      max-height: 10%;
      margin-top: -50px;
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

    <div class="main offset-md-1">
      <!-- <script>
        alert();
</script> -->
      <div class="row py-2">
        <?php
        $sql = "SELECT * FROM `tbl_advertisement` WHERE status=0 AND car_id IN(SELECT car_id FROM tbl_car WHERE user_id='$userid') ";
        // print_r($sql);
        // return;
        $val = mysqli_query($conn, $sql);
        if (mysqli_num_rows($val) > 0) {
          while ($result = mysqli_fetch_array($val)) {
            $carid=$result['car_id'];
            $sql2 = "SELECT * FROM tbl_image WHERE advertisement_id='$result[advertisement_id]'";
            $val1 = mysqli_query($conn, $sql2);
            $image = mysqli_fetch_array($val1);
            ?>
            <div class="col-md-3 pb-3 " style="border-style: groove;margin-left:10px;">
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
                  <label><b><?php echo $result['odometer']; ?>KM</b></label>


                  <form name="" id="login" method="post" action="data/userdata.php" enctype="multipart/form-data" class="mt-5">
                    <!-- Heading -->

                    <input type="text" hidden value="viewoffer" name="type">
                    <input type="text" hidden value="<?php echo $result['advertisement_id']; ?>" name="adid">
                    <button type="submit" class="btn button1" value="appointment" name="car">View Offers</button>
                  </form>
                  <br>
                  <button type="button" class="btn button1 waves-effect waves-light " data-toggle="modal" data-target="#exampleModal" style="width: 150px;height: 100px;">
                    Delete Ad
                  </button>
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
          <h3><?php echo "NOTHING TO SHOW ! YOU HAVEN'T LISTED ANYTHING YET  !"; ?></h3>
        </div>
      <?php
    }
    ?>
    </div>

  </div>

</body>

</html>
<?php
require('layouts/specialapp_end');
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-header ">
        <h5 class="modal-title" id="exampleModalLabel"><b><label style="padding-left: 125px;">Delete Your Ad</label></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="" id="login" method="post" action="data/userdata.php" enctype="multipart/form-data">
        <input type="text" hidden value="deletead" name="type">
        <input type="text" hidden value=<?php echo $carid;?> name="carid">
        <div class="modal-body">
          Reason of Deletion
          <select name="reason" required>
          <option value disabled selected>Select Reason</option>
            <option value="1">Car sold through this site</option>
            <option value="2">Car sold through other source</option>
            <option value="3">Not selling it anymore </option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>