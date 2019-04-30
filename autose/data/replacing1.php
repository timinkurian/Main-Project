<?php
require "connect.php";
//require "session.php";
//$brand=getSession('brand');
//echo '<option value disabled selected>Select Brand</option>';
$sql = "SELECT * FROM `tbl_spare` WHERE spare_id NOT IN(SELECT spare_id FROM tbl_replacing WHERE scheme_id=1)";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row['spare_id']."'>".$row['spare']."</option>";
    }
} else {
    echo "0 results";
}
