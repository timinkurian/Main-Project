<?php
require "data/connect.php";

// require ('data/session.php');
//$brand=getSession('brand');
$modelid=getSession('modelid');
$variantid=getSession('variantid');
echo '<option value disabled selected>Choose Service Type</option>';
$sql = "SELECT tbl_servicetype.servicetype,tbl_servicescheme.scheme_id FROM tbl_servicetype JOIN tbl_servicescheme ON tbl_servicetype.servicetype_id=tbl_servicescheme.servicetype_id WHERE tbl_servicescheme.model_id=$modelid AND tbl_servicescheme.variant_id=$variantid";
// echo $sql;
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    // echo "<option value=Select>Choose user type </option>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "$row[scheme_id]";
        echo "<option value='".$row['scheme_id']."'>".$row['servicetype']."</option>";
      
    }
}