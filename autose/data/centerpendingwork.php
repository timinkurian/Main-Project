<?php
require "connect.php";
require "session.php";
$licenceno=getSession('licenceno');
$sql = "SELECT tbl_appointment.appointment_id,tbl_appointment.scheme_id,tbl_appointment.appointment_date,tbl_appointment.registerno,tbl_appointment.remarks,tbl_appointment.appointment_status,tbl_servicestatus.employee_id FROM `tbl_appointment` JOIN tbl_servicestatus ON tbl_appointment.appointment_id=tbl_servicestatus.appointment_id WHERE appointment_status='2' AND licenceno='$licenceno'";
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

    <div class="py-3 offset-md-2">
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
                <td>
                <?php 
                    $apid=$result['appointment_id'];
                    $sql2="SELECT * FROM `tbl_incomplete` WHERE tbl_incomplete.appointment_id='$apid'";
                    $val2=mysqli_query($conn,$sql2);
                    $data2= mysqli_fetch_assoc($val2);                        
                    echo $data2['reason']; ?>
            </td>
            <td>
                    <?php echo $data2['delivery_date']; ?>
                </td>
            </tr>
                <?php
            }
            ?>
        </tbody>
    
<?php
   }
?>
</table>
</div>
</body>
</html>