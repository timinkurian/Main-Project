<?php
require "connect.php";
require "session.php";
$licenceno=getSession('licenceno');
$sql = "SELECT tbl_appointment.appointment_id,tbl_appointment.scheme_id,tbl_appointment.appointment_date,tbl_appointment.registerno,tbl_appointment.remarks,tbl_appointment.appointment_status,tbl_servicestatus.employee_id,tbl_servicestatus.started_time FROM `tbl_appointment` JOIN tbl_servicestatus ON tbl_appointment.appointment_id=tbl_servicestatus.appointment_id WHERE appointment_status='1' AND tbl_appointment.licenceno='$licenceno'";
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
                <th>Remarks</th>
                <th>Started Time</th>
                <th>Employee Name</th>  

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
                <?php echo $result['started_time']; ?>
            </td>
            <td>
            <?php 
                    $sc=$result['employee_id'];
                    $sql1="SELECT * FROM `tbl_employee` JOIN tbl_servicestatus ON tbl_employee.employee_id=tbl_servicestatus.employee_id WHERE tbl_servicestatus.employee_id='$sc'";
                    $val1=mysqli_query($conn,$sql1);
                    $data= mysqli_fetch_assoc($val1);                        
                    echo $data['first_name'];echo" ";echo $data['last_name']; ?>
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