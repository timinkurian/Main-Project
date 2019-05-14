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
    case 'startwork':
    startWork($conn);
    break;
    case 'complete':
    completeWork($conn);
    break;
    case 'pendingwork':
    pendingWork($conn);
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
    $sq="SELECT * FROM tbl_employee WHERE employee_id='$empid'";
    $res=mysqli_query($conn,$sq);
    $result=mysqli_fetch_array($res);
    $licenceno=$result['licenceno'];
    $department=$result['department_id'];
        //find maximum capacity of srvice center
        $sql3="SELECT `maximum` FROM `tbl_employeecount` WHERE `licenceno`='$licenceno'AND `department_id`='$department'";
        $max=mysqli_query($conn,$sql3);
        $data3 = mysqli_fetch_assoc($max);
        $maxcount = $data3['maximum'];
    $sql4="SELECT * FROM `tbl_workcount` WHERE `licenceno`='$licenceno' AND `date`='$date' AND `department_id`='$department'";
    $count=mysqli_query($conn,$sql4);
    if(mysqli_num_rows($count)<1){
        //table is empty directly into both tables
        $sql5="INSERT INTO `tbl_workcount`( `date`,`licenceno`,`department_id`, `count`) VALUES ('$date','$licenceno','$department',1)";
        mysqli_query($conn,$sql5);
        $sql="INSERT INTO `tbl_leave`(`employee_id`,`date`, `reason`, `status`) VALUES ('$empid','$date','$reason',2)";
        //approve 1 cancel 3 pending 2
        mysqli_query($conn,$sql);
        echo "<script>alert('Applied Successfully');window.location='../employeehome.php';</script>";
    }
    else{
        $data3 = mysqli_fetch_assoc($count);
        $acount = $data3['count'];
        if($acount<$maxcount){
        $data3 = mysqli_fetch_assoc($count);
        $acount = $data3['count'];
        $sql9="SELECT * FROM `tbl_leave` WHERE `employee_id`='$empid' AND `date`='$date'";
        $count1=mysqli_query($conn,$sql9);
        if(mysqli_num_rows($count1)<1){
            // $acount=$acount+1;
            //not already applied and anyone is already applied for that particular service only upate is performed
            //  $sql7="UPDATE `tbl_workcount` SET `count`='$acount' WHERE `date`='$date' AND `licenceno`='$licenceno' AND `department_id`='$department'";        
            // mysqli_query($conn,$sql7);
            $sql="INSERT INTO `tbl_leave`(`employee_id`,`date`, `reason`, `status`) VALUES ('$empid','$date','$reason',2)";
            //approve 1 cancel 3 pending 2 reject 4
            mysqli_query($conn,$sql);
            echo "<script>alert('Applied Successfully');window.location='../employeehome.php';</script>";
        }
        else{
            echo "<script>alert('Sorry!! Already applied');window.location='../employeehome.php';</script>";
        } 
    }
    else{
        $acount=$acount+1;
        //not already applied and anyone is already applied for that particular service only upate is performed
         $sql7="UPDATE `tbl_workcount` SET `count`='$acount' WHERE `date`='$date' AND `licenceno`='$licenceno' AND `department_id`='$department'";        
        mysqli_query($conn,$sql7);
        $sql="INSERT INTO `tbl_leave`(`employee_id`,`date`, `reason`, `status`) VALUES ('$empid','$date','$reason',2)";
        //approved 1 
        // cancel 3 
        // approval pending 2
        // rejected4
        mysqli_query($conn,$sql);
        echo "<script>alert('Heavy workload!! Please contact the manager personally for approval');window.location='../user.php';</script>";
    }
    }
}
function startWork($conn){
    $apid=$_POST['appointment_id'];
    $meter=$_POST['meter'];
    $fuel=$_POST['fuel'];
    $damage=$_POST['damages'];
    $empid=getSession('employeeid');
    $sql="INSERT INTO `tbl_carcondition`( `appointment_id`, `odometer`, `fuel`, `damage`,`employee_id`) VALUES ('$apid','$meter','$fuel','$damage','$empid')";
    mysqli_query($conn,$sql);
    $sql1="UPDATE `tbl_appointment` SET `appointment_status`='1' WHERE `appointment_id`='$apid' ";
    mysqli_query($conn,$sql1);
    echo "<script>alert('Added Successfully');window.location='../employeehome.php';</script>";
}
function completeWork($conn){
    $apid=$_POST['id'];
    $sql="UPDATE `tbl_appointment` SET `appointment_status`='3' WHERE `appointment_id`='$apid'";
    mysqli_query($conn,$sql);
    echo '1';
}
function pendingWork($conn){
    $date=$_POST['datepicker'];
    $reason=$_POST['reason'];
    $apid=$_POST['appointment_id'];
    $sql="INSERT INTO `tbl_incomplete`( `appointment_id`, `reason`, `delivery_date`) VALUES ('$apid','$reason','$date')";
    mysqli_query($conn,$sql);
    $sql1="UPDATE `tbl_appointment` SET `appointment_status`='2' WHERE `appointment_id`='$apid' ";
    mysqli_query($conn,$sql1);
    echo "<script>alert('Added Successfully');window.location='../employeehome.php';</script>";
}