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
<body>
<div>
<form class="py-2 px-5 mx-5">
<div class="row offset-md-5">
<div class="py-2">
<label for="datepicker">Choose Date</label>
    </div>
<div class="col-md-4">
<input type="text" readonly id="lvdate" class="form-control" name="datepicker"  >
</div> 
<div class="py-2">
<input type="button" class="center-click" data-type="searchleave" data-id="searchleave" value="Search">
</div>
</div>
</form>
</div>
    <div class="py-3 offset-md-3">
        <table>
            <thead>
            <tr>

                <th>Date</th>
                <th>Employee Name</th>
                <th>Department</th>
                <th>Reason</th>
                
            </tr>
            </thead>
        <tbody id="tbbody">
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
        $('#lvdate').datepicker({ changeYear: true, changeMonth: true, maxDate:'7d',minDate:'-6d', defaultDate: d});
</script>   
</body>
</html>