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
            table.center {
             margin-left:auto; 
            margin-right:auto;
            }
        </style>    
    <body>
    <div class="mt-20 py-3">
    <center>
    <table>
        <thead>
            <tr>
                <!-- <th>District</th>             -->
            </tr>
        </thead>
        <?php
    $sql="SELECT * FROM `tbl_spare`";
    $res=mysqli_query($conn,$sql);
    if ($res) {
        ?>

        <tbody>
            <?php
            while($result=mysqli_fetch_array($res)){
            ?>
            <tr>
                <td>
                    <?php echo $result['spare']; ?>
                </td>
                <td>
                        
                        <form name="" id="login" method="post" action="editdistrict.php"  >
                        <input type="text" hidden value="<?php echo $result['spare']; ?>" name="spare">
                        <input type="text" hidden value="<?php echo $result['spare_id']; ?>" name="spareid">
                        <input type="submit" class="btn btn-indigo"  value="Edit">
                        </form>
               
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
