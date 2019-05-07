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
$carid = $_POST['carid'];

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
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="view full-page-intro">
        <?php
        $sql = "SELECT * FROM `tbl_advertisement` WHERE car_id='$carid'";
        // print_r($sql);
        // return;
        $val = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($val);
        $sql2 = "SELECT * FROM tbl_image WHERE car_id='$result[car_id]'";
        $val1 = mysqli_query($conn, $sql2);
        $image = mysqli_fetch_array($val1);
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

                    <!-- //details -->
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h3>hello</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                hello
                            </div>
                            <div class="card-body">
                                car body
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>