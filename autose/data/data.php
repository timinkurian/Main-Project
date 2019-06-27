<?php
require "connect.php";
require "session.php";
//session_start();


$type = $_POST['type'];
// print_r($_POST);

// __halt_compiler();
switch($type){   
        case 'login':
            // echo $type;
            userLogin($conn);
            break;

            case 'reguser':
            regUser($conn);
            break;
        case 'userreg':
            userProfile($conn);
            break;
        case 'centerreg':
            centerRegistration($conn);
         break;
         case 'forget':
            forgetPassword($conn);
        break;
        case 'forgototp':
            confirmOTP($conn);
        break;
        case 'changepassword':
            changePassword($conn);
        break;
        case 'resendotp':
            resendOTP($conn);
        break;
        case 'changepass':
        changePassword1($conn);
        break;
        default:
            break;
    }   

function regUser($conn){
    $email=$_POST['email'];
    $desg=$_POST['designation'];
    $pswd=md5($_POST['pswd']);
    $cpswd=md5($_POST['cpswd']);
    $sql = "SELECT * FROM `tbl_login` WHERE email='$email'";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res)>0){
    //print_r($count);
    //__halt_compiler();

    echo"<script> alert('Already exist');window.location ='../reguser.php';</script>";
    }
   
    else
    {
       // $sqldes="SELECT designation_id FROM tbl_designation WHERE designation='user'";
       // $desid = mysqli_query($conn, $sqldes);
       // $desg = mysqli_fetch_assoc($desid);
       // $desgid=$desg['designation_id'];
        $sqllog="INSERT INTO `tbl_login` (email,password,designation_id,status) VALUES ('$email','$pswd',$desg,'2')";
        // print_r($sqllog);
        // return;
        $res1 = mysqli_query($conn, $sqllog);
        $sql = "SELECT * FROM `tbl_login` WHERE email='$email' and password = '$pswd'";
        $res = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($res);
        $id = $result['user_id'];
        $designation_id = $result['designation_id'];
        setSession('user_id', $id);
        setSession('designation_id', $designation_id);
        if($designation_id==1)
        {
            header('Location:../registration.php');
          //  echo"<script> alert('Registration Successful');window.location ='../registration.php';</script>";
        }
        else if($designation_id==3){
            header('Location:../servicecenteradd.php');
        }
       
    } 

}

//user fns
function userLogin($conn){
    $uname = $_POST['username'];
    $password = md5($_POST['password']);
    if(isset($_SESSION['user_id'])){
        echo "<script>alert('Already signed in another account');window.location='../index.php';</script>";
    }
    else{

    
    $sql = "SELECT * FROM `tbl_login` WHERE email='$uname' and password = '$password' and status >=1";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res)>0){
        $result = mysqli_fetch_assoc($res);
      //  print_r($result);
        //return;
        $a=$result['designation_id'];
        if($a == 2)//admin
        { 
            $id = $result['user_id'];
            $designation_id = $result['designation_id'];
            setSession('user_id', $id);
            setSession('designation_id', $designation_id);
            // print_r($designation_id);
            // return;
            echo "<script>window.location='../adminhome.php';</script>";

        }
        else if($a=="1")//user
        { 
            $id = $result['user_id'];
            $designation_id = $result['designation_id'];
            $status=$result['status'];
            setSession('user_id', $id);
            setSession('designation_id', $designation_id);
            //return;
            if($status=="2"){
                // return;
                header('Location:../registration.php');
                
            }
            else{
                
            echo "<script>window.location='../user.php';</script>";

            }

           
        }

        else if($a==3)//service center
        { 
            $id = $result['user_id'];
            $designation_id = $result['designation_id'];
            $status=$result['status'];
            $sql = "SELECT `brand_id`,`licenceno` FROM `tbl_servicecenter` WHERE `user_id`='$id'";
            $res1 = mysqli_query($conn, $sql);
            $result=mysqli_fetch_array($res1);
            $brandid=$result['brand_id'];
            $licenceno=$result['licenceno'];
            // print_r($brandid);
            // return;
            setSession('user_id', $id);
           // setSession('logid', $id);
            setSession('designation_id', $designation_id);
            setSession('brand',$brandid);
            setSession('licenceno',$licenceno);
            // return;
            if($status=="2"){
                header('Location:../servicecenteradd.php');
            }
            else if($status=="1"){

            echo "<script>window.location='../sevricecenterhome.php';</script>";

            }
        }
            else if($a==4)//employee
            { 
                $id = $result['user_id'];
                $designation_id = $result['designation_id'];
                $status=$result['status'];
                $sql = "SELECT employee_id,licenceno FROM `tbl_employee` WHERE `user_id`='$id'";
                $res1 = mysqli_query($conn, $sql);
                $result=mysqli_fetch_array($res1);
                $employeeid=$result['employee_id'];
                $licenceno=$result['licenceno'];
                // print_r($brandid);
                // return;
                setSession('user_id', $id);
               // setSession('logid', $id);
                setSession('designation_id', $designation_id);
                setSession('employeeid',$employeeid);
                setSession('licenceno',$licenceno);
                // return;
                if($status=="2"){
                    header('Location:../employeeupdate.php');
                }
                if($status=="3"){
                    header('Location:../employeechange.php');
                }
                else if($status=="1"){
    
                echo "<script>window.location='../employeehome.php';</script>";
    
                }
            }
            else
        {
            // echo $sql;
            //echo "<script>alert('You are not an authorised user');window.location='../index.php';</script>";
                //header("location:../index.php"); 
        }
        

        
    }
    else{
        echo "<script>alert('Invalid Username or Password');window.location='../index.php';</script>";
    }
}
}


