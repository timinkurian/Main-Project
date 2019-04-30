<?php
require "connect.php";
require "session.php";
$licenceno=getSession('licenceno');
$sql = "SELECT tbl_employee.first_name,tbl_employee.last_name,tbl_employee.department_id,tbl_leave.date,tbl_leave.reason,tbl_leave.leave_id FROM tbl_employee  JOIN tbl_leave ON tbl_employee.employee_id=tbl_leave.employee_id WHERE tbl_employee.licenceno='$licenceno' AND tbl_leave.status='1'";
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
                <th>Employee Name</th>
                <th>Department</th>
                <th>Reason</th>
                
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
                        <?php echo $result['first_name']; echo " ";echo $result['last_name'];?>
                    </td>
                    <td>
                        <?php 
                        $sq="SELECT * FROM tbl_department WHERE department_id='$result[department_id]'";
                        $res=mysqli_query($conn,$sq);
                        $r=mysqli_fetch_array($res);
                        echo $r['department_name']; ?>
                    </td>
                    <td>
                        <?php echo $result['reason']; ?>
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