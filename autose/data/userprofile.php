<?php
require "connect.php";
require "session.php";
$logid=getSession('logid');
$sql = "SELECT * FROM `user` WHERE `logid`='$logid'";
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
            table.center {
             margin-left:auto; 
            margin-right:auto;
            }

        </style>

</head>

<body>
<div class="mt-10 py-3">

    <table class="center" >

        <tbody id="tbbody">
            <?php
            while($result=mysqli_fetch_array($val)){

            ?>
            <tr>
            <td>
            Profile Picture
            </td>
            <td>
             <a href="data/<?php echo $result['photo']; ?>" target="_blank">
                <img src="data/<?php echo $result['photo']; ?>">
            </a>
            </td>
            </tr>
            <tr>
                <td>
                    First Name
                </td>

                <td>
                    <?php echo $result['fname']; ?>
                </td>
                </tr>
                <tr>
                <td>
                    Last Name
                </td>
                <td>
                    <?php echo $result['lname']; ?>
                </td>
                </tr>
                <tr>
                <td>
                    Email
                </td>
                <td>
                    <?php echo $result['email']; ?>
                </td>
                </tr>
                <tr>
                <td>
                    Mobile Number
                </td>
                <td>
                    <?php echo $result['mobile']; ?>
                </td>
                </tr>
                <tr>
                <td>
                    District
                </td>
                <td>
                    <?php echo $result['district']; ?>
                </td>
                </tr>
                <tr>
                <td>
                    Place
                </td>
                <td>
                    <?php echo $result['place']; ?>
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