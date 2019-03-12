<?php
require "connect.php";
//require "session.php";
//$brand=getSession('brand');
$variant=$_POST['variant'];
$sql = "SELECT DISTINCT `fuel` FROM `brand` WHERE `variant`= '$variant'";
// echo $sql;
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo '<option value="">Choose Fuel</option>';
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row['fuel']."'>".$row['fuel']."</option>";
      
    }
} else {
    echo "0 results";
}