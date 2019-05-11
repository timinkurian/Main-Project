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
            <div class="container">
            <?php
                        $sql = "SELECT * FROM `tbl_advertisement` WHERE status='0' AND advertisement_id IN(SELECT advertisement_id FROM tbl_offeredprice WHERE user_id='$userid' AND offer_status='1')";
                        // print_r($sql);
                        // return;
                        $val = mysqli_query($conn, $sql);
                        if ($val) {
                            while ($result = mysqli_fetch_array($val)) {
                                $sql2 = "SELECT * FROM tbl_image WHERE advertisement_id='$result[advertisement_id]'";
                                $val1 = mysqli_query($conn, $sql2);
                                $image = mysqli_fetch_array($val1);
                                $sql1 = "SELECT tbl_brand.brand_name,tbl_brand.brand_id,tbl_model.model_name,tbl_model.model_id,tbl_variant.variant_name, tbl_variant.variant_id,tbl_fuel.fuel FROM tbl_variant JOIN tbl_car ON tbl_variant.variant_id=tbl_car.variant_id JOIN tbl_model ON tbl_model.model_id=tbl_variant.model_id JOIN tbl_brand ON tbl_brand.brand_id=tbl_model.brand_id JOIN tbl_fuel ON tbl_fuel.fuel_id=tbl_variant.fuel_id WHERE tbl_car.car_id='$result[car_id]'";
                                $val2 = mysqli_query($conn, $sql1);
                                $result1 = mysqli_fetch_array($val2);
                                $sql3 = "SELECT * FROM tbl_car WHERE car_id='$result[car_id]'";
                                $val3 = mysqli_query($conn, $sql3);
                                $result3 = mysqli_fetch_array($val3);
                                $sql4 = "SELECT * FROM tbl_offeredprice WHERE user_id='$userid' AND offer_status='1'";
                                $val4 = mysqli_query($conn, $sql4);
                                $result4 = mysqli_fetch_array($val4);
                                $sql5 = "SELECT tbl_user.first_name,tbl_user.last_name,tbl_user.mobile,tbl_user.photo,tbl_user.user_id,tbl_user.place_id,tbl_login.email FROM tbl_user JOIN tbl_car ON tbl_user.user_id=tbl_car.user_id JOIN tbl_login ON tbl_login.user_id=tbl_car.user_id WHERE tbl_car.car_id='$result[car_id]'";
                                $val5 = mysqli_query($conn, $sql5);
                                $result5 = mysqli_fetch_array($val5);
                                ?>
                <div class="row">
                    <!-- slider -->
                    <div class="col-md-4">


                                <div class="card">
                                    <div class="card-header">
                                        <img src="data/<?php echo $image['image1']; ?>" class="image1" style="width: -webkit-fill-available;height: auto;">
                                        <h3 style="font-size:20px;"><b>₹<?php echo $result['price']; ?></b></h3>
                                        <label><b><?php echo $result1['brand_name']; ?> | </b></label>
                                        <label><b><?php echo $result1['model_name']; ?> | </b></label>
                                        <label><b><?php echo $result1['variant_name']; ?></b></label><br>
                                        <label><b><?php echo $result3['manufactured_year']; ?> - </b></label>
                                        <label><b><?php echo $result['odometer']; ?>KM</b></label>
                                        <h3 style="font-size:25px;"><b>Approved Price: ₹<?php echo $result4['offer_amount']; ?></b></h3>
                                    </div>
                                    <div class="card-body">

                                        
                                        <!-- Button trigger modal -->
                                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                        Launch demo modal
                                                    </button> -->
                                                    <h5 style="font-size:25px;"><b>Seller Information</b></h5>
                                    <h5 style="font-size:20px;"><b><?php echo $result5['first_name'];
                                                                    echo " ";
                                                                    echo $result5['last_name']; ?></b></h5>

                                    <label><b>+91<?php echo $result5['mobile']; ?></b></label><br>
                                    <label><b><?php echo $result5['email']; ?></b></label><br>
                                    <!-- <label><?php echo $result5['district'];
                                            echo ",";
                                            echo $result5['place']; ?></label><br> -->
                                    </div>
                                </div>
                                </div>
                        <?php
                    }
                }
                ?>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</body>

</html>
<?php
require('layouts/specialapp_end');
?>
<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> -->