<?php
    require('data/connect.php');
    require('layouts/app_top');
    $val=getSession('department_name');
    echo '<option value disabled selected>Select Department</option>';
    $sql = "SELECT * FROM `tbl_department`";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<option value='".$row['department_id']."'>".$row['department_name']."</option>";
        }
    } 
?>