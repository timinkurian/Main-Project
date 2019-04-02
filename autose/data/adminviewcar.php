<?php
require "connect.php";

$sql = "SELECT * FROM `tbl_car` WHERE `status`='1'";
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
            td img{
                width:100px;
                height:auto;
            }
            td {
                background-color: white;
                color: black;
            }
        </style>

</head>

<body>
<div class="mt-4 py-3">
<div>

</div>
    <table width="100%">
        <thead>
        <tr>
                <th>Registration No</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Variant</th>
                <th>Manufatured Year</th>
                <th>Engine Number</th>
                <th>Chasis Number</th>
                <th>RC Book</th>
                <th>Car Photo</th>
            </tr>
        </thead>
        <tbody id="tbbody">
            <?php
            while($result=mysqli_fetch_array($val)){
                $sql1="SELECT * FROM tbl_variant WHERE variant_id=$result[variant_id]";
                $val1=mysqli_query($conn,$sql1);
                $result1=mysqli_fetch_assoc($val1);
                $sql2="SELECT * FROM tbl_model WHERE model_id=$result1[model_id]";
                $val2=mysqli_query($conn,$sql2);
                $result2=mysqli_fetch_assoc($val2);
                // print_r($sql2);
                // return;
                $sql3="SELECT * FROM tbl_brand  WHERE brand_id=$result2[brand_id]";
                $val3=mysqli_query($conn,$sql3);
                $result3=mysqli_fetch_assoc($val3);
            ?>
            <tr>
            <td>
                    <?php echo $result['regno']; ?>
                </td>
                <td>
                    <?php echo $result3['brand_name']; ?>
                </td>
                <td>
                    <?php echo $result2['model_name']; ?>
                </td>
                <td>
                    <?php echo $result1['variant_name']; ?>
                </td>
                <td>
                    <?php echo $result['manufactured_year']; ?>
                </td>
                <td>
                    <?php echo $result['engineno']; ?>
                </td>
                <td>
                    <?php echo $result['chasisno']; ?>
                </td>
                <td>
                   
                    <a href="data/<?php echo $result['rcbook']; ?>" target="_blank">
                    <img src="data/<?php echo $result['rcbook']; ?>">
            </a>
                </td>
                <td>
                   
                   <a href="data/<?php echo $result['photo']; ?>" target="_blank">
                   <img src="data/<?php echo $result['photo']; ?>">
           </a>
               </td>
            </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    </div>
</body>

</html>
<?php
   }
 else {
    echo "0 results";
}