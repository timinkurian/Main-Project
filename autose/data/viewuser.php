<?php
require "connect.php";
require "session.php";

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
        <?php
$sql = "SELECT * FROM `tbl_user` as s,tbl_place as p,tbl_district as d,tbl_login as l where l.user_id=s.user_id and l.status='1' and l.designation_id='1' and s.place_id=p.place_id and p.district_id=d.district_id";
$val=mysqli_query($conn,$sql);
if ($val) {
        ?>

        <tbody>
            <?php
            while($result=mysqli_fetch_array($val)){
            ?>
            <tr>
                <td>
                    <?php echo $result['first_name']; ?>
                </td>
                <td>
                    <?php echo $result['last_name']; ?>
                </td>
                <td>
                    <?php echo $result['email']; ?>
                </td>
                <td>
                    <?php echo $result['mobile']; ?>
                </td>
                <td>
                    <?php echo $result['district']; ?>
                </td>
                <td>
                    <?php echo $result['place']; ?>
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
</body>

</html>