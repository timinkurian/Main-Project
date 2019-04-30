<?php
require "connect.php";
require "session.php";
//session_start();


$type = $_POST['type'];
// print_r($_POST);

// __halt_compiler();
switch($type){   
        case 'addcar':
            // echo $type;
            addCar($conn);
            break;
            case 'deletecar':
            deleteCar($conn);
            break;
            case 'appointment':
            makeAppointment($conn);
            break;
        case 'search':
            searchCenter($conn);
            break;
        case 'district':
            districtAdd($conn);
            break;
        case 'profileupdate':
            profileUpdate($conn);
         break;
         case 'changepass':
            changePassword($conn);
         break;
         case 'apmntcancel':
         //echo $_POST['type'];
            appointmentCancel($conn);
      break;
        default:
            break;
    }   
    function addCar($conn){
        $vehno=$_POST['vehno'];
        $variant=$_POST['variant'];
        $color=$_POST['color'];
        $year=$_POST['datepicker'];
        $engineno=$_POST['engineno'];
        $chasisno=$_POST['chasisno'];
        $usrid=getSession('user_id');
        $f=$_FILES['rcbook']['name'];
        $g=$_FILES['car']['name'];
        if($f==$g)
        {
            echo "<script>alert('The file name must be different');window.location='../addcar.php';</script>";
        }
        else{
        // $sql="SELECT `usrid` FROM `user` WHERE `logid`='$val'";
        // $usid=mysqli_query($conn,$sql);
        // $data1 = mysqli_fetch_assoc($usid);
        // $usrid = $data1['usrid'];

        $sql4="SELECT * FROM `tbl_car` WHERE `usr_id`='$usrid' AND `engineno`='$engineno' AND `chasisno`='$chasisno'";
        $count=mysqli_query($conn,$sql4);
        if(mysqli_num_rows($count)<1){
            $sql5="SELECT * FROM `tbl_car` WHERE `regno`='$vehno' OR `engineno`='$engineno' OR `chasisno`='$chasisno'";
            $coun=mysqli_query($conn,$sql5);
            if(mysqli_num_rows($coun)<1){
                $sDirPath = 'upload/car/'.$vehno.'/'; //Specified Pathname
                mkdir($sDirPath,0777,true);
                $path=$_FILES['rcbook']['name'];
                $path = '/upload/car/'.$vehno.'/'.$path;
                $img=$_FILES['rcbook']['name'];
                $path1=$_FILES['car']['name'];
                $path1 = '/upload/car/'.$vehno.'/'.$path1;
                $img1=$_FILES['car']['name'];
        $sql1="INSERT INTO `tbl_car`( `user_id`, `variant_id`, `manufactured_year`, `color`, `regno`, `engineno`, `chasisno`, `rcbook`, `photo`, `status`) VALUES ('$usrid','$variant','$year','$color','$vehno','$engineno','$chasisno','$path','$path1','0')";
        // print_r($sql1);
        // return;
        mysqli_query($conn,$sql1);
        move_uploaded_file($_FILES['rcbook']['tmp_name'],'upload/car/'.$vehno.'/' . $_FILES['rcbook']['name']);
        move_uploaded_file($_FILES['car']['tmp_name'],'upload/car/'.$vehno.'/' . $_FILES['car']['name']);
        echo "<script>alert('Car Added successfully');window.location='../user.php';</script>";
            }
            else{
                echo "<script>alert('Enter only valid datas');window.location='../user.php';</script>";
            }
        }
        else{
            echo "<script>alert('Already Exist');window.location='../user.php';</script>";
        }
    }
    }
