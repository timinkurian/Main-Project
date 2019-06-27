<?php
require "data/connect.php";
require "data/session.php";
require('layouts/app_top');
?>
<html>

<head>
    <style>
        td,
        th {
            /* border: 1px solid black;  */
            padding: 25px;
        }

        th {
            background-color: gray;
            color: white;
        }

        td {
            background-color: white;
            color: black;
        }

        td img {
            width: 100px;
            height: auto;
        }
    </style>

</head>

<body>
    <!-- <?php
            // print_r($modelid);
            // return;
            ?> -->
    <div class="view full-page-intro"  style="background-image: url('realdeal.jpg'); background-repeat: repeat; background-size: cover;">

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
            <div class="container">

                <!-- Brand -->
                <a class="navbar-brand" href="viewmore.php">
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

        <div class="main offset-1">
            <!-- Content -->
            <!-- <div class="container "> -->

            <!--Grid row-->
            <!-- <div class="row wow fadeIn"> -->
            <!--Grid column-->
            <!-- <div class="offset-1 " > -->

            <!--Card-->
            <!-- <div class="card"> -->

            <!--Card content-->
            <!-- <div class="card-body"> -->
            <?php
            $vehno = $_POST['vehno'];
            $sql = "SELECT * FROM `tbl_appointment` WHERE registerno='$vehno' AND appointment_status='3'";
            $val = mysqli_query($conn, $sql);
            if (mysqli_num_rows($val)>0) {
                ?>
                <table>
                    <thead>
                        <tr>

                            <th>Date</th>
                            <th>Center Name</th>
                            <th>District</th>
                            <th>Place</th>
                            <th>Service Type</th>



                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($result = mysqli_fetch_array($val)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $result['appointment_date']; ?>
                                </td>
                                <td>
                                    <?php
                                    $r = $result['licenceno'];
                                    $sql1 = "SELECT `center_name`,place_id FROM `tbl_servicecenter` WHERE `licenceno`='$r'";
                                    $val1 = mysqli_query($conn, $sql1);
                                    $data = mysqli_fetch_assoc($val1);
                                    echo $data['center_name'];
                                    $placeid=$data['place_id']; ?>
                                </td>
                                <td>
                                    <?php 
                                    $sql3="SELECT tbl_place.place,tbl_district.district FROM tbl_district JOIN tbl_place ON tbl_district.district_id=tbl_place.district_id AND tbl_place.place_id='$placeid'";
                                    $val3 = mysqli_query($conn, $sql3);
                                    $data3 = mysqli_fetch_array($val3);
                                    echo $data3['district']; ?>
                                </td>
                                <td>
                                    <?php  echo $data3['place']; ?>
                                </td>
                                <td>
                                    <?php
                                    $sc = $result['scheme_id'];
                                    $sql1 = "SELECT `servicetype` FROM `tbl_servicetype` JOIN tbl_servicescheme ON tbl_servicetype.servicetype_id=tbl_servicescheme.servicetype_id WHERE tbl_servicescheme.scheme_id='$sc'";
                                    $val1 = mysqli_query($conn, $sql1);
                                    $data = mysqli_fetch_assoc($val1);
                                    echo $data['servicetype']; ?>
                                </td>


                            </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>

   
            <!-- Form -->

            <!-- </div> -->

            <!-- </div> -->
            <!--/.Card-->

            <!-- </div> -->
            <!--Grid column-->

            <!-- </div> -->
            <!--Grid row-->
            <?php
    } else {
      ?>
        <div offset-md-4>
          <img src="sorry.jpg" style="max-width:35%;margin-left: auto; margin-right: auto; ">
          <h3 style="padding-left: 400px;"><?php echo "NO SERVICE HISTORY IS AVAILABLE !"; ?></h3>
        </div>
      <?php
    }
    ?>
        </div>
        <!-- Content -->

    </div>

    <?php
    require('layouts/app_end');
    ?>
    </div>
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Datepicker - Default functionality</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                minDate: "+1d",
                maxDate: "+1w"
            });
        });
    </script> -->
</body>

</html>