function userProfile($conn){
    $fname=$_POST['fname'];
   // $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $mob=$_POST['mobno'];
    // print_r($mob);
    // return;
    $dist=$_POST['district'];
    $place=$_POST['place'];  
    //$logid=getSession('logid');
    $val=getSession('user_id');
    //print_r($dist);
    //return;
    $sq="SELECT district_id FROM `tbl_district` WHERE `district`='$dist'";//select district id
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
    // print_r($placeid);
    // return;
    $sql="SELECT * FROM `tbl_user` WHERE `mobile`='$mob' ";
    $count=mysqli_query($conn,$sql);
    if(mysqli_num_rows($count)<1){
        $sDirPath = 'upload/'.$val.'/'; //Specified Pathname
        mkdir($sDirPath,0777,true);
        $path=$_FILES['photo']['name'];
        $path = 'upload/'.$val.'/'.$path;
        $img=$_FILES['photo']['name'];
    //  print_r($mob);
    // return;
    $sql= "INSERT INTO `tbl_user` (`user_id`,`first_name`,`last_name`,`mobile`,`place_id`,`photo`) VALUES ($val,'$fname','$lname','$mob',$placeid,'$path')";
    //  print_r($sql);
    //   return;
    $r2=mysqli_query($conn,$sql);
    move_uploaded_file($_FILES['photo']['tmp_name'],'upload/'.$val.'/'. $_FILES['photo']['name']);
    $sql2="UPDATE `tbl_login` SET `status`=1 where `user_id`=$val";
    mysqli_query($conn,$sql2);
    echo "<script>alert('Profile updated successfully');window.location='../user.php';</script>";
    }
    else{
        echo "<script>alert('Check the data you provided');window.location='../registration.php';</script>";
    }
        
}


