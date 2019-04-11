<?php
require "connect.php";
//require "session.php";
//$brand=getSession('brand');
echo '<option value disabled selected>Choose Service Type</option>';
$sql = "SELECT * FROM `tbl_servicetype`";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

        echo "<option value='".$row['servicetype_id']."'>".$row['servicetype']."</option>";
      
    }
}