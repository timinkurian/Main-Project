<?php
require "data/connect.php";
require "data/session.php";
require('layouts/app_top');
$licenceno=getSession('licenceno');
$employeeid=getSession('employeeid');
$sql = "SELECT * FROM tbl_leave WHERE employee_id='$employeeid'";
$val=mysqli_query($conn,$sql);
if ($val) {
    ?>
<html>  

<head>
    <style>
        td, th {
                /* border: 1px solid black;  */
                padding: 25px;   
            }
            th {
                background-color: gray;
                color: white;
            }
            td{
                    background-color:white;
                    color:black;
                }
            td img{
                width:100px;
                height:auto;
            }

        </style>

</head>

<body>
  <!-- <?php
// print_r($modelid);
// return;
?> -->
<div class="view full-page-intro" style="height: fit-content">

<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
  <div class="container">

    <!-- Brand -->
    <a class="navbar-brand" href="employeehome.php">
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
      <!-- Content -->
      <div class="container ">

        <!--Grid row-->
        <div class="row wow fadeIn">
          <!--Grid column-->
          <div class="offset-2 " >

<!--Card-->
<!-- <div class="card"> -->

  <!--Card content-->
  <!-- <div class="card-body"> -->

  <table >
        <thead>
            <tr>

                <th>Date</th>
                <th>Reason</th>
                <th>Status</th>

                
               
            </tr>
        </thead>
        <tbody>
            <?php
            while($result=mysqli_fetch_array($val)){
            ?>
            <tr>
            <td>
                <?php echo $result['date']; ?>
            </td>
            <td>
                <?php echo $result['reason']; ?>
            </td>

            <td>
                <?php 
                if($result['status']=='1'){
                    echo "Approved"; 
                }
                if($result['status']=='2'){
                    echo "Requested"; 
                }
                if($result['status']=='3'){
                    echo "Cancelled"; 
                }
                if($result['status']=='4'){
                    echo "Rejected"; 
                }
                ?>             
                   
            </td>
            </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}
    ?>
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
  $( function() {
    $( "#datepicker" ).datepicker({
      minDate: "+1d",
      maxDate: "+1w"
    });
  } );
  </script>
</body>

</html>
