<?php
require "connect.php";
//require "session.php";
//$brand=getSession('brand');

$sql = "SELECT DISTINCT fuel FROM `fuel`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo '<option value="">Choose Fuel</option>';
    while($row = $result->fetch_assoc()) {
        echo "<option value='".$row['fuel']."'>".$row['fuel']."</option>";
    }
} else {
    echo "0 results";
}