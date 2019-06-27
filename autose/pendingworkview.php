<?php
require "data/connect.php";
require "data/session.php";
require('layouts/app_top');
$licenceno = getSession('licenceno');
$employeeid = getSession('employeeid');

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
  <div class="view full-page-intro">

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
      <div class="container">

        <!-- Brand -->
        <a class="navbar-brand" href="employeehome.php">
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
        <?php
        $sql = "SELECT tbl_appointment.appointment_id,tbl_appointment.scheme_id,tbl_appointment.appointment_date,tbl_appointment.registerno,tbl_appointment.remarks,tbl_appointment.appointment_status,tbl_carcondition.employee_id FROM `tbl_appointment` JOIN tbl_carcondition ON tbl_appointment.appointment_id=tbl_carcondition.appointment_id WHERE appointment_status='2' AND licenceno='$licenceno' AND tbl_carcondition.employee_id='$employeeid'";
        $val = mysqli_query($conn, $sql);
        if (mysqli_num_rows($val) > 0) {
          ?>
          <!--Grid row-->
          <div class="row wow fadeIn">
            <!--Grid column-->
            <div class="offset-0 ">

              <!--Card-->
              <!-- <div class="card"> -->

              <!--Card content-->
              <!-- <div class="card-body"> -->

              <table>
                <thead>
                  <tr>

                    <th>Date</th>
                    <th>Vehicle Number</th>
                    <th>Service Type</th>
                    <th>User Remarks</th>
                    <th>Reason for Pending</th>
                    <th>Expected Delivery Date </th>
                    <th></th>
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
                        <?php echo $result['registerno']; ?>
                      </td>

                      <td>
                        <?php
                        $sc = $result['scheme_id'];
                        $sql1 = "SELECT `servicetype` FROM `tbl_servicetype` JOIN tbl_servicescheme ON tbl_servicetype.servicetype_id=tbl_servicescheme.servicetype_id WHERE tbl_servicescheme.scheme_id='$sc'";
                        $val1 = mysqli_query($conn, $sql1);
                        $data = mysqli_fetch_assoc($val1);
                        echo $data['servicetype']; ?>
                      </td>
                      <td>
                        <?php echo $result['remarks']; ?>
                      </td>

                      <td>
                        <?php
                        $apid = $result['appointment_id'];
                        $sql2 = "SELECT * FROM `tbl_incomplete` WHERE tbl_incomplete.appointment_id='$apid'";
                        $val2 = mysqli_query($conn, $sql2);
                        $data2 = mysqli_fetch_assoc($val2);
                        echo $data2['reason']; ?>
                      </td>
                      <td>
                        <?php echo $data2['delivery_date']; ?>
                      </td>
                      <?php
                      if ($result['appointment_status'] == '2') {

                        ?>
                        <td id="employeeControl<?php echo $result['appointment_id']; ?>">
                          <input type="button" class="employee-click" data-type="complete" data-id=<?php echo $result['appointment_id']; ?> value="Completed"><br>
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
          } 
          else {
            ?>
              <div class="offset-4 ">
                <img src="sorry.jpg" style="max-width:35%;margin-left: 110px; margin-right: auto; ">
                <h3><?php echo "NOTHING TO SHOW ! NO WORK IS LISTED!!"; ?></h3>
              </div>
            <?php
          } ?>
            <!-- Form -->

          </div>

          <!-- </div> -->
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