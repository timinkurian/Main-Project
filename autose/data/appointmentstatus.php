<?php
require "connect.php";
require "session.php";
$userid=getSession('user_id');
$sql = "SELECT * FROM `tbl_appointment` JOIN tbl_car ON tbl_appointment.registerno=tbl_car.regno WHERE tbl_car.user_id='$userid' AND tbl_car.status='1' AND tbl_appointment.appointment_status!='3'";
$val=mysqli_query($conn,$sql);
if ($val) {
    ?>
<html>  

<head>
    <style>
        td, th {
                border: 1px solid black; 
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
    <table>
        <thead>
            <tr>

                <th>Date</th>
                <th>Vehicle Number</th>
                <th>Center Name</th>
                <th>Service Type</th>
                <th>Remarks</th>
                <th>Status</th>
                <th></th>
                
               
            </tr>
        </thead>
        <tbody>
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
                    $r=$result['licenceno'];
                    $sql1="SELECT `center_name` FROM `tbl_servicecenter` WHERE `licenceno`='$r'";
                    $val1=mysqli_query($conn,$sql1);
                    $data= mysqli_fetch_assoc($val1);                        
                    echo $data['center_name']; ?>
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
                <td>
                    <?php
                        if($result['appointment_status']=='0')
                        echo 'Booked'; 
                     ?>
                </td>
                <?php
                    if($result['appointment_status']=='0'){

                ?>
                <td id="servControl<?php echo $result['appointment_id']; ?>"> 
                    <input type="button" class="btn btn-indigo usr-click" data-type="apmntcancel" data-id= <?php echo $result['appointment_id']; ?> value="Cancel">
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
</body>

</html>
<?php
   }
 else {
    echo "0 results";
}