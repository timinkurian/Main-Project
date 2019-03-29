<?php
require "connect.php";
$model=$_POST['model'];
echo '<option value disabled selected>Choose Variant</option>';
$sql = "SELECT * FROM `tbl_variant` WHERE `model_id`= '$model'";
// echo $sql;
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    // echo "<option value=Select>Choose user type </option>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row['variant_id']."'>".$row['variant_name']."</option>";
    }
} else {
    echo "0 results";
}