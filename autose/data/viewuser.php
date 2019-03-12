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
                <th>User Id</th>
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
    $sql="SELECT * FROM `user`";
    $res=mysqli_query($conn,$sql);
    if ($res) {
        ?>

        <tbody>
            <?php
            while($result=mysqli_fetch_array($res)){
            ?>
            <tr>
                <td>
                    <?php echo $result['usrid']; ?>
                </td>
                <td>
                    <?php echo $result['fname']; ?>
                </td>
                <td>
                    <?php echo $result['lname']; ?>
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
}?>
</table>
</body>

</html>