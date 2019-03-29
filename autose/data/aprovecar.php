<?php
require "connect.php";

$sql = "SELECT * FROM tbl_car WHERE STATUS=0";
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
                padding: 15px;   
            }
            th {
                background-color: gray;
                color: white;
            }
            td {
                background-color: white;
                color: black;
            }
            td img{
                width:100px;
                height:auto;
            }
            td{
                    background-color:white;
                    color:black;
                }
        </style>

</head>

<body>
<div class="mt-4 py-3">

    <table width="100%">
        <thead>
            <tr>
           
            <th>Registration No</th>
            
                <th>Brand</th>
                <th>Model</th>
                <th>Variant</th>
                <th>Color</th>
                <th>Manufatured Year</th>
                <th>Engine Number</th>
                <th>Chasis Number</th>
                <th>RC Book</th>
                <th>Car Photo</th>
                <th>Decision</th>
  
            </tr>
        </thead>
        <tbody id="tbbody">
            <?php
            while($result=mysqli_fetch_assoc($val)){
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
                // print_r($sql3);
                // return;
                     

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
                    <?php echo $result['color']; ?>
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
                <td id="servControl<?php echo $result['car_id']; ?>"> 
                    <input type="button" class="btn btn-indigo adm-click" data-type="carapprove" data-id= <?php echo $result['car_id']; ?> value="Approve">
                    <input type="button" class="btn btn-indigo adm-click" data-type="carreject" data-id= <?php echo $result['car_id']; ?> value="Reject">
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