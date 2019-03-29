<?php
require "connect.php";

$sql = "SELECT * FROM `tbl_servicecenter` as s,tbl_place as p,tbl_district as d,tbl_brand as b,tbl_login as l where l.user_id=s.user_id and l.status='0' and l.designation_id='3' and s.place_id=p.place_id and p.district_id=d.district_id and s.brand_id=b.brand_id";
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
    <table>
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
                    <?php echo $result['brand_name']; ?>
                </td>
                <td>
                    <?php echo $result['district']; ?>
                </td>
                <td>
                    <?php echo $result['place']; ?>
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
                    <input type="button" class="btn btn-indigo adm-click" data-type="reject" data-id= <?php echo $result['licenceno']; ?> value="Reject">
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