<?php
require "connect.php";

$sql = "SELECT * FROM `tbl_servicecenter` WHERE `user_id` in(SELECT `user_id` FROM `tbl_login` WHERE `status`=0 AND `designation_id`=3)";
// print_r($sql);
// return;
$val=mysqli_query($conn,$sql);
if ($val) {
    ?>
<html>

<head>
    <style>
        td, th {
                border: 1px solid black; 
                padding: 25px;   
            }
            th {
                background-color: gray;
                color: white;
            }
            td{
                    background-color:white;
                    color:black;
                }
            td img{
                width:100px;
                height:auto;
            }
        </style>

</head>

<body>
    <table width="100%">
        <thead>
            <tr>
                <th>Center Name</th>
                <th>Licence Number</th>
                <!-- <th>Type</th> -->
                <th>Brand</th>
                <th>District</th>
                <th>Place</th>
                <th>Contact Number</th>
                <th>Certificate</th>
                <th>Decision</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($result=mysqli_fetch_array($val)){
                $sql2="SELECT * FROM tbl_place WHERE place_id=$result[place_id]";
                $val2=mysqli_query($conn,$sql2);
                $result2=mysqli_fetch_assoc($val2);
                $sql3="SELECT * FROM tbl_brand  WHERE brand_id=$result[brand_id]";
                $val3=mysqli_query($conn,$sql3);
                $result3=mysqli_fetch_assoc($val3);
                $sql1="SELECT * FROM tbl_district  WHERE district_id=$result2[district_id]";
                $val1=mysqli_query($conn,$sql1);
                $result1=mysqli_fetch_assoc($val1);

            ?>
            <tr>

                <td>
                    <?php echo $result['center_name']; ?>
                </td>
                <td>
                    <?php echo $result['licenceno']; ?>
                </td>
                <!-- <td> -->
                    <?php //echo $result['']; ?>
                <!-- </td> -->
                <td>
                    <?php echo $result3['brand_name']; ?>
                </td>
                <td>
                    <?php echo $result1['district']; ?>
                </td>
                <td>
                    <?php echo $result2['place']; ?>
                </td>
                <td>
                    <?php echo $result['mobile']; ?>
                </td>
                <td>
                   
                    <a href="data/<?php echo $result['certificate']; ?>" target="_blank">
                    <img src="data/<?php echo $result['certificate']; ?>">
            </a>
                </td>
                <td id="servControl<?php echo $result['licenceno']; ?>"> 
                    <input type="button" class="btn btn-indigo adm-click" data-type="approve" data-id= <?php echo $result['licenceno']; ?> value="Approve">
                    <form name="" id="login" method="post" action="rejectcenter.php"  >
                    <input type="text" hidden value="<?php echo $result['licenceno']; ?>" name="licenceno">
                            <input type="submit" class="btn btn-indigo"  value="Reject">
                    </form>
                </td>
            </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

</body>

</html>
<?php
   }
 else {
    echo "0 results";
}