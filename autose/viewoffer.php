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
$adid = getSession('advertisement_id');
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

        <div class="main offset-3">
            <?php
            $sql = "SELECT * FROM `tbl_offeredprice` WHERE advertisement_id='$adid' ORDER BY offer_date DESC";
            $val = mysqli_query($conn, $sql);
            if (mysqli_num_rows($val) > 0) {
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>Offer Date</th>
                            <th>User's Name</th>
                            <th>Offered Price</th>
                            <th>Status</th>
                            <th></th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($result = mysqli_fetch_array($val)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $result['offer_date']; ?>
                                </td>
                                <td>
                                    <?php
                                    $r = $result['user_id'];
                                    $sql1 = "SELECT * FROM `tbl_user` WHERE `user_id`='$r'";
                                    $val1 = mysqli_query($conn, $sql1);
                                    $data = mysqli_fetch_assoc($val1);
                                    echo $data['first_name'];
                                    echo " ";
                                    echo $data['last_name']; ?>
                                </td>
                                <td>
                                    <?php echo $result['offer_amount']; ?>
                                </td>
                                <td id="userControl<?php echo $result['offer_id']; ?>">
                                    <?php
                                    if ($result['offer_status'] == '0') {
                                        echo 'Decision Pending';
                                    }
                                    if ($result['offer_status'] == '1') {
                                        echo 'Approved';
                                    }
                                    if ($result['offer_status'] == '-1') {
                                        echo 'Rejected';
                                    }
                                    ?>
                                </td>
                                <?php
                                if ($result['offer_status'] == '0') {

                                    ?>
                                    <td id="userControl1<?php echo $result['offer_id']; ?>">
                                        <input type="button" class="userr-click" data-type="offerapprove" data-id=<?php echo $result['offer_id']; ?> value="Approve">
                                        <input type="button" class="userr-click" data-type="offerreject" data-id=<?php echo $result['offer_id']; ?> value="Reject">

                                    </td>
                                <?php
                            }
                            ?>
                            </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            <?php
        } else {
            ?>
                <div >
                    <img src="nothing.png" style="max-width:35%;margin-left: 110px; margin-right: auto; ">
                    <h3><?php echo "NOTHING TO SHOW ! NO ONE IS INTERESTED !!"; ?></h3>
                </div>
            <?php
        } ?>

            <!-- Form -->

            <!-- </div> -->

            <!-- </div> -->
            <!--/.Card-->

            <!-- </div> -->
            <!--Grid column-->

            <!-- </div> -->
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
    </script>
</body>

</html>