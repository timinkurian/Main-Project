<?php
require "connect.php";

$sql = "SELECT * FROM `servicecenter`";
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
Find service center near you
<select name="district" id="district" required>
    <?php
        include('districts.php');
    ?>
</select >
<select name="brand" id="brand" required>
    <?php
        include('brand.php');
    ?>
</select >
<input type="button" class="user-click" data-type="search" data-id="district brand" value="Search">
</form>
</div>
    <table width="100%">
        <thead>
            <tr>
                <th>Center Name</th>
                <th>Brand</th>
                <th>Type</th>
                <th>District</th>
                <th>Place</th>
                <th>Contact Number</th>
                <th>Licence Number</th>
                <th></th> 
            </tr>
        </thead>
        <tbody id="tbbody">
            <?php
            while($result=mysqli_fetch_array($val)){

            ?>
            <tr>
                <td>
                    <?php echo $result['centername']; ?>
                </td>
                <td>
                    <?php echo $result['brand']; ?>
                </td>
                <td>
                    <?php echo $result['type']; ?>
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
                    <?php echo $result['licenceno']; ?>
                </td>
                <td id="userControl<?php echo $result['scid']; ?>"> 
                <form name="" id="login" method="post" action="appointment.php" class="mt-5">
                    <input type="text" hidden value="<?php echo $result['scid']; ?>" name="type">
                    <input type="submit" class=" btn btn-primary btn-sm"  value="Make an appointment">
                </form>
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