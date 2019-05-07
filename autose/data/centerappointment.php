<?php
require "connect.php";
require "session.php";
$licenceno=getSession('licenceno');
$sql = "SELECT * FROM `tbl_appointment` WHERE appointment_status='0' AND licenceno='$licenceno'";
$val=mysqli_query($conn,$sql);
if ($val) {
    ?>

<html>  
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
        <body>
<div>
<form class="py-2 px-5 mx-5">
<div class="row offset-md-5">
<div class="py-2">
<label for="datepicker">Choose Date</label>
    </div>
<div class="col-md-4">
<input type="text" readonly id="apdate" class="form-control" name="datepicker" data-type="dat" >
</div> 
<div class="py-2">
<input type="button" class="center-click" data-type="searchappointment" data-id="appointment" value="Search">
</div>
</div>
</form>
</div>


        <div class="py-3 offset-md-2">
        <table>
            <thead>
                <tr>
                
                <th>Date</th>
                <th>Vehicle Number</th>
                <th>Service Type</th>
                <th>Remarks</th>
                <th></th>           
                </tr>
            </thead>
        <tbody id="tbbody">
            <?php
            while($result=mysqli_fetch_array($val)){
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
                    $sc=$result['scheme_id'];
                    $sql1="SELECT `servicetype` FROM `tbl_servicetype` JOIN tbl_servicescheme ON tbl_servicetype.servicetype_id=tbl_servicescheme.servicetype_id WHERE tbl_servicescheme.scheme_id='$sc'";
                    $val1=mysqli_query($conn,$sql1);
                    $data= mysqli_fetch_assoc($val1);                        
                    echo $data['servicetype']; ?>
            </td>
                <td>
                    <?php echo $result['remarks']; ?>
                </td>
                
                <?php
                    if($result['appointment_status']=='0'){

                ?>

                <?php
                }
                ?>
            </tr>
                <?php
            }
            ?>
        </tbody>

<?php
   }
 else {
    echo "0 results";
}?>
</table>
</div>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="assets/css/dtpicker.css">
  <!-- //code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css -->
  <link rel="stylesheet" href="/resources/demos/style.css">
<script>
        var d = new Date();
        var year = d.getFullYear();
        d.setFullYear(year);
        $('#apdate').datepicker({ changeYear: true, changeMonth: true, maxDate:'7d',minDate:'-6d', defaultDate: d});
</script>
</body>
</html>