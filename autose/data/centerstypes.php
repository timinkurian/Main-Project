<?php
require "connect.php";
//require "session.php";
//$brand=getSession('brand');
$logid=getSession('logid');
$sql1="SELECT `scid` FROM `servicecenter` WHERE `logid`='$logid'";
$sci = mysqli_query($conn,$sql1);
$data1 = mysqli_fetch_assoc($sci);
$scid = $data1['scid'];
$sql = "SELECT DISTINCT `sname` FROM `stypes` WHERE `scid`= '$scid'";
// echo $sql;
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    // echo "<option value=Select>Choose user type </option>";
    echo '<option value="">Select Service Type</option>';
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row['sname']."'>".$row['sname']."</option>";
      
    }
} else {
    echo "0 results";
}