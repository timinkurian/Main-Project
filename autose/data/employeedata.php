<?php
require "connect.php";
require "session.php";
//session_start();
$type = $_POST['type'];

switch($type){   
    case 'changepass':
        changePassword($conn);
    break;
    case 'employeereg':
        employeeRegistration($conn);
    break;
    case 'leave':
        applyLeave($conn);
    break;
    default:
    break;
}
function changePassword($conn){
    $paswd=md5($_POST['pswd']);
    $userid=getSession('user_id');
    // print_r($userid);
    // return;
    $sql="UPDATE `tbl_login` SET `password`='$paswd',status=2 WHERE `user_id`='$userid'";
    mysqli_query($conn,$sql);
    header('Location:../employeeupdate.php');
}
function employeeRegistration($conn){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $mobile=$_POST['mobno'];
    $district=$_POST['district'];
    $place=$_POST['place'];
    // $photo=$_POST['photo'];
    $userid=getSession('user_id');
    $val=getSession('employeeid');

    $sq="SELECT district_id FROM `tbl_district` WHERE `district`='$district'";//select district id
    $disti=mysqli_query($conn,$sq);
    $dist = mysqli_fetch_assoc($disti);
    $distid=$dist['district_id'];
    //  print_r($distid);
    //  return;
    $sqld="SELECT place FROM `tbl_place` WHERE `place`='$place' AND `district_id`='$distid'";//select place
    $countd=mysqli_query($conn,$sqld);
    if(mysqli_num_rows($countd)<1){//place is not already exist
        $sq1="INSERT INTO `tbl_place`( `district_id`, `place`) VALUES ('$distid','$place')";
        mysqli_query($conn,$sq1);
    }
    $sq2="SELECT place_id FROM `tbl_place` WHERE `place`='$place'";//fetching place id
    $pid=mysqli_query($conn,$sq2);
    $plcid=mysqli_fetch_assoc($pid);
    $placeid=$plcid['place_id'];
    $sDirPath = 'upload/'.$userid.'/'; //Specified Pathname
    mkdir($sDirPath,0777,true);
    $path=$_FILES['photo']['name'];
    $path = 'upload/'.$userid.'/'.$path;
    $img=$_FILES['photo']['name'];

    $sql="UPDATE `tbl_employee` SET `first_name`='$fname',`last_name`='$lname',`mobileno`='$mobile',`place_id`='$placeid',`photo`='$path' WHERE employee_id='$val'";
    mysqli_query($conn,$sql);
    move_uploaded_file($_FILES['photo']['tmp_name'],'upload/'.$userid.'/'. $_FILES['photo']['name']);
    $sql2="UPDATE `tbl_login` SET `status`=1 where `user_id`=$userid";
    mysqli_query($conn,$sql2);
    $sql5="SELECT `licenceno`, `department_id` FROM `tbl_employee` WHERE employee_id='$val'";
    $res=mysqli_query($conn,$sql5);
    $plcid=mysqli_fetch_array($res);
    $licenceno=$plcid['licenceno'];
    $department=$plcid['department_id'];

    $sql4="SELECT `licenceno`, `department_id`, `maximum` FROM `tbl_employeecount` WHERE licenceno='$licenceno' AND department_id='$department'";

    $counte=mysqli_query($conn,$sql4);
    if(mysqli_num_rows($counte)<1){// Not exist
        $sql6="INSERT INTO `tbl_employeecount`(`licenceno`, `department_id`, `maximum`) VALUES ('$licenceno','$department',1)";
        mysqli_query($conn,$sql6);
    }
    else{
        $a=mysqli_fetch_array($counte);
        $count=$a['maximum'];
        $count=$count+1;

        $sql7="UPDATE `tbl_employeecount` SET `maximum`='$count' WHERE licenceno='$licenceno' AND department_id='$department'";
        // print_r($sql7);
        // return;
        mysqli_query($conn,$sql7);
    }
    header('Location:../employeehome.php');

}
function applyLeave($conn){
    $date=$_POST['datepicker'];
    $reason=$_POST['reason'];
    $empid=getSession('employeeid');
    $sql="INSERT INTO `tbl_leave`(`employee_id`,`date`, `reason`, `status`) VALUES ('$empid','$date','$reason',2)";//approve 1 cancel 3 pending 2
    mysqli_query($conn,$sql);
    echo "<script>alert('Applied Successfully');window.location='../employeehome.php';</script>";
}