<?php
require "connect.php";
require "session.php";
$licenceno=getSession('licenceno');
$sql = "SELECT * FROM `tbl_employee` WHERE licenceno='$licenceno' AND `status`=1";
$val=mysqli_query($conn,$sql);
if ($val) {
    ?>

<html>  
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
        <body>
        <div class="mt-4 py-3">
<div>
<form class="float-right py-3 px-5 mx-3">
<!-- Find service center near you
<select name="district" id="district" required>
    <?php
        // include('districts.php');
    ?> -->
<!-- </select > -->
<select name="department" id="department" required>
<option value="-1">Choose Department</option>
<?php
$sql = "SELECT * FROM `tbl_department`";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<option value='".$row['department_id']."'>".$row['department_name']."</option>";
        }
    } ?>
</select >
<input type="button" class="center-click" data-type="searchdepartment" data-id="department" value="Search">
</form>
</div>
</div>
        <div class="py-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                
                <th>First Name</th>
                <th>Last Name</th>
                <th>Department</th>
                <th>District</th>
                <th>Place</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Photo</th> 
                <th></th>            
                </tr>
            </thead>
            <tbody id="tbbody">
        <?php
            while($result=mysqli_fetch_array($val)){
            ?>
    
            <tr>

                <td>
                    <?php echo $result['first_name']; ?>
                </td>
                <td>
                    <?php echo $result['last_name']; ?>
                </td>
                <?php
                    $sql1="SELECT tbl_district.district,tbl_place.place,tbl_department.department_name,tbl_login.email FROM tbl_place JOIN tbl_employee ON tbl_employee.place_id=tbl_place.place_id JOIN tbl_district ON tbl_place.district_id=tbl_district.district_id JOIN tbl_department ON tbl_department.department_id=tbl_employee.department_id JOIN tbl_login ON tbl_login.user_id=tbl_employee.user_id WHERE tbl_employee.employee_id='$result[employee_id]' AND tbl_employee.status=1";
                    $val1=mysqli_query($conn,$sql1);
                    while($result1=mysqli_fetch_array($val1)){
                        ?>
                <td>
                    <?php echo $result1['department_name']; ?>
                </td>
                <td>
                    <?php echo $result1['district']; ?>
                </td>
                <td>
                    <?php echo $result1['place']; ?>
                </td>
                <td>
                    <?php echo $result['mobileno']; ?>
                </td>
                <td>
                    <?php echo $result1['email']; ?>
                </td>
                <td>
                   
                    <a href="data/<?php echo $result['photo']; ?>" target="_blank">
                    <img src="data/<?php echo $result['photo']; ?>">
            </a>
                </td>
            
            </td>
                <td id="servControl<?php echo $result['employee_id']; ?>"> 
                <input type="button" class="btn btn-indigo cntr-click" data-type="removeemployee" data-id= <?php echo $result['employee_id']; ?> value="Remove">
                    </form>
                </td>
            </tr>
                <?php
                }
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
</body>
</html>