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
                <th>District</th>            
            </tr>
        </thead>
        <?php
    $sql="SELECT * FROM `district`";
    $res=mysqli_query($conn,$sql);
    if ($res) {
        ?>

        <tbody>
            <?php
            while($result=mysqli_fetch_array($res)){
            ?>
            <tr>
                <td>
                    <?php echo $result['district']; ?>
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
