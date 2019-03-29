<?php
require "connect.php";
//require "session.php";
//$brand=getSession('brand');
echo '<option value disabled selected>Select Brand</option>';
$sql = "SELECT * FROM `tbl_brand`";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row['brand_id']."'>".$row['brand_name']."</option>";
    }
} else {
    echo "0 results";
}
