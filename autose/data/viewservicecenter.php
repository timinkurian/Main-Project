<?php
require "connect.php";

$sql = "SELECT * FROM `servicecenter` WHERE `logid` in (SELECT `logid` FROM `login` WHERE `status`=1 and `usertype`='servicecenter')";
$val=mysqli_query($conn,$sql);
if ($val) {
    ?>

<html>  
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
        <body>
        <div class="py-3">
        <table>
            <thead>
                <tr>
                
                <th>Center Name</th>
                <th>Licence Number</th>
                <th>Type</th>
                <th>Brand</th>
                <th>District</th>
                <th>Place</th>
                <th>Contact Number</th>
                <th>Certificate</th>             
                </tr>
            </thead>
        <?php
            while($result=mysqli_fetch_array($val)){

            ?>
        <tbody>
            <tr>

                <td>
                    <?php echo $result['centername']; ?>
                </td>
                <td>
                    <?php echo $result['licenceno']; ?>
                </td>
                <td>
                    <?php echo $result['type']; ?>
                </td>
                <td>
                    <?php echo $result['brand']; ?>
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

            </tr>
                <?php
            }
            ?>
        </tbody>

<?php
   }
 else {
    echo "0 results";
}?>
</table>
</div>
</body>
</html>