function deleteCar($conn){
    $val=$_POST['car'];
    $regno=$_POST['regno'];
    setSession('regno',$regno);
    $brandid=$_POST['brandid'];
    setSession('brandid',$brandid);
    $modelid=$_POST['modelid'];
    setSession('modelid',$modelid);
    $variantid=$_POST['variantid'];
    setSession('variantid',$variantid);
    if($val=="sell"){
        ?>
     <script>window.location='../user.php';</script> 
     <?php
    }
    if($val=="appointment"){
        ?>
     <script>window.location='../servicecenterbybrand.php';</script> 
     <?php
    }
    elseif($val=="delete"){
        $sql="UPDATE `tbl_car` SET `status`=-1 WHERE regno='$regno'";
        // print_r($sql);
        // return;
        mysqli_query($conn,$sql);
        echo "<script>alert('Removed Successfully');window.location='../viewcar.php';</script>";

    }

}
function searchCenter($conn){
    $district=$_POST['dist'];
    $brand=$_POST['brand'];
    $sql="SELECT * FROM `servicecenter` WHERE `district`='$district' AND `brand`='$brand'";
    //die();
    $val=mysqli_query($conn,$sql);
    if ($val) {
    ?>
            <?php
            while($result=mysqli_fetch_array($val)){
            ?>
           <tr>
                <td>
                    <?php echo $result['centername']; ?>
                </td>
                <td>
                    <?php echo $result['brand']; ?>
                </td>
                <td>
                    <?php echo $result['type']; ?>
                </td>
                <td>
                    <?php echo $result['district']; ?>
                </td>
                <td>
                    <?php echo $result['place']; ?>
                </td>
                <td>
                    <?php echo $result['mobile']; ?>
                </td>
                <td>
                    <?php echo $result['licenceno']; ?>
                </td>
                <td id="userControl<?php echo $result['scid']; ?>"> 
                <form name="" id="login" method="post" action="appointment.php" class="mt-5">
                    <input type="text" hidden value="<?php echo $result['scid']; ?>" name="type">
                    <input type="submit" class=" btn btn-primary btn-sm"  value="Make an appointment">
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
function makeAppointment($conn){
    $date=$_POST['datepicker'];
    $vehno=$_POST['regno'];
    $stype=$_POST['stype'];
    $meter=$_POST['odometer'];
    $remarks=$_POST['remarks'];
    $licenceno=$_POST['licenceno'];
    // print_r($licenceno);
    // return;
    // $logid=getSession('logid');
    // $scid=getSession('scid');
    // //fetching userid
    // $sql1="SELECT `usrid` FROM `user` WHERE `logid`='$logid'";
    // $usid=mysqli_query($conn,$sql1);
    // $data1 = mysqli_fetch_assoc($usid);
    // $usrid = $data1['usrid'];
    //fetching service type id
    $sql2="SELECT `department_id` FROM `tbl_servicescheme` WHERE `scheme_id`='$stype'";
    $tid=mysqli_query($conn,$sql2);
    $data2 = mysqli_fetch_assoc($tid);
    $deptid = $data2['department_id'];
 
    //find maximum capacity of srvice center
    $sql3="SELECT `maximum` FROM `tbl_employeecount` WHERE `licenceno`='$licenceno'AND `department_id`='$deptid'";
    $max=mysqli_query($conn,$sql3);
    $data3 = mysqli_fetch_assoc($max);
    $maxcount = $data3['maximum'];
    // print_r($maxcount);
    // return;
    //finding the booking for service type on a particular day
    $sql4="SELECT * FROM `tbl_workcount` WHERE `licenceno`='$licenceno' AND `date`='$date' AND `department_id`='$deptid'";
    $count=mysqli_query($conn,$sql4);
    if(mysqli_num_rows($count)<1){
            //table is empty directly into both tables
            $sql5="INSERT INTO `tbl_workcount`( `date`,`licenceno`,`department_id`, `count`) VALUES ('$date','$licenceno','$deptid',1)";
            mysqli_query($conn,$sql5);
            $sql6="INSERT INTO `tbl_appointment`(`registerno`,`licenceno`, `scheme_id`,`appointment_date`,`odometer`, `remarks`,`appointment_status`) VALUES ('$vehno','$licenceno','$stype','$date','$meter','$remarks','0')";
            // status=0 applied 
            mysqli_query($conn,$sql6);
           // $_SESSION['scid'] = '';
            echo "<script>alert('Added successfully');window.location='../user.php';</script>";


    }
    else{
        $data3 = mysqli_fetch_assoc($count);
        $acount = $data3['count'];
        if($acount<$maxcount){
            //checking already applied or not
            $sql9="SELECT * FROM `tbl_appointment` WHERE `registerno`='$vehno' AND `appointment_date`='$date' AND `status`='0'";
            $count1=mysqli_query($conn,$sql9);
            if(mysqli_num_rows($count1)<1){
                $acount=$acount+1;
                //not already applied and anyone is already applied for that particular service only upate is performed
                 $sql7="UPDATE `tbl_workcount` SET `count`='$acount' WHERE `date`='$date' AND `licenceno`='$licenceno' AND `department_id`='$deptid'";        
                mysqli_query($conn,$sql7);
                //inserting to appointment table
                $sql8="INSERT INTO `tbl_appointment`(`registerno`,`licenceno`, `scheme_id`,`appointment_date`,`odometer`, `remarks`,`appointment_status`) VALUES ('$vehno','$licenceno','$stype','$date','$meter','$remarks','0')";
                //status=0 means applied
                //-1 means cancelled
                //1 started
                //2 pending
                //3 completed
                mysqli_query($conn,$sql8);
                //$_SESSION['scid'] = '';
                echo "<script>alert('Added successfully');window.location='../user.php';</script>";
            }
            else{
                echo "<script>alert('Sorry!! You already made an appointment');window.location='../user.php';</script>";
            }   
        }
        else{
            echo "<script>alert('Please choose another day because of overloads');window.location='../user.php';</script>";
        }
    }
}
function profileUpdate($conn){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $mob=$_POST['mobile'];
    $dist=$_POST['district'];
    $place=$_POST['place'];
    $logid=getSession('logid');
    $sql="SELECT * FROM `user` WHERE `mobile`='$mob' AND `logid`!='$logid'";
    $count=mysqli_query($conn,$sql);
    if(mysqli_num_rows($count)<1){
    $sql="UPDATE `user` SET `fname`='$fname',`lname`='$lname',`mobile`='$mob',`district`='$dist',`place`='$place' WHERE `logid`='$logid'";
    mysqli_query($conn,$sql);
    echo "<script>alert('Profile updated successfully');window.location='../user.php';</script>";
    }
    else{
        echo "<script>alert('The mobile number is already in use');window.location='../usereditprofile.php';</script>";
    }
}
function changePassword($conn){
    $paswd=md5($_POST['pswd']);
    $logid=getSession('logid');
    $sql="UPDATE `login` SET `password`='$paswd' WHERE `logid`='$logid'";
    mysqli_query($conn,$sql);
    echo "<script>alert('Password updated successfully');window.location='../user.php';</script>";
}
function appointmentCancel($conn){
    //echo "<script>alert('Your Booking Cancelled!');window.location='../user.php';</script>";
    $apid=$_POST['id'];
    $sql4="SELECT tbl_appointment.licenceno, tbl_appointment.scheme_id,tbl_appointment.appointment_date,tbl_servicescheme.department_id FROM `tbl_appointment` JOIN tbl_servicescheme  ON tbl_appointment.scheme_id=tbl_servicescheme.scheme_id WHERE tbl_appointment.appointment_id='$apid'";
    $row=mysqli_query($conn,$sql4);
    $data1 = mysqli_fetch_assoc($row);
    $deptid =$data1['department_id'];
    $licenceno=$data1['licenceno'];
    $date=$data1['appointment_date'];
    
    $sql5="SELECT `count` FROM `tbl_workcount` WHERE `department_id`='$deptid' AND `date`='$date' AND `licenceno`='$licenceno'";
    $count=mysqli_query($conn,$sql5);
    $data1 = mysqli_fetch_assoc($count);
    $acount =$data1['count'];
    $acount=$acount-1;
    $sql7="UPDATE `tbl_workcount` SET `count`='$acount' WHERE `date`='$date' AND `licenceno`='$licenceno' AND `department_id`='$deptid'";    
    mysqli_query($conn,$sql7);
    $sql="UPDATE `tbl_appointment` SET `appointment_status`='-1' WHERE `appointment_id`='$apid' ";
    mysqli_query($conn,$sql);
    echo '1';
}