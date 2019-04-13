<?php
require "connect.php";
require "session.php";
//session_start();


$type = $_POST['type'];
// print_r($_POST);

// __halt_compiler();
switch($type){   
        case 'schemeadd':
            // echo $type;
            schemeAdd($conn);
            break;
        // case 'addparts':
        //     addParts($conn);
        // break;
        // case 'stockupdate':
        //     stockUpdate($conn);
        // break;
            case 'viewSchemes':
            viewSchemes($conn);
            break;
            case 'addtype':
            addServiceType($conn);
            break;
            case 'started':
            serviceStarted($conn);
            break;
            case 'completed':
            serviceCompleted($conn);
            break;
            case 'addemployee':
            addEmployee($conn);
            break;
            case 'leave':
            employeeLeave($conn);
            break;
            case 'removeemployee':
            removeEmployee($conn);
            break;
        default:
            break;
    }   
    // function addParts($conn){
    //     $model=$_POST['model'];
    //     $fuel=$_POST['fuel'];
    //     $parts=$_POST['part'];
    //     $price=$_POST['price'];
    //     $quantity=$_POST['quantity'];
    //     $val=getSession('licenceno');

    //     $sql2 = "SELECT * FROM `tbl_parts` WHERE `model_id`='$model' AND `fuel_id`='$fuel' AND `parts_name`='$parts'";
    //     $res = mysqli_query($conn, $sql2);
    //     if(mysqli_num_rows($res)>0){
            
    //         echo "<script>alert('Already Exist');window.location='../partsadd.php';</script>";    
    //     }
    //     else{
    //         $sql3="INSERT INTO `tbl_parts`(`model_id`, `fuel_id`, `parts_name`, `price`) VALUES ('$model','$fuel','$parts','$price')";
    //         $result=mysqli_query($conn,$sql3);
    //         echo "<script>alert('Added Successfully');window.location='../partsadd.php';</script>"; 
    //     }
    // }
    // function stockUpdate($conn){
    //     $parts=$_POST['parts'];
    //     $quantity=$_POST['quantity'];
    //     $val=getSession('licenceno');
    //     $sql2 = "SELECT * FROM `tbl_stock` WHERE `parts_id`='$parts' AND `licenceno`='$val'";
    //     // print_r($sql2);
    //     // return;
    //     $res = mysqli_query($conn, $sql2);
    //     if(mysqli_num_rows($res)>0){

    //         $sql4 = "UPDATE `tbl_stock` SET `quantity`='$quantity' WHERE `licenceno`='$val' AND `parts_id`='$parts'";
    //          $re= mysqli_query($conn, $sql4);
    //         echo "<script>alert('Updated Successfully');window.location='../stockupdate.php';</script>";    
    //     }
    //     else{
    //         $sql="INSERT INTO `tbl_stock`(`licenceno`, `parts_id`, `quantity`) VALUES ('$val','$parts','$quantity')";

    //         $res=mysqli_query($conn,$sql);
    //         echo "<script>alert('Updated Successfully');window.location='../stockupdate.php';</script>"; 
    //     }

    // }
    function schemeAdd($conn){
    
    $stype=$_POST['stype'];
 
    $model=$_POST['model'];
    $variant=$_POST['variant'];
    
    $replacing=$_POST['val'];
    $checking=$_POST['val1'];
    $amount=$_POST['amount'];
    $val=getSession('licenceno');
    $department=$_POST['department'];
    // $sql="SELECT `brandid` FROM `brand` WHERE `brandname`='$brand' AND `model`='$model' AND `variant`='$variant' AND `fuel`='$fuel'";
    //    die();
    //$res = mysqli_query($conn,$sql);
    //$data = mysqli_fetch_assoc($res);
    //$br = $data['brandid']; 
//    $sql2="SELECT `typeid` FROM `stypes` WHERE `sname`='$sname'"; 
//    $si=mysqli_query($conn,$sql2);
//     $data=mysqli_fetch_assoc($si);
//     $typeid=$data['typeid'];
//     $sq="SELECT `scid` FROM `servicecenter` WHERE `logid`='$val'";
//     $sci=mysqli_query($conn,$sq);
//     $data1 = mysqli_fetch_assoc($sci);
//     $sc = $data1['scid'];
//    // echo $sq;
   // die();
   $sql2 = "SELECT * FROM `tbl_servicescheme` WHERE `servicetype_id`='$stype' AND `licenceno`='$val' AND `model_id`='$model' AND `variant_id`='$variant'";
   $res = mysqli_query($conn, $sql2);
   if(mysqli_num_rows($res)>0){
       echo"<script> alert('Already exist');window.location ='../Addservicescheme.php';</script>";
   }
   else{
  $sql1="INSERT INTO `tbl_servicescheme`(`servicetype_id`, `licenceno`, `model_id`, `variant_id`,`department_id`, `amount`) VALUES ('$stype','$val','$model','$variant','$department','$amount')";
       //die();
    mysqli_query($conn,$sql1);
    $sql3 = "SELECT scheme_id FROM `tbl_servicescheme` WHERE `servicetype_id`='$stype' AND `licenceno`='$val' AND `model_id`='$model' AND `variant_id`='$variant'";
   $res = mysqli_query($conn, $sql2);
   $schemeid=mysqli_fetch_assoc($res);
   $scheme=$schemeid['scheme_id'];
    foreach ($replacing as &$value) {
        $sql4="INSERT INTO `tbl_replacing`(`scheme_id`, `spare_id`) VALUES ('$scheme','$value')";

        mysqli_query($conn,$sql4);
    }
    foreach($checking as &$value1){
        $sql5="INSERT INTO `tbl_checking`(`scheme_id`, `spare_id`) VALUES ('$scheme','$value1')";
        mysqli_query($conn,$sql5);
    }
    echo "<script>alert('Added Successfully');window.location='../Addservicescheme.php';</script>";
   }
}
function viewSchemes($conn){
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
                td{
                    background-color:white;
                    color:black;
                }
                td img{
                    width:100px;
                    height:auto;
                }
            </style>    
        <body>
        <div class="py-3">
        <table>
            <thead>
                <tr>
                    <!-- <th>Service Id</th> -->
                    <th>Service Type</th>
                    <!-- <th>Brand</th> -->
                    <th>Model</th>
                    <th>Variant</th>
                    <!-- <th>Fuel</th> -->
                    <th>Replacing Parts</th>
                    <th>Inspecting Parts</th>
                    <th> Approximate Amount</th>               
                </tr>
            </thead>
            
            <?php
                $val1=getSession('licenceno');
                //  $sq="SELECT `` FROM `servicecenter` WHERE `logid`='$val'";
                // $sci=mysqli_query($conn,$sq);
                // $data1 = mysqli_fetch_assoc($sci);
                // $sc = $data1['scid'];
        $sql = "SELECT * FROM `tbl_servicescheme` WHERE `licenceno`='$val1'";
        $val=mysqli_query($conn,$sql);
       if($val){
        ?>

        <tbody>
            <?php
            while($result=mysqli_fetch_array($val)){
                $sql3="SELECT variant_name FROM tbl_variant WHERE variant_id=$result[variant_id]";
                $val3=mysqli_query($conn,$sql3);
                $result3=mysqli_fetch_assoc($val3);

                $sql4="SELECT model_name FROM tbl_model WHERE model_id=$result[model_id]";
                $val4=mysqli_query($conn,$sql4);
                $result4=mysqli_fetch_assoc($val4);
                $sql5="SELECT servicetype FROM tbl_servicetype WHERE servicetype_id=$result[servicetype_id]";
                $val5=mysqli_query($conn,$sql5);
                $result5=mysqli_fetch_assoc($val5);

            ?>
            <tr>
                <td>
                    <?php echo $result5['servicetype']; ?>
                </td>
                <td>
                    <?php echo $result4['model_name']; ?>
                </td>
                <td>
                    <?php echo $result3['variant_name']; ?>
                </td>
                <td>
                    <?php
                $sql6="SELECT * FROM tbl_spare JOIN tbl_replacing ON tbl_spare.spare_id=tbl_replacing.spare_id JOIN tbl_servicescheme ON tbl_replacing.scheme_id=tbl_servicescheme.scheme_id WHERE licenceno='$val1' AND tbl_servicescheme.scheme_id='$result[scheme_id]'";     
                $val6=mysqli_query($conn,$sql6);
                $count=mysqli_num_rows($val6);
                $i=1;
                if($count>0){
                while($result6=mysqli_fetch_assoc($val6)){
                    ?>
                    <?php echo $result6['spare'];?>
                    <?php
                         if($i!=$count){
                            echo ",";
                            $i=$i+1;
                        }
                }
            }?>
                </td>
                <td>
                <?php
                $sql6="SELECT * FROM tbl_spare JOIN tbl_checking ON tbl_spare.spare_id=tbl_checking.spare_id JOIN tbl_servicescheme ON tbl_checking.scheme_id=tbl_servicescheme.scheme_id WHERE licenceno='$val1' AND tbl_servicescheme.scheme_id='$result[scheme_id]'";     
                $val6=mysqli_query($conn,$sql6);
                $count=mysqli_num_rows($val6);
                $i=1;
                if($count>0){
                while($result6=mysqli_fetch_assoc($val6)){
                    
                    ?>
                    <?php echo $result6['spare']; ?>
                    <?php
                    if($i!=$count){
                        echo ",";
                        $i=$i+1;
                    }
                    
                }
                
            }?>
                    
                </td>
                <td>
                    <?php echo $result['amount']; ?>
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
<?php
    }
function addServiceType($conn){
    $sname=$_POST['sname'];
    $maximum=$_POST['maximum'];
    $val=getSession('logid');
    $sq="SELECT `scid` FROM `servicecenter` WHERE `logid`='$val'";
    $sci=mysqli_query($conn,$sq); 
    $data1 = mysqli_fetch_assoc($sci);
    $scid = $data1['scid'];
    $sql1 = "SELECT * FROM `stypes` WHERE `scid`='$scid' AND `sname`='$sname'";
    $res = mysqli_query($conn, $sql1);
    if(mysqli_num_rows($res)>0){
        echo"<script> alert('Already exist');window.location ='../addservicetypes.php';</script>";
    }
    else{
    $sql="INSERT INTO `stypes` (`scid`, `sname`,`maximum`) VALUES ('$scid','$sname','$maximum')";
    mysqli_query($conn,$sql);
    echo "<script>alert('Added Successfully');window.location='../addservicetypes.php';</script>";
    }

}
function serviceStarted($conn){
    $apid=$_POST['id'];
    $sql="UPDATE `appointment` SET `status`= 'Started' WHERE `apid`='$apid'";
   mysqli_query($conn, $sql);
   // echo "<script>alert('Approved');window.location=../adminhome.php;</script>";
   echo '1';
}
function serviceCompleted($conn){
    $apid=$_POST['id'];
    $sql="UPDATE `appointment` SET `status`= 'Completed' WHERE `apid`='$apid'";
   mysqli_query($conn, $sql);
   // echo "<script>alert('Approved');window.location=../adminhome.php;</script>";
   echo '2';
}
function addEmployee($conn){
    $department=$_POST['department'];
    $email=$_POST['email'];
    $pswd=md5('Employee@123');
    $licno=getSession('licenceno');
    $sql = "SELECT * FROM `tbl_login` WHERE email='$email'";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res)>0){
    //print_r($count);
    //__halt_compiler();

    echo"<script> alert('Already exist');window.location ='../addemployee.php';</script>";
    }
    else{
    $sql4="INSERT INTO `tbl_login`(`email`, `password`, `designation_id`, `status`) VALUES ('$email','$pswd',4,3)";
    // print_r($sql4);
    // return;
    mysqli_query($conn,$sql4);
    $sql5="SELECT `user_id` FROM `tbl_login` WHERE email='$email'";
    $res=mysqli_query($conn,$sql5);
    $result=mysqli_fetch_array($res);
    $userid=$result['user_id'];
    $sql6="INSERT INTO `tbl_employee`(`user_id`, `licenceno`, `department_id`) VALUES ('$userid','$licno','$department')";
    mysqli_query($conn,$sql6);
    mail($email,"Congratulations","Your username is your e-mail id and password is Employee@123");
    echo "<script>alert('Employee Added Successfully');window.location='../addemployee.php';</script>"; 
    }
}
function employeeLeave($conn){
    $date=$_POST['datepicker'];
    $stype=$_POST['stype'];
    $empno=$_POST['empno'];
    $val=getSession('logid');
    $sq="SELECT `scid` FROM `servicecenter` WHERE `logid`='$val'";
    $sci=mysqli_query($conn,$sq); 
    $data1 = mysqli_fetch_assoc($sci);
    $scid = $data1['scid'];
        //fetching service type id
        $sql2="SELECT `typeid` FROM `stypes` WHERE `sname`='$stype' AND `scid`='$scid'";
        $tid=mysqli_query($conn,$sql2);
        $data2 = mysqli_fetch_assoc($tid);
        $typeid = $data2['typeid'];
        $sql3="SELECT `maximum` FROM `stypes` WHERE `typeid`='$typeid' AND `scid`='$scid'";
        $max=mysqli_query($conn,$sql3);
        $data3 = mysqli_fetch_assoc($max);
        $maxcount = $data3['maximum'];
        $sql4="SELECT * FROM `scount` WHERE `typeid`='$typeid' AND `date`='$date' AND `scid`='$scid'";
        $count=mysqli_query($conn,$sql4);
        if(mysqli_num_rows($count)<1){
                    //table is empty directly into both tables
                    $sql5="INSERT INTO `scount`( `date`,`scid`, `typeid`, `count`) VALUES ('$date','$scid','$typeid','$empno')";
                    mysqli_query($conn,$sql5);
                    echo "<script>alert('Added successfully');window.location='../leave.php';</script>";
        }
    else{
        $data3 = mysqli_fetch_assoc($count);
        $acount = $data3['count'];
        $coun=$acount;
        $acount=$acount+$empno;
        if($acount<=$maxcount){
            
                //not already applied and anyone is already applied for that particular service only upate is performed
                 $sql7="UPDATE `scount` SET `count`='$acount' where `typeid`='$typeid' AND `date`='$date' AND `scid`='$scid'";              
                mysqli_query($conn,$sql7);
                echo "<script>alert('Added successfully');window.location='../leave.php';</script>";
        }
        else if($acount>$maxcount) {
            $available=$maxcount-$coun;
            echo "<script>alert('Only $available Leave is Available');window.location='../leave.php';</script>";   
        }
        }

    }
    function removeEmployee($conn){
        $empid=$_POST['id'];
        $sql="UPDATE tbl_employee SET status=0 WHERE employee_id='$empid'";
        mysqli_query($conn,$sql);
        echo '1';
    }