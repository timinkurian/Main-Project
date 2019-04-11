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
        case 'editservicetype':
            editServicetype($conn);
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
        case 'editbrand':
        editBrand($conn);
        break;
        case 'editdistrict':
        editDistrict($conn);
        break;
        case 'spareparts':
        spareparts($conn);
        break;
        case 'department':
        addDepartment($conn);
        break;
        case 'editdepartment':
        editDepartment($conn);
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
function editBrand($conn){
    $brandid=$_POST['brandid'];
    $brand=$_POST['brandname'];
    $sql="UPDATE `tbl_brand` SET `brand_name`='$brand' WHERE brand_id='$brandid'";
    mysqli_query($conn,$sql);
    echo "<script>alert('Updated Successfully!');window.location='../adminhome.php';</script>";
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
function editServicetype($conn){
    $stype=$_POST['stype'];
    $id=$_POST['id'];
    $sql="UPDATE `tbl_servicetype` SET `servicetype`='$stype' WHERE `servicetype_id`='$id'";
    mysqli_query($conn,$sql);
    echo "<script>alert('Updated Successfully!');window.location='../adminhome.php';</script>";
}
function approvecenter($conn){
    $sid=$_POST['id'];
     $sql="UPDATE `tbl_login` SET `status`= 1 WHERE `user_id`=(SELECT `user_id` FROM `tbl_servicecenter` WHERE `licenceno`='$sid')";
    mysqli_query($conn, $sql);
    $sql1="SELECT * from tbl_login where user_id=(SELECT `user_id` FROM `tbl_servicecenter` WHERE `licenceno`='$sid')";
    $res=mysqli_query($conn, $sql1);
    $row=mysqli_fetch_assoc($res);
    $a=$row['email'];
    $p="You are approved by the admin, so now you can sign into your account";
    // $m="Go to the link to recover your account:".$link."\r\n".$p;
     mail($a,"Welcome to Real Deal Cars Family",$p);
    // echo "<script>alert('Approved');window.location=../adminhome.php;</script>";
    echo '1';
}
function rejectCenter($conn){
//    alert();
    $sid=$_POST['id'];
    $body=$_POST['body'];
     $sql="UPDATE `tbl_login` SET `status`= '-1' WHERE `user_id`=(SELECT `user_id` FROM `tbl_servicecenter` WHERE `licenceno`='$sid')";
    mysqli_query($conn, $sql);
    $sql1="SELECT * from tbl_login where user_id=(SELECT `user_id` FROM `tbl_servicecenter` WHERE `licenceno`='$sid')";
    $res=mysqli_query($conn, $sql1);
    $row=mysqli_fetch_assoc($res);
    $a=$row['email'];
     mail($a,"Regret E-mail",$body);
     echo "<script>alert('Mail send');window.location='../adminhome.php';</script>";   
   // echo '2';
}
function carAprove($conn){
   
    $vid=$_POST['id'];
    $sql1="SELECT * from tbl_login where user_id=(SELECT `user_id` FROM `tbl_car`  WHERE `car_id`='$vid')";
    $res=mysqli_query($conn,$sql1);
    $result=mysqli_fetch_array($res);
    $email=$result['email'];
    // print_r($email);
    // return;
    $sql="UPDATE `tbl_car` SET `status`= '1' WHERE `car_id`='$vid'";
    mysqli_query($conn, $sql);
    $p="Your request for car registration is approved...! Enjoy all the services provided by Real Deal Cars";
    // $m="Go to the link to recover your account:".$link."\r\n".$p;
     mail($email,"Car Registration Approved",$p);
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
function editDistrict($conn){
    $districtid=$_POST['districtid'];
    $district=$_POST['district'];
    $sql="UPDATE `tbl_district` SET `district`='$district' WHERE `district_id`='$districtid'";
    mysqli_query($conn,$sql);
    // print_r($sql);
    // return;
    echo "<script>alert('Updated Successfully');window.location='../adminhome.php';</script>";
    
}
function spareparts($conn){
    $spare=$_POST['part'];
    $sql="INSERT INTO `tbl_spare`(`spare`) VALUES ('$spare')";
    mysqli_query($conn,$sql);
    echo "<script>alert('Added Successfully');window.location='../spareparts.php';</script>";
}
function addDepartment($conn){
    $department=$_POST['department'];
    $sql="INSERT INTO `tbl_department`(`department_name`) VALUES ('$department')";
    mysqli_query($conn,$sql);
    echo "<script>alert('Added Successfully');window.location='../department.php';</script>";
}
function editDepartment($conn){
    $department=$_POST['department'];
    $id=$_POST['id'];
    $sql="UPDATE `tbl_department` SET `department_name`='$department' WHERE `department_id`='$id'";
    mysqli_query($conn,$sql);
    echo "<script>alert('Updated Successfully');window.location='../adminhome.php';</script>";
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