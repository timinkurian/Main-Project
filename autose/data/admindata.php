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
        case 'newmodel':
        //echo $type;
        newModel($conn);
        break;
        case 'newvariant':
        //echo $type;
        newVariant($conn);
        break;
        case 'servicetype':
        //echo $type;
        serviceType($conn);
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
    // $model=$_POST['model'];
    // $variant=$_POST['variant'];
    // $fuel=$_POST['fuel'];
    $sql4="SELECT * FROM `tbl_brand` WHERE `brand_name`='$brand'";
    $count=mysqli_query($conn,$sql4);
    if(mysqli_num_rows($count)<1){
    $sql="INSERT INTO `tbl_brand`(`brand_name`) VALUES('$brand')";
    mysqli_query($conn,$sql);
    echo "<script>alert('Added Successfully!');window.location='../adminhome.php';</script>";
    }
    else{
        echo "<script>alert('Already Exists!');window.location='../adminbrand.php';</script>";
    }
}
function newModel($conn){
    $model=$_POST['model'];
    $brand=$_POST['brand'];
    $sql4="SELECT * FROM `tbl_model` WHERE `brand_id`='$brand' AND `model_name`='$model'";
    $count=mysqli_query($conn,$sql4);
    if(mysqli_num_rows($count)<1){
    $sql="INSERT INTO `tbl_model`(`brand_id`,`model_name`) VALUES('$brand','$model')";
    mysqli_query($conn,$sql);
    echo "<script>alert('Added Successfully!');window.location='../adminhome.php';</script>";
    }
    else{
        echo "<script>alert('Already Exists!');window.location='../adminmodel.php';</script>";
    }
}
function newVariant($conn){
    $model=$_POST['model'];
    $variant=$_POST['variant'];
    $fuel=$_POST['fuel'];
    $sql4="SELECT * FROM `tbl_variant` WHERE `model_id`='$model' AND `variant_name`='$variant' AND `fuel_id`='$fuel'";
    $count=mysqli_query($conn,$sql4);
    if(mysqli_num_rows($count)<1){
    $sql="INSERT INTO `tbl_variant`(`model_id`, `fuel_id`, `variant_name`) VALUES ('$model','$fuel','$variant')";
    mysqli_query($conn,$sql);
    echo "<script>alert('Added Successfully!');window.location='../adminhome.php';</script>";
    }
    else{
        echo "<script>alert('Already Exists!');window.location='../adminvariant.php';</script>";
    }
}
function serviceType($conn){
    $stype=$_POST['stype'];
    $sql4="SELECT * FROM `tbl_servicetype` WHERE `servicetype`='$stype'";
    $count=mysqli_query($conn,$sql4);
    if(mysqli_num_rows($count)<1){
    $sql="INSERT INTO `tbl_servicetype`(`servicetype`) VALUES('$stype')";
    mysqli_query($conn,$sql);
    echo "<script>alert('Added Successfully!');window.location='../adminhome.php';</script>";
    }
    else{
        echo "<script>alert('Already Exists!');window.location='../servicetype.php';</script>";
    }
}
function approvecenter($conn){
    $sid=$_POST['id'];
     $sql="UPDATE `tbl_login` SET `status`= 1 WHERE `user_id`=(SELECT `user_id` FROM `tbl_servicecenter` WHERE `licenceno`='$sid')";
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
    $sql="UPDATE `tbl_car` SET `status`= '1' WHERE `car_id`='$vid'";
    mysqli_query($conn, $sql);
    echo '1';

}

function carReject($conn){
    $vid=$_POST['id'];
    $sql="UPDATE `tbl_car` SET `status`= '2' WHERE `car_id`='$vid'";
    mysqli_query($conn, $sql);
    echo'2';

}
function districtAdd($conn){//adding district
    $dname=$_POST['dname'];
    $sql4="SELECT * FROM `tbl_district` WHERE `district`='$dname'";
    $count=mysqli_query($conn,$sql4);
    if(mysqli_num_rows($count)<1){
    $sql="INSERT INTO tbl_district (district) VALUES ('$dname')";
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