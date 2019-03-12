<?php
require "connect.php";
$model=$_POST['model'];
$sql = "SELECT DISTINCT `variant` FROM `brand` WHERE `model`= '$model'";
// echo $sql;
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    // echo "<option value=Select>Choose user type </option>";
    echo '<option value="">Choose Variant</option>';
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row['variant']."'>".$row['variant']."</option>";
    }
} else {
    echo "0 results";
}