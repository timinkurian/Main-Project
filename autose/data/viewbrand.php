<?php
require "connect.php";
$sql="SELECT * FROM `brand` ";
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
            td{
                    background-color:white;
                    color:black;
                }
        </style>

</head>

<body>
<div class="mt-4 py-3">
<div>
<form class="float-right py-3 px-5 mx-3">
Find the car
<select name="brand"  id="brand" >

    <?php
        include('brand.php');
    ?>
</select >
<select name="model" id="model" >
</select >
<input type="button" class="admn-click" data-type="searchcar" data-id="brand model" value="Search">
</form>
</div>
    <table width="100%">
        <thead>
            <tr>
            <th>Brand Name</th>
                <th>Model</th>
                <th>Variant</th>
                <th>Fuel Type</th>
            </tr>
        </thead>
        <tbody id="tbbody">
            <?php
            while($result=mysqli_fetch_array($val)){

            ?>
            <tr>
            <td>
                    <?php echo $result['brandname']; ?>
                </td>
                <td>
                    <?php echo $result['model']; ?>
                </td>
                <td>
                    <?php echo $result['variant']; ?>
                </td>
                <td>
                    <?php echo $result['fuel']; ?>
                </td>

            </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    </div>
    <?php
require('../layouts/specialapp_end');
?>
</body>

</html>
<?php
   }
 else {
    echo "0 results";
}