<?php
require "connect.php";
//require "session.php";
//$brand=getSession('brand');
//echo '<option value disabled selected>Select Brand</option>';
$sql = "SELECT * FROM `tbl_spare`";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row['spare_id']."'>".$row['spare']."</option>";
    }
} else {
    echo "0 results";
}
