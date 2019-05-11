<?php
require "connect.php";
$schemeid=$_POST['schemeid'];
$sql = "SELECT amount FROM `tbl_servicescheme` WHERE scheme_id='$schemeid'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
echo $row['amount'];
