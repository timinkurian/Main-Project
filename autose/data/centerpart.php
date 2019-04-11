<?php
require "connect.php";
$fuel=$_POST['fuel'];
$model=$_POST['model'];
echo $model;
echo '<option value disabled selected>Choose Parts</option>';
$sql = "SELECT * FROM `tbl_parts` WHERE fuel_id='$fuel' AND `model_id`='$model'";
echo $sql;
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    // echo "<option value=Select>Choose user type </option>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row['parts_id']."'>".$row['parts_name']."</option>";
    }
} else {
    echo "0 results";
}