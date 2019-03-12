<?php
require "connect.php";
//require "session.php";
//$brand=getSession('brand');
$logid=getSession('logid');
$scid=getSession('scid');
$sql1="SELECT `usrid` FROM `user` WHERE `logid`='$logid'";
$res=mysqli_query($conn,$sql1);
$data1 = mysqli_fetch_assoc($res);
$usrid = $data1['usrid'];
$sql2="SELECT `brand` FROM `servicecenter` WHERE `scid`='$scid'";
$res1=mysqli_query($conn,$sql2);
$data2 = mysqli_fetch_assoc($res1);
$brand = $data2['brand'];
$sql = "SELECT DISTINCT `vehno` FROM `car` WHERE `usrid`= '$usrid' AND `brand`='$brand' AND `status`='aproved'";
// echo $sql;
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    // echo "<option value=Select>Choose user type </option>";
    echo '<option value="">Choose your car</option>';
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row['vehno']."'>".$row['vehno']."</option>";
      
    }
} else {
    echo "0 results";
}