<?php
require "connect.php";

$sql = "SELECT * FROM `car` WHERE `status`='aproved'";
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

            ?>
            <tr>
            <td>
                    <?php echo $result['vehno']; ?>
                </td>
                <td>
                    <?php echo $result['brand']; ?>
                </td>
                <td>
                    <?php echo $result['model']; ?>
                </td>
                <td>
                    <?php echo $result['variant']; ?>
                </td>
                <td>
                    <?php echo $result['man_year']; ?>
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
                   
                   <a href="data/<?php echo $result['image']; ?>" target="_blank">
                   <img src="data/<?php echo $result['image']; ?>">
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