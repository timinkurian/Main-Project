<?php
require "connect.php";
//require "session.php";
//$brand=getSession('brand');

$sql = "SELECT DISTINCT * FROM `tbl_district`";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo '<option value disabled selected>Select District</option>';
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row['district_id']."'>".$row['district']."</option>";
    }
} else {
    echo "0 results";
}