function centerRegistration($conn){
    $cname=$_POST['cname'];
    $licno="lic".$_POST['licno'];
//$type=$_POST['types'];
    $brand=$_POST['brand'];
    // print_r($brand);
    // return;
    $mob=$_POST['mobno'];
    $dist=$_POST['district'];
    $place=$_POST['place'];
    $val=getSession('user_id');
    // $z="select * from login where user_id='$val'";
    // $r1=mysqli_query($conn,$z);
    // $row=mysqli_fetch_array($r1);
    // $email=$row[1];
    //print_r($email);
        $sql="SELECT * FROM `tbl_servicecenter` WHERE  `licenceno`='$licno'";
        $count=mysqli_query($conn,$sql);
        if(mysqli_num_rows($count)<1){
            $sDirPath = 'upload/'.$val.'/'; //Specified Pathname
            mkdir($sDirPath,0777,true);
            $cert=$_FILES['certificate']['name'];
            $cert = 'upload/'.$val.'/'.$cert;
            $img=$_FILES['certificate']['name'];
            $photo=$_FILES['photo']['name'];
            $ph='upload/'.$val.'/'.$photo;


            $sq="SELECT district_id FROM `tbl_district` WHERE `district`='$dist'";//select district id
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

            $sq3="SELECT brand_id FROM `tbl_brand` WHERE `brand_name`='$brand'";//fetching brand id
            $bid=mysqli_query($conn,$sq3);
            $brndid=mysqli_fetch_assoc($bid);
            $brandid=$brndid['brand_id'];

            $sql5= "INSERT INTO `tbl_servicecenter`(`licenceno`, `user_id`, `place_id`, `brand_id`, `center_name`,`photo`,`certificate`, `mobile`) VALUES('$licno','$val','$placeid','$brand','$cname','$ph','$cert','$mob')";
            mysqli_query($conn,$sql5);
             move_uploaded_file($_FILES['certificate']['tmp_name'],'upload/'.$val.'/' . $_FILES['certificate']['name']);
             move_uploaded_file($_FILES['photo']['tmp_name'],'upload/'.$val.'/' . $_FILES['photo']['name']);
     
            $sqll="UPDATE `tbl_login` SET `status`=0 where `user_id`=$val";
             mysqli_query($conn,$sqll);
            //  $_SESSION['user_id'] = '';
            //  $_SESSION['designation_id'] = '';
            session_destroy();
        
            echo "<script>alert('Updated successfully...!! Wait for Approvel');window.location='../index.php';</script>";
    }
    else{
        echo "<script>alert('Service center already registered with the license number!');window.location='../index.php';</script>";
    }

    /* if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }*/
         
}

function forgetPassword($conn){
    
    $email=$_POST['email'];
    $sql="SELECT * FROM `tbl_login` WHERE `email`='$email'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
    $a=$row['email'];
    if($a==$email)
	{
	$e=$row['email'];
   // $p="Password:".$row['password'];
   setSession('email', $e);
   $n = 6; 
   // Function to generate OTP 
   function generateNumericOTP($n) { 
       
       // Take a generator string which consist of 
       // all numeric digits 
       $generator = "1357902468"; 
   
       // Iterate for n-times and pick a single character 
       // from generator and append it to $result 
       
       // Login for generating a random character from generator 
       //	 ---generate a random number 
       //	 ---take modulus of same with length of generator (say i) 
       //	 ---append the character at place (i) from generator to result 
   
       $result = ""; 
   
       for ($i = 1; $i <= $n; $i++) { 
           $result .= substr($generator, (rand()%(strlen($generator))), 1); 
       } 
   
       // Return result 
       return $result; 
   } 
   
   // Main program 
  
   $pa=generateNumericOTP($n); 
   setSession('otp',$pa);
   setSession('time',time());
//    $sql="INSERT INTO `tbl_otp`(`email`, `otp`, `status`,`count`) VALUES ('$e','$pa',1,3) ";
//    print_r($sql);
//    return;
//    $r2=mysqli_query($conn,$sql);
  // $link=
    // $pass=$row['password'];
    // $pa=base64_decode($pass);
     $p="Your OTP:".$pa;
   // $m="Go to the link to recover your account:".$link."\r\n".$p;
	mail($e,"OTP for your password retrieval",$p);
    echo "<script>alert('Authentication Success Please check your mail');window.location='../otpconfirm.php';</script>";
	 }
	 else{
         echo "<script>alert('Please provide valid informations');window.location='../index.php';</script>";
     }	
 }
 function resendOTP($conn){
     $e=getSession('email');
    $a = 6; 
    // Function to generate OTP 
    function generateNumericOTP1($a) { 
        
        $generator = "1357902468"; 

        $result = ""; 
    
        for ($i = 1; $i <= $a; $i++) { 
            $result .= substr($generator, (rand()%(strlen($generator))), 1); 
        } 
    
        // Return result 
        return $result; 
    } 
    
    // Main program 
   
    $pa=generateNumericOTP1($a); 
    setSession('otp',$pa);
    setSession('time',time());

      $p="Your OTP:".$pa;
    // $m="Go to the link to recover your account:".$link."\r\n".$p;
     mail($e,"OTP for your password retrieval",$p);
     
 }
