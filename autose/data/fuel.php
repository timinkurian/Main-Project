<?php
require "connect.php";
//require "session.php";
//$brand=getSession('brand');
//$variant=$_POST['variant'];
echo '<option value disabled selected>Select Fuel</option>';
$sql = "SELECT * FROM `tbl_fuel`";
// echo $sql;
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
//  echo '<option value="">Choose Fuel</option>';
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row['fuel_id']."'>".$row['fuel']."</option>";
      
    }
} else {
    echo "0 results";
}