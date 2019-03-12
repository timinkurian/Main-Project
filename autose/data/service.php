<?php
require "connect.php";
//require "session.php";
//$brand=getSession('brand');
$logid=getSession('logid');
$scid=getSession('scid');

$sql = "SELECT DISTINCT `stype` FROM `servicescheme` WHERE `scid`= '$scid'";
// echo $sql;
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    // echo "<option value=Select>Choose user type </option>";
    echo '<option value="">Choose Service Type</option>';
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row['stype']."'>".$row['stype']."</option>";
      
    }
} else {
    echo "0 results";
}