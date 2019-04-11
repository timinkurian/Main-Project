<?php
require "connect.php";
require "session.php";

$sql = "SELECT * FROM tbl_user";
// print_r($sql);
// return;
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
            td {
                background-color: white;
                color: black;
            }
            td img{
                width:100px;
                height:auto;
            }

        </style>    
    <body>
    <div class="mt-20 py-3">
    <div class="row">
            <div class="col-md-6 offset-md-1">
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>District</th>
                <th>Place</th>
                <th>Profile Photo</th>              
            </tr>
        </thead>

        <tbody>
            <?php
    while($result=mysqli_fetch_assoc($val)){
        $sql1="SELECT * FROM tbl_login WHERE user_id=$result[user_id]";
        $val1=mysqli_query($conn,$sql1);
        $result1=mysqli_fetch_assoc($val1);
        $sql2="SELECT * FROM tbl_place WHERE place_id=$result[place_id]";
        $val2=mysqli_query($conn,$sql2);
        $result2=mysqli_fetch_assoc($val2);
        $sql3="SELECT * FROM tbl_district  WHERE district_id=$result2[district_id]";
        $val3=mysqli_query($conn,$sql3);
        $result3=mysqli_fetch_assoc($val3);
            ?>
            <tr>
                <td>
                    <?php echo $result['first_name']; ?>
                </td>
                <td>
                    <?php echo $result['last_name']; ?>
                </td>
                <td>
                    <?php echo $result1['email']; ?>
                </td>
                <td>
                    <?php echo $result['mobile']; ?>
                </td>
                <td>
                    <?php echo $result3['district']; ?>
                </td>
                <td>
                    <?php echo $result2['place']; ?>
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

<?php
   }
 else {
    echo "0 results";
 }
?>
</table>
</div>
</div>
</div>
</body>

</html>