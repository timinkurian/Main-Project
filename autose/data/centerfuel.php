<?php
require "connect.php";
$model=$_POST['model'];
echo '<option value disabled selected>Choose Fuel</option>';
$sql = "SELECT * FROM `tbl_fuel` WHERE fuel_id IN(SELECT fuel_id FROM `tbl_model` INNER JOIN `tbl_variant` on tbl_model.model_id=tbl_variant.model_id WHERE tbl_variant.model_id='$model')";
// echo $sql;
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    // echo "<option value=Select>Choose user type </option>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row['fuel_id']."'>".$row['fuel']."</option>";
    }
} else {
    echo "0 results";
}