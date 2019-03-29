<?php
require "connect.php";
require "session.php";
//$brand=getSession('brand');
$brand=$_POST['brand'];
// print_r($brand);
// return;
// echo "$brand";
// $sql1 = "SELECT brand_id FROM `tbl_brand` WHERE `brand_name`= '$brand'";
// print_r($sql);
// return;
// $result1= mysqli_query($conn,$sql1);
echo '<option value disabled selected>Choose Model</option>';
 $sql = "SELECT * FROM `tbl_model` WHERE `brand_id`= '$brand'";
// print_r($sql);
// return;
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row


    while($row = mysqli_fetch_assoc($result)) {

        echo "<option value='".$row['model_id']."'>".$row['model_name']."</option>";
      
    }
} else {
    echo "0 results";
}