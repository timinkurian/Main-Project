<?php
require "data/connect.php";
require "data/session.php";
require('layouts/app_top');
$carid = getSession('carid');
// $brandid=getSession('brandid');
//  $modelid=getSession('modelid');
//  $variantid=getSession('variantid');
?>

<html>

<head>
    <style>
        .image1 {
            max-width: 100%;
        }

        .button1 {
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
            <!-- Content -->
            <div class="container ">

                <!--Grid row-->
                <div class="row wow fadeIn">
                    <!--Grid column-->
                    <div class="offset-2 col-md-8 mb-4">

                        <!--Card-->
                        <div class="card">

                            <!--Card content-->
                            <div class="card-body">

                                <!-- Form -->
                                <form name="" id="login" method="post" action="data/userdata.php" enctype="multipart/form-data" class="mt-5">
                                    <!-- Heading -->

                                    <input type="text" hidden value="sellcar" name="type">
                                    <input hidden name="date" value=<?php echo date("d/m/y"); ?>>
                                    <h3 class="dark-grey-text text-center">
                                        <strong>Post Your Add</strong>
                                    </h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="md-form">
                                                <input type="text" class="form-control validate" name="odometer" id="odometer" data-type="digits" placeholder="KM Driven" required>
                                                <!--  <label for="form3">Service Name</label>-->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="md-form">
                                                <input type="text" class="form-control validate" name="price" id="price" data-type="digits" placeholder="Expecting Price" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="md-form">
                                                <textarea rows="4" class="form-control" name="remarks" id="remarks" placeholder=" Description" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="md-form">
                                                Confirm Your Location
                                                <button class="btn btn-indigo" onclick="getLocation()" id="location">Choose Current Location</button>
                                                <input hidden name="latitude" id="latitude">
                                                <input hidden name="longitude" id="longitude">
                                                <button class="btn btn-indigo" id="loc">Location marked</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="md-form">
                                                Choose Photos of Car
                                                <input type="file" id="car" class="form-control validate " name="car1" id="photo" accept=".jpeg,.jpg,.png" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="md-form">
                                                <input type="file" id="car" class="form-control validate " name="car2" id="photo" accept=".jpeg,.jpg,.png" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="md-form">
                                                <input type="file" id="car" class="form-control validate " name="car3" id="photo" accept=".jpeg,.jpg,.png">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="md-form">
                                                <input type="file" id="car" class="form-control validate " name="car4" id="photo" accept=".jpeg,.jpg,.png">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-indigo" value="Post Now">
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
        $('#apdate').datepicker({
            changeYear: true,
            changeMonth: true,
            maxDate: '7d',
            minDate: '1d',
            defaultDate: d
        });

        var x = document.getElementById("demo");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            $("#latitude").val(position.coords.latitude)
            $("#longitude").val(position.coords.longitude);
            $("#location").hide();
            $("#loc").show();

        }
        $(document).ready(function() {
            $("#loc").hide();
        });
    </script>

</body>

</html>