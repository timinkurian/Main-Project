<?php 
require('data/connect.php');
require('data/session.php');
$val=getSession('brand');
echo $val;
echo '<option value disabled selected>Select Model</option>';
            $sql = "SELECT * FROM `tbl_model` WHERE `brand_id`='$val'";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            echo "<option value='".$row['model_id']."'>".$row['model_name']."</option>";
        }
        } else {
            echo "0 results";
        }