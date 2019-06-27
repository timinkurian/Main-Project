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
$carid = getSession('carid');

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

        .carousel {
            height: 340px;
        }

        .card {
            box-shadow: none;
            border: 1px solid #b2b2b2;
        }

        .img-fluid,
        .modal-dialog.cascading-modal.modal-avatar .modal-header,
        .video-fluid {
            max-width: 50px;
            height: auto;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="view full-page-intro" >
        <?php
        $sql = "SELECT * FROM `tbl_advertisement` WHERE car_id='$carid' AND status='0'";
        // print_r($sql);
        // return;
        $val = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($val);
        $lat = $result['latitude'];
        $long = $result['longitude'];
        // $carid=$result['car_id'];
        $sql2 = "SELECT * FROM tbl_image WHERE advertisement_id='$result[advertisement_id]'";
        $val1 = mysqli_query($conn, $sql2);
        $image = mysqli_fetch_array($val1);
        $sql1 = "SELECT tbl_brand.brand_name,tbl_brand.brand_id,tbl_model.model_name,tbl_model.model_id,tbl_variant.variant_name, tbl_variant.variant_id,tbl_fuel.fuel FROM tbl_variant JOIN tbl_car ON tbl_variant.variant_id=tbl_car.variant_id JOIN tbl_model ON tbl_model.model_id=tbl_variant.model_id JOIN tbl_brand ON tbl_brand.brand_id=tbl_model.brand_id JOIN tbl_fuel ON tbl_fuel.fuel_id=tbl_variant.fuel_id WHERE tbl_car.car_id='$result[car_id]'";
        $val2 = mysqli_query($conn, $sql1);
        $result1 = mysqli_fetch_array($val2);
        $sql3 = "SELECT * FROM tbl_car WHERE car_id='$result[car_id]'";
        $val3 = mysqli_query($conn, $sql3);
        $result3 = mysqli_fetch_array($val3);
        $vehno=$result3['regno'];
        $sql4 = "SELECT tbl_user.first_name,tbl_user.last_name,tbl_user.mobile,tbl_user.photo,tbl_user.user_id,tbl_user.place_id,tbl_login.email FROM tbl_user JOIN tbl_car ON tbl_user.user_id=tbl_car.user_id JOIN tbl_login ON tbl_login.user_id=tbl_car.user_id WHERE tbl_car.car_id='$carid'";
        $val4 = mysqli_query($conn, $sql4);
        $result4 = mysqli_fetch_array($val4);
        $sql5 = "SELECT tbl_district.district,tbl_place.place FROM tbl_district JOIN tbl_place ON tbl_district.district_id=tbl_place.district_id WHERE place_id='$result4[place_id]'";
        $val5 = mysqli_query($conn, $sql5);
        $result5 = mysqli_fetch_array($val5);
        ?>
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
            <div class="container">

                <!-- Brand -->
                <a class="navbar-brand" href="saleshome.php">
                    <strong>Back</strong>
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
            <div class="container">
                <div class="row">
                    <!-- slider -->
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000" data-pause="hover">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                        <li data-target="#myCarousel" data-slide-to="3"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <img src="data/<?php echo $image['image1']; ?>" alt="Los Angeles" style="width:100%;">
                                        </div>

                                        <div class="item">
                                            <img src="data/<?php echo $image['image2']; ?>" alt="Chicago" style="width:100%;">
                                        </div>

                                        <div class="item">
                                            <img src="data/<?php echo $image['image3']; ?>" alt="New york" style="width:100%;">
                                        </div>

                                        <div class="item">
                                            <img src="data/<?php echo $image['image4']; ?>" alt="New york" style="width:100%;">
                                        </div>
                                    </div>

                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- //details of ad -->
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h3 style="font-size:30px;"><b>₹<?php echo $result['price']; ?></b></h3>
                                <label><b><?php echo $result1['brand_name']; ?> | </b></label>
                                <label><b><?php echo $result1['model_name']; ?> | </b></label>
                                <label><b><?php echo $result1['variant_name']; ?></b></label><br>
                                <label><b><?php echo $result3['manufactured_year']; ?> - </b></label>
                                <label><b><?php echo $result['odometer']; ?>KM</b></label><br>
                                <label>Posted on:<?php echo $result['advertisement_date']; ?></label><br>
                            </div>
                        </div>
                        <!-- seller information -->
                        <div class="col-md-15 py-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 style="font-size:25px;"><b>Seller Information</b></h5>
                                    <img src="data/<?php echo $result4['photo']; ?>" class="img-fluid rounded-circle z-depth-2" alt="Material Design for Bootstrap - example photo" class="avatar">
                                    <h5 style="font-size:20px;"><b><?php echo $result4['first_name'];
                                                                    echo " ";
                                                                    echo $result4['last_name']; ?></b></h5>

                                    <label><b>+91<?php echo $result4['mobile']; ?></b></label><br>
                                    <label><b><?php echo $result4['email']; ?></b></label><br>
                                    <label><?php echo $result5['district'];
                                            echo ",";
                                            echo $result5['place']; ?></label><br>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row pt-4">
                    <!-- Details of car -->
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <h5 style="font-size:25px;"><b>Details</b></h5>
                                <table>
                                    <tr>
                                        <td><label style="font-size:15px;">Brand </label></td>
                                        <td style="padding-left: 120px;"><label style="font-size:15px;"><?php echo $result1['brand_name']; ?></label></td>
                                    </tr>
                                    <tr>
                                        <td><label style="font-size:15px;">Model </label></td>
                                        <td style="padding-left: 120px;"><label style="font-size:15px;"><?php echo $result1['model_name']; ?></label></td>
                                    </tr>
                                    <tr>
                                        <td><label style="font-size:15px;">Variant </label></td>
                                        <td style="padding-left: 120px;"><label style="font-size:15px;"><?php echo $result1['variant_name']; ?></label></td>
                                    </tr>
                                    <tr>
                                        <td><label style="font-size:15px;">Year </label></td>
                                        <td style="padding-left: 120px;"><label style="font-size:15px;"><?php echo $result3['manufactured_year']; ?></label></td>
                                    </tr>
                                    <tr>
                                        <td><label style="font-size:15px;">KM Driven </label></td>
                                        <td style="padding-left: 120px;"><label style="font-size:15px;"><?php echo $result['odometer']; ?></label></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="card-body">
                                <h5 style="font-size:25px;"><b>Description</b></h5>
                                <label><b><?php echo $result['description']; ?></b></label><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h5 style="font-size:25px;"><b>Posted From</b></h5>
                                <a href="https://maps.google.com/?q=<?php echo $lat;
                                                                    echo ",";
                                                                    echo $long; ?>" target="_blank">
                                    <img src="map.jpg" style="max-width:35%;">
                                </a>
                                <br>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Make Offer
                                </button>
                            </div>
                            <div class="card-body">
                                <form name="" id="login" method="post" action="servicehistory.php" enctype="multipart/form-data">
                                    <input type="text" hidden value="<?php echo $vehno; ?>" name="vehno">
                                    <input type="submit" class="btn btn-indigo" value="Service History"> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script>
    function getLocation() {

    }
    </script> -->
</body>

</html>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel"><b><label style="font-size:15px;">Make an Offer</label></b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="" id="login" method="post" action="data/userdata.php" enctype="multipart/form-data">
                <input type="text" hidden value="offer" name="type">
                <input type="text" hidden value=<?php echo $result['advertisement_id']; ?> name="adid">
                <input hidden name="date" value=<?php echo date("d/m/y"); ?>>
                <div class="modal-body">
                    <input type="number" class=" form-control " name="offer" id="offer" min="<?php echo ($result['price']) / 2; ?>" max="<?php echo $result['price']; ?>">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>