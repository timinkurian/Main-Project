<?php
require "connect.php";
require "session.php";
$logid=getSession('logid');
$sql = "SELECT * FROM `appointment` WHERE `scid` = (SELECT `scid` FROM `servicecenter` WHERE `logid`='$logid') AND `status`='booked'";
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
            td{
                    background-color:white;
                    color:black;
                }
            td img{
                width:100px;
                height:auto;
            }
        </style>

</head>

<body>
    <table>
        <thead>
            <tr>
                
                <th>Customer Name</th>
                <th>Vehicle Number</th>
                <th>Date</th>
                <th>Service Type</th>   
                <th>Remarks</th>
                <th></th>
               
            </tr>
        </thead>
        <tbody>
            <?php
            while($result=mysqli_fetch_array($val)){
            ?>
            <tr>

                <td>
                    <?php 
                        $r=$result['usrid'];
                        $sql1="SELECT `fname` FROM `user` WHERE `usrid`='$r'";
                        $val1=mysqli_query($conn,$sql1);
                        $data= mysqli_fetch_assoc($val1);                        
                        echo $data['fname']; ?>
                </td>
                <td>
                    <?php echo $result['vehno']; ?>
                </td>
                <td>
                    <?php echo $result['date']; ?>
                </td>
                <td>
                    <?php 
                    echo $result['sname']; ?>
                </td>

                <td>
                    <?php echo $result['remarks']; ?>
                </td>
                <td id="servControl<?php echo $result['apid']; ?>"> 
                    <input type="button" class="btn btn-indigo cntr-click" data-type="started" data-id= <?php echo $result['apid']; ?> value="Started">
                </td>
                
            </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>
<?php
   }
 else {
    echo "0 results";
}