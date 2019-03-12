<?php
require "connect.php";

$sql = "SELECT * FROM `designation` WHERE `designation`='servicecenter'";
$result = mysqli_query($conn,$sql);
if ($result->num_rows > 0) {
    // output data of each row
    // echo "<option value=Select>Choose user type </option>";
    while($row = $result->fetch_assoc()) {
        echo "<option value='".$row['designation']."'>".$row['designation']."</option>";
    }
} else {
    echo "0 results";
}