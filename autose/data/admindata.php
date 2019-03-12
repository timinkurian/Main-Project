<?php
require "connect.php";
require "session.php";
//session_start();
$type = $_POST['type'];
// print_r($_POST);

// __halt_compiler();
switch($type){   
        case 'brand':
            // echo $type;
            newBrand($conn);
        break;
        case 'approve':
            approvecenter($conn);
        break;
        case 'reject':
            rejectCenter($conn);
        break;
        case 'district':
            districtAdd($conn);
        break;
        case 'carapprove':
            carAprove($conn);
        break;
        case 'carreject':
            carReject($conn);
        break;
        case 'searchcar':
        searchCar($conn);
    break;
        default:
        break;
    }   
//adding new brand
function newBrand($conn){
    $brand=$_POST['brand'];
    $model=$_POST['model'];
    $variant=$_POST['variant'];
    $fuel=$_POST['fuel'];
    $sql4="SELECT * FROM `brand` WHERE `brandname`='$brand' AND `model`='$model' AND `variant`='$variant' AND `fuel`='$fuel'";
    $count=mysqli_query($conn,$sql4);
    if(mysqli_num_rows($count)<1){
    $sql="INSERT INTO `brand`(`brandname`, `model`, `variant`, `fuel`) VALUES('$brand','$model','$variant','$fuel')";
    mysqli_query($conn,$sql);
    echo "<script>alert('Added Successfully!');window.location='../adminhome.php';</script>";
    }
    else{
        echo "<script>alert('Already Exists!');window.location='../adminbrand.php';</script>";
    }
}
function approvecenter($conn){
    $sid=$_POST['id'];
     $sql="UPDATE `login` SET `status`= 1 WHERE `logid`=(SELECT `logid` FROM `servicecenter` WHERE `scid`='$sid')";
    mysqli_query($conn, $sql);
    // echo "<script>alert('Approved');window.location=../adminhome.php;</script>";
    echo '1';
}
function rejectCenter($conn){
//    alert();
    $sid=$_POST['id'];
     $sql="UPDATE `login` SET `status`= '-1' WHERE `logid`=(SELECT `logid` FROM `servicecenter` WHERE `scid`='$sid')";
    mysqli_query($conn, $sql);
    // echo "<script>alert('Approved');window.location=../adminhome.php;</script>";
    echo '2';
}
function carAprove($conn){
   
    $vid=$_POST['id'];
    $sql="UPDATE `car` SET `status`= 'aproved' WHERE `vid`='$vid'";
    mysqli_query($conn, $sql);
    echo '1';

}

function carReject($conn){
    $vid=$_POST['id'];
    $sql="UPDATE `car` SET `status`= 'rejected' WHERE `vid`='$vid'";
    mysqli_query($conn, $sql);
    echo'2';

}
function districtAdd($conn){//adding district
    $dname=$_POST['dname'];
    $sql4="SELECT * FROM `district` WHERE `district`='$dname'";
    $count=mysqli_query($conn,$sql4);
    if(mysqli_num_rows($count)<1){
    $sql="INSERT INTO district (district) VALUES ('$dname')";
    mysqli_query($conn,$sql);
    echo "<script>alert('Added successfully');window.location='../adminhome.php';</script>";   
   }
   else{
    echo "<script>alert('Already Exists!');window.location='../districtadd.php';</script>";
   }
}

    function searchCar($conn){
        $brand=$_POST['brand'];
        $model=$_POST['model'];
            $sql="SELECT * FROM `brand` WHERE `brandname`='$brand' AND `model`='$model'";
        //die();
        $val=mysqli_query($conn,$sql);
        if ($val) {
        ?>
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
                    </form> 
                    </td>
    
                </tr>
                    <?php
                }
                ?>
    <?php
       }
     else {
        echo "0 results";
    }?>
    
    <?php
    }