function confirmOTP($conn){
    $otp=$_POST['otp'];
    $email=getSession('email');
    $otp1=getSession('otp');
    $time=getSession('time');
    
    $diff=(time()-$time)/60;
    if($diff<=5){
        if($otp==$otp1){
            echo '1';
        }
        else{
            echo'2';
        }
       
    }
    else{
        echo '3';
        
    }
    // print_r($email);
    // return;
    // $sql="SELECT * FROM `tbl_otp` WHERE `email`='$email'  AND `status`=1 AND `count`!=0";
    // print_r($sql);
    //  return;
    // $result=mysqli_query($conn,$sql);
    // if(mysqli_num_rows($result)>0){
    //      	$row=mysqli_fetch_assoc($result);
    //         $a=$row['otp'];
    //         $co=$row['count'];
// print_r($co);
// return;
//      echo $co." ".$a." ".$otp;
//     if($co>0)
//     {
        
    
//         if($a==$otp)
//  	    {
//              $sql1="UPDATE `tbl_otp` SET `status`=0,`count`=0 WHERE `otp`='$otp' AND email='$email'";
//              mysqli_query($conn,$sql1);
             

         
//          }
//          else
//          {

//              $sql2="UPDATE `tbl_otp` SET `count`= count-1 WHERE `email`='$email'";
//              //print_r($sql2);
//              //return;
//              mysqli_query($conn,$sql2);
//              echo "<script>alert('Wrong OTP ');window.location='../otpconfirm.php';</script>";
//          }
//      }
//   else
//      {
//         $sql3="UPDATE `tbl_otp` SET `count`=0,`status`=0 WHERE `email`='$email'";
//         //print_r($sql2);
//         //return;
//         mysqli_query($conn,$sql3);
//         echo "<script>alert('OTP Expired ');window.location='../index.php';</script>";
//      }
 }



function  changePassword($conn){
    $pswd=md5($_POST['pswd']);
    $cpswd=md5($_POST['cpswd']);
    $email=getSession('email');
    $sql1="SELECT * FROM `tbl_login` WHERE `email`='$email'";
    $res=mysqli_query($conn,$sql1);
	$row=mysqli_fetch_assoc($res);
    $a=$row['user_id'];
    // print_r($a);
    // return;
    $sql="UPDATE `tbl_login` SET `password`='$pswd' WHERE `user_id`='$a'";
    mysqli_query($conn,$sql);
    $_SESSION['user_id'] = '';
    $_SESSION['designation_id'] = '';
    $_SESSION['email'] = '';
    session_destroy();
    echo "<script>alert('Password updated successfully');window.location='../index.php';</script>";

}
function changePassword1($conn)
{
    $usrid=getSession('user_id');
    $cupswd=md5($_POST['curpswd']);
    $paswd = md5($_POST['pswd']);
    $cpswd=md5($_POST['cpswd']);
    //$logid = getSession('logid');
    $sql1="SELECT * FROM tbl_login WHERE password='$cupswd' AND user_id='$usrid'";
    $count=mysqli_query($conn, $sql1);
    if (mysqli_num_rows($count) >0) {
    $sql = "UPDATE `tbl_login` SET `password`='$paswd' WHERE `user_id`='$usrid'";
    mysqli_query($conn, $sql);
    echo "<script>alert('Password updated successfully');window.location='../changepassword.php';</script>";
    }
    else{
        echo "<script>alert('Current Password is Wrong');window.location='../changepassword.php';</script>";
    }
}