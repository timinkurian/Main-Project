<?php
require "data/connect.php";
require "data/session.php";
require('layouts/app_top');
$regno=getSession('regno');
$brandid=getSession('brandid');
?>
   
   <html>  
<head>
  <style>
  .image1{
    max-height: 158px;
}
.button1{
  background-color: #aeaeaeed;
  max-height: 20%;
}
  </style>
</head>

<body>
<div class="view full-page-intro" style="height: fit-content">

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
  <div class="row">
<!-- <script>
        alert();
</script> -->
<?php
$sql = "SELECT * FROM `tbl_servicecenter` WHERE `brand_id`=$brandid";
// print_r($sql);
// return;
$val=mysqli_query($conn,$sql);
if ($val) {
 while($result=mysqli_fetch_array($val)){
    //  $licenceno=$result['licenceno'];
    // setSession('licenceno',$licenceno);
    ?>
    
    <div class="col-md-4 pb-5">
        <div class="row">

            <div class="col">
            <img src="data/<?php echo $result['photo']; ?>"class="image1">
            </div>
            <div class="col">
            <label ><b><?php echo $result['center_name']; ?></b></label><br>
              <label ><b><?php echo $result['licenceno']; ?></b></label><br>
              <label ><b><?php echo $result['mobile']; ?></b></label><br>
              <?php
              $sql1="SELECT tbl_district.district,tbl_place.place FROM tbl_district JOIN tbl_place ON tbl_district.district_id=tbl_place.district_id JOIN tbl_servicecenter ON tbl_servicecenter.place_id=tbl_place.place_id WHERE tbl_servicecenter.brand_id=$brandid AND tbl_servicecenter.licenceno='$result[licenceno]'";
              $val1=mysqli_query($conn,$sql1);
              $result1=mysqli_fetch_array($val1);

              ?>
              <label ><b><?php echo $result1['district']; ?></b></label><br>
              <label ><b><?php echo $result1['place']; ?></b></label><br>
            </div>
        </div>
        <form name="" id="login" method="post" action="appointment.php">
        <input type="text" hidden value="<?php echo $result['licenceno']; ?>" name="licenceno">
        <button type="submit" class="btn button1" value="appointment" name="car">Book</button>
        </form>
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
   }
 else {
    echo "0 results";
}