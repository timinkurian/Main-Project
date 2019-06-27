<?php
require "connect.php";
require "session.php";
//session_start();


$type = $_POST['type'];
// print_r($_POST);

// __halt_compiler();
switch ($type) {
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
    case 'searchcenter':
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
    case 'sellcar':
        //echo $_POST['type'];
        sellCar($conn);
        break;
    case 'viewmore':
        viewMore($conn);
        break;
    case 'offer':
        makeOffer($conn);
        break;
    case 'viewoffer':
        viewOffer($conn);
        break;
    case 'offerapprove':
        offerApprove($conn);
        break;
    case 'offerreject':
        offerReject($conn);
        break;
    case 'payment':
        payment($conn);
        break;
    case 'deletead':
        deleteAd($conn);
        break;
    case 'filtercar':
        filterCar($conn);
        break;
    default:
        break;
}
function addCar($conn)
{
    $vehno = $_POST['vehno'];
    $variant = $_POST['variant'];
    $color = $_POST['color'];
    $year = $_POST['datepicker'];
    // print_r($year);
    // return;
    $engineno = $_POST['engineno'];
    $chasisno = $_POST['chasisno'];
    $usrid = getSession('user_id');
    $f = $_FILES['rcbook']['name'];
    $g = $_FILES['car']['name'];
    if ($f == $g) {
        echo "<script>alert('The file name must be different');window.location='../addcar.php';</script>";
    } else {
        // $sql="SELECT `usrid` FROM `user` WHERE `logid`='$val'";
        // $usid=mysqli_query($conn,$sql);
        // $data1 = mysqli_fetch_assoc($usid);
        // $usrid = $data1['usrid'];

        $sql4 = "SELECT * FROM `tbl_car` WHERE `regno`='$vehno' AND `engineno`='$engineno' AND `chasisno`='$chasisno' AND status='0 || 1'";
        $count = mysqli_query($conn, $sql4);
        if (mysqli_num_rows($count) < 1) {
            // $sql5 = "SELECT * FROM `tbl_car` WHERE `regno`='$vehno' OR `engineno`='$engineno' OR `chasisno`='$chasisno' AND status='0 || 1'";
            // $coun = mysqli_query($conn, $sql5);
            // if (mysqli_num_rows($coun) < 1) {
            $sDirPath = 'upload/car/' . $usrid . '/' . $vehno . '/'; //Specified Pathname
            mkdir($sDirPath, 0777, true);
            $path = $_FILES['rcbook']['name'];
            $path = '/upload/car/' . $usrid . '/' . $vehno . '/' . $path;
            $img = $_FILES['rcbook']['name'];
            $path1 = $_FILES['car']['name'];
            $path1 = '/upload/car/' . $usrid . '/' . $vehno . '/' . $path1;
            $img1 = $_FILES['car']['name'];
            $sql1 = "INSERT INTO `tbl_car`( `user_id`, `variant_id`, `manufactured_year`, `color`, `regno`, `engineno`, `chasisno`, `rcbook`, `photo`, `status`) VALUES ('$usrid','$variant','$year','$color','$vehno','$engineno','$chasisno','$path','$path1','0')";
            // print_r($sql1);
            // return;
            mysqli_query($conn, $sql1);
            move_uploaded_file($_FILES['rcbook']['tmp_name'], 'upload/car/' . $usrid . '/' . $vehno . '/' . $_FILES['rcbook']['name']);
            move_uploaded_file($_FILES['car']['tmp_name'], 'upload/car/' . $usrid . '/' . $vehno . '/' . $_FILES['car']['name']);
            echo "<script>alert('Car Added successfully');window.location='../user.php';</script>";
            // } else {
            //     echo "<script>alert('Enter only valid datas');window.location='../user.php';</script>";
            // }
        } else {
            echo "<script>alert('Already Exist');window.location='../user.php';</script>";
        }
    }
}
function deleteCar($conn)
{
    $val = $_POST['car'];
    $carid = $_POST['carid'];
    // print_r($val);
    // return;
    setSession('carid', $carid);
    $regno = $_POST['regno'];
    setSession('regno', $regno);
    $brandid = $_POST['brandid'];
    setSession('brandid', $brandid);
    $modelid = $_POST['modelid'];
    setSession('modelid', $modelid);
    $variantid = $_POST['variantid'];
    setSession('variantid', $variantid);
    if ($val == "appointment") {
        ?>
        <script>
            window.location = '../servicecenterbybrand.php';
        </script>
    <?php
} elseif ($val == "delete") {
    $sql = "UPDATE `tbl_car` SET `status`=-1 WHERE car_id='$carid'";

    mysqli_query($conn, $sql);
    echo "<script>alert('Removed Successfully');window.location='../viewcar.php';</script>";
} elseif ($val == "sell") {
    ?>
        <script>
            window.location = '../sellcar.php';
        </script>
    <?php
}
}
function searchCenter($conn)
{
    $distid = $_POST['distid'];
    $brandid = $_POST['brandid'];
    $sql = "SELECT * FROM `tbl_servicecenter` JOIN tbl_place ON tbl_servicecenter.place_id=tbl_place.place_id WHERE`brand_id`='$brandid' AND district_id='$distid'";
    $val = mysqli_query($conn, $sql);
    if (mysqli_num_rows($val)) {
        while ($result = mysqli_fetch_array($val)) {
            //  $licenceno=$result['licenceno'];
            // setSession('licenceno',$licenceno);
            ?>

            <div class="col-md-4 pb-5">
                <div class="row">

                    <div class="col">
                        <img src="data/<?php echo $result['photo']; ?>" class="image1">
                    </div>
                    <div class="col">
                        <label><b><?php echo $result['center_name']; ?></b></label><br>
                        <label><b><?php echo $result['licenceno']; ?></b></label><br>
                        <label><b><?php echo $result['mobile']; ?></b></label><br>
                        <?php
                        $sql1 = "SELECT tbl_district.district,tbl_place.place FROM tbl_district JOIN tbl_place ON tbl_district.district_id=tbl_place.district_id JOIN tbl_servicecenter ON tbl_servicecenter.place_id=tbl_place.place_id WHERE tbl_servicecenter.brand_id=$brandid AND tbl_servicecenter.licenceno='$result[licenceno]'";
                        $val1 = mysqli_query($conn, $sql1);
                        $result1 = mysqli_fetch_array($val1);

                        ?>
                        <label><b><?php echo $result1['district']; ?></b></label><br>
                        <label><b><?php echo $result1['place']; ?></b></label><br>
                    </div>
                </div>
                <form name="" id="login" method="post" action="appointment.php">
                    <input type="text" hidden value="<?php echo $result['licenceno']; ?>" name="licenceno">
                    <button type="submit" class="btn button1" value="appointment" name="car">Book</button>
                </form>
            </div>
        <?php
    }
    ?>
        </div>
    <?php
} else {
    ?>
        <div offset-md-5>
            <img src="sorry.jpg" style="max-width:35%;margin-left: auto; margin-right: auto; ">
            <h3 style="padding-left: 200px;"><?php echo "NOTHING TO SHOW ! NO SERVICE CENTER IS AVAILABLE  !"; ?></h3>
        </div>
    <?php
}
}
function makeAppointment($conn)
{
    $date = $_POST['datepicker'];
    $bdate = $_POST['date'];
    $vehno = $_POST['regno'];
    $stype = $_POST['stype'];
    $meter = $_POST['odometer'];
    $remarks = $_POST['remarks'];
    $licenceno = $_POST['licenceno'];
    $price = $_POST['price'];
    setSession('date', $date);
    setSession('bdate', $bdate);
    setSession('vehno', $vehno);
    setSession('stype', $stype);
    setSession('meter', $meter);
    setSession('remarks', $remarks);
    setSession('licenceno', $licenceno);
    setSession('price', $price);
    $sql2 = "SELECT `department_id`,`km`,`servicetype_id` FROM `tbl_servicescheme` WHERE `scheme_id`='$stype'";
    $tid = mysqli_query($conn, $sql2);
    $data2 = mysqli_fetch_array($tid);
    $deptid = $data2['department_id'];
    setSession('deptid', $deptid);
    $km = $data2['km'];
    $stype1 = $data2['servicetype_id'];
    $sq = "SELECT servicetype FROM tbl_servicetype WHERE servicetype_id='$stype1'";
    $st = mysqli_query($conn, $sq);
    $da = mysqli_fetch_assoc($st);
    $sname = $da['servicetype'];

    if ($sname == 'First Service' || 'Second Service' || 'Third Service' || 'Fourth Service' || 'Fifth Service') {

        if ($km < $meter - 200) {
            echo "<script>alert('You Exceeds the Kilometer Limit of the Service Type');window.location='../appointment.php';</script>";
            return;
        } else { ?>
            <script>
                window.location = '../payment.php';
            </script>
        <?php
    }
} else {
    if ($km < $meter - 2000) {
        echo "<script>alert('You Exceeds the Kilometer Limit of the Service Type');window.location='../appointment.php';</script>";
        return;
    } else { ?>
            <script>
                window.location = '../payment.php';
            </script>
        <?php
    }
}
}
function payment($conn)
{
    $tdate = $_POST['tdate'];
    $date = getSession('date');
    $bdate = getSession('bdate');
    $vehno =  getSession('vehno');
    $stype =  getSession('stype');
    $meter =  getSession('meter');
    $remarks =  getSession('remarks');
    $licenceno =  getSession('licenceno');
    $price =  getSession('price');
    $deptid = getSession('deptid');
    $userid = getSession('user_id');
    $sql22 = "SELECT user_id FROM tbl_servicecenter WHERE licenceno='$licenceno'";
    $val22 = mysqli_query($conn, $sql22);
    $result22 = mysqli_fetch_assoc($val22);
    $scid = $result22['user_id'];
    //find maximum capacity of srvice center
    $sql3 = "SELECT `maximum` FROM `tbl_employeecount` WHERE `licenceno`='$licenceno'AND `department_id`='$deptid'";
    $max = mysqli_query($conn, $sql3);
    $data3 = mysqli_fetch_assoc($max);
    $maxcount = $data3['maximum'];
    //finding the booking for service type on a particular day
    $sql4 = "SELECT * FROM `tbl_workcount` WHERE `licenceno`='$licenceno' AND `date`='$date' AND `department_id`='$deptid'";
    $count = mysqli_query($conn, $sql4);
    if (mysqli_num_rows($count) < 1) {
        //table is empty directly into both tables
        //checking already applied or not
        $sql11 = "SELECT * FROM `tbl_appointment` WHERE `registerno`='$vehno' AND `scheme_id`='$stype' AND `appointment_status`!='-1'";
        $count11 = mysqli_query($conn, $sql11);
        if (mysqli_num_rows($count11) < 1) {
            $sql12 = "SELECT * FROM `tbl_appointment` WHERE `registerno`='$vehno' AND `appointment_date`='$date' AND `appointment_status`!='-1' AND `appointment_status`!='3'";
            $count12 = mysqli_query($conn, $sql12);
            if (mysqli_num_rows($count12) < 1) {

                $sql5 = "INSERT INTO `tbl_workcount`( `date`,`licenceno`,`department_id`, `count`) VALUES ('$date','$licenceno','$deptid',1)";
                mysqli_query($conn, $sql5);
                $sql6 = "INSERT INTO `tbl_appointment`(`registerno`,`licenceno`, `scheme_id`,`bookdate`,`appointment_date`,`odometer`, `remarks`,`appointment_status`) VALUES ('$vehno','$licenceno','$stype','$bdate','$date','$meter','$remarks','0')";
                // status=0 applied 
                mysqli_query($conn, $sql6);

                $sql20 = "SELECT appointment_id FROM `tbl_appointment` WHERE `registerno`='$vehno' AND `scheme_id`='$stype' AND `appointment_status`='0'";
                $val20 = mysqli_query($conn, $sql20);
                $result20 = mysqli_fetch_assoc($val20);
                $apid = $result20['appointment_id'];
                // $_SESSION['scid'] = '';

                $sql21 = "INSERT INTO `tbl_transaction`(`transaction_date`,`appointment_id`, `paid_from`, `paid_to`, `transaction_type`, `paid_amount`) VALUES ('$tdate','$apid','$userid','$scid','Advance','$price')";
                mysqli_query($conn, $sql21);
                echo "<script>alert('Added successfully');window.location='../appointmentview.php';</script>";
            } else {
                echo "<script>alert('Sorry!! You already made an appointmenton this day');window.location='../user.php';</script>";
            }
        } else {
            echo "<script>alert('Sorry!! You already applied for this service');window.location='../user.php';</script>";
        }
    } else {
        $data3 = mysqli_fetch_assoc($count);
        $acount = $data3['count'];
        if ($acount < $maxcount) {
            //checking already applied or not
            $sql9 = "SELECT * FROM `tbl_appointment` WHERE `registerno`='$vehno' AND `scheme_id`='$stype' AND `appointment_status`!='-1'";
            $count1 = mysqli_query($conn, $sql9);
            if (mysqli_num_rows($count1) < 1) {
                $sql13 = "SELECT * FROM `tbl_appointment` WHERE `registerno`='$vehno' AND `appointment_date`='$date' AND `appointment_status`!='-1' AND `appointment_status`!='3'";
                $count13 = mysqli_query($conn, $sql13);
                if (mysqli_num_rows($count13) < 1) {
                    $acount = $acount + 1;
                    //not already applied and anyone is already applied for that particular service only upate is performed
                    $sql7 = "UPDATE `tbl_workcount` SET `count`='$acount' WHERE `date`='$date' AND `licenceno`='$licenceno' AND `department_id`='$deptid'";
                    mysqli_query($conn, $sql7);
                    //inserting to appointment table
                    $sql8 = "INSERT INTO `tbl_appointment`(`registerno`,`licenceno`, `scheme_id`,`appointment_date`,`appointment_date`,`odometer`, `remarks`,`appointment_status`) VALUES ('$vehno','$licenceno','$stype','$bdate','$date','$meter','$remarks','0')";
                    //status=0 means applied
                    //-1 means cancelled
                    //1 started
                    //2 pending
                    //3 completed
                    mysqli_query($conn, $sql8);

                    $sql20 = "SELECT appointment_id FROM `tbl_appointment` WHERE `registerno`='$vehno' AND `scheme_id`='$stype' AND `appointment_status`='0'";
                    $val20 = mysqli_query($conn, $sql20);
                    $result20 = mysqli_fetch_assoc($val20);
                    $apid = $result20['appointment_id'];
                    $sql21 = "INSERT INTO `tbl_transaction`(`transaction_date`,`appointment_id`, `paid_from`, `paid_to`, `transaction_type`, `paid_amount`) VALUES ('$tdate','$apid','$userid','$scid','Advance','$price')";
                    mysqli_query($conn, $sql21);
                    echo "<script>alert('Added successfully');window.location='../appointmentview.php';</script>";
                } else {
                    echo "<script>alert('Sorry!! You already made an appointmenton this day');window.location='../user.php';</script>";
                }
            } else {
                echo "<script>alert('Sorry!! You already applied for this service');window.location='../user.php';</script>";
            }
        } else {
            echo "<script>alert('Please choose another day because of overloads');window.location='../user.php';</script>";
        }
    }
    $_SESSION['date'] = '';
    $_SESSION['bdate'] = '';
    $_SESSION['vehno'] = '';
    $_SESSION['stype'] = '';
    $_SESSION['meter'] = '';
    $_SESSION['remarks'] = '';
    $_SESSION['licenceno'] = '';
    $_SESSION['price'] = '';
    $_SESSION['deptid'] = '';
}
function profileUpdate($conn)
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mob = $_POST['mobile'];
    $dist = $_POST['district'];
    $place = $_POST['place'];
    $logid = getSession('logid');
    $sql = "SELECT * FROM `user` WHERE `mobile`='$mob' AND `logid`!='$logid'";
    $count = mysqli_query($conn, $sql);
    if (mysqli_num_rows($count) < 1) {
        $sql = "UPDATE `user` SET `fname`='$fname',`lname`='$lname',`mobile`='$mob',`district`='$dist',`place`='$place' WHERE `logid`='$logid'";
        mysqli_query($conn, $sql);
        echo "<script>alert('Profile updated successfully');window.location='../user.php';</script>";
    } else {
        echo "<script>alert('The mobile number is already in use');window.location='../usereditprofile.php';</script>";
    }
}

function appointmentCancel($conn)
{
    $userid = getSession('user_id');
    //echo "<script>alert('Your Booking Cancelled!');window.location='../user.php';</script>";
    $apid = $_POST['id'];
    $c1date = $_POST['date'];
    $cdate = strtotime($_POST['date']);

    $sql4 = "SELECT tbl_appointment.licenceno,tbl_appointment.appointment_id,tbl_appointment.bookdate, tbl_appointment.scheme_id,tbl_appointment.appointment_date,tbl_servicescheme.department_id FROM `tbl_appointment` JOIN tbl_servicescheme  ON tbl_appointment.scheme_id=tbl_servicescheme.scheme_id WHERE tbl_appointment.appointment_id='$apid'";
    $row = mysqli_query($conn, $sql4);
    $data1 = mysqli_fetch_array($row);
    $deptid = $data1['department_id'];
    $licenceno = $data1['licenceno'];
    $date1 = $data1['appointment_date'];
    $date = strtotime($data1['appointment_date']);
    $bdate = strtotime($data1['bookdate']);
    $apid = $data1['appointment_id'];
    $schemeid = $data1['scheme_id'];
    $diff = ($date - $cdate) / 60 / 60 / 24;
    $cdiff = ($cdate - $bdate) / 60 / 60 / 24;
    $sql5 = "SELECT `count` FROM `tbl_workcount` WHERE `department_id`='$deptid' AND `date`='$date1' AND `licenceno`='$licenceno'";
    $count = mysqli_query($conn, $sql5);
    $data2 = mysqli_fetch_assoc($count);
    $acount = $data2['count'];
    $acount = $acount - 1;
    $sql7 = "UPDATE `tbl_workcount` SET `count`='$acount' WHERE `date`='$date1' AND `licenceno`='$licenceno' AND `department_id`='$deptid'";
    mysqli_query($conn, $sql7);
    $sql = "UPDATE `tbl_appointment` SET `appointment_status`='-1' WHERE `appointment_id`='$apid' ";
    mysqli_query($conn, $sql);
    $sql8 = "SELECT amount FROM tbl_servicescheme WHERE scheme_id='$schemeid'";
    $row1 = mysqli_query($conn, $sql8);
    $data3 = mysqli_fetch_assoc($row1);
    $amount = $data3['amount'];
    $sqll = "SELECT user_id FROM tbl_servicecenter WHERE licenceno='$licenceno'";
    $row11 = mysqli_query($conn, $sqll);
    $data33 = mysqli_fetch_assoc($row11);
    $usr = $data33['user_id'];
    if ($cdiff == 0) { //applied date and cancelled date is equal
        //calculating return amount($return)
        $return = $amount * .95;
        $sq = "INSERT INTO `tbl_transaction`(`transaction_date`, `appointment_id`, `paid_from`, `paid_to`, `transaction_type`, `paid_amount`) VALUES ('$c1date','$apid','$usr','$userid','returned to user','$return')";
        mysqli_query($conn, $sq);
        echo " Appointment cancelled,5% of Advance Payment Debited";
    } else {

        if ($diff == 1) {
            //calculating return amount($return)
            $return = $amount * .25;
            $sq = "INSERT INTO `tbl_transaction`(`transaction_date`, `appointment_id`, `paid_from`, `paid_to`, `transaction_type`, `paid_amount`) VALUES ('$c1date','$apid','$usr','$userid','returned to user','$return')";
            mysqli_query($conn, $sq);
            echo " Appointment cancelled,75% of Advance Payment Debited";
        }
        if ($diff == 2) {
            //calculating return amount($return)
            $return = $amount * .4;
            $sq = "INSERT INTO `tbl_transaction`(`transaction_date`, `appointment_id`, `paid_from`, `paid_to`, `transaction_type`, `paid_amount`) VALUES ('$c1date','$apid','$usr','$userid','returned to user','$return')";
            mysqli_query($conn, $sq);
            echo "60% of Advance Payment Debited";
        }
        if ($diff == 3) {
            //calculating return amount($return)
            $return = $amount * .5;
            $sq = "INSERT INTO `tbl_transaction`(`transaction_date`, `appointment_id`, `paid_from`, `paid_to`, `transaction_type`, `paid_amount`) VALUES ('$c1date','$apid','$usr','$userid','returned to user','$return')";
            mysqli_query($conn, $sq);
            echo "50% of Advance Payment Debited";
        }
        if ($diff == 4) {
            //calculating return amount($return)
            $return = $amount * .75;
            $sq = "INSERT INTO `tbl_transaction`(`transaction_date`, `appointment_id`, `paid_from`, `paid_to`, `transaction_type`, `paid_amount`) VALUES ('$c1date','$apid','$usr','$userid','returned to user','$return')";
            mysqli_query($conn, $sq);
            echo "25% of Advance Payment Debited";
        } else {
            //calculating return amount($return)
            $return = $amount * .95;
            $sq = "INSERT INTO `tbl_transaction`(`transaction_date`, `appointment_id`, `paid_from`, `paid_to`, `transaction_type`, `paid_amount`) VALUES ('$c1date','$apid','$usr','$userid','returned to user','$return')";
            mysqli_query($conn, $sq);
            echo "5% of Advance Payment Debited'";
        }
    }
    // echo '1';
}
function sellCar($conn)
{
    $carid = getSession('carid');
    $date = $_POST['date'];
    // print_r($date);
    $km = $_POST['odometer'];
    $price = $_POST['price'];
    $description = $_POST['remarks'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $car1 = $_FILES['car1']['name'];
    $car2 = $_FILES['car2']['name'];
    $car3 = $_FILES['car3']['name'];
    $car4 = $_FILES['car4']['name'];
    $sql = "INSERT INTO `tbl_advertisement`(`car_id`, `price`, `description`, `latitude`, `longitude`, `advertisement_date`,`odometer`,`status`) VALUES ('$carid','$price','$description','$latitude','$longitude','$date','$km','0')";
    // 0 live ad
    //1 delete
    mysqli_query($conn, $sql);
    $sql5 = "SELECT advertisement_id FROM `tbl_advertisement` WHERE car_id='$carid' AND status=0";
    $val = mysqli_query($conn, $sql5);
    $res = mysqli_fetch_assoc($val);
    $adid = $res['advertisement_id'];

    $sql1 = "UPDATE `tbl_car` SET `status`='2' WHERE `car_id`='$carid' ";
    mysqli_query($conn, $sql1);
    $sDirPath = 'upload/sales/' . $adid . '/'; //Specified Pathname
    mkdir($sDirPath, 0777, true);
    $path = $_FILES['car1']['name'];
    $path = '/upload/sales/' . $adid . '/' . $path;
    $path2 = $_FILES['car2']['name'];
    $path2 = '/upload/sales/' . $adid . '/' . $path2;
    $path3 = $_FILES['car3']['name'];
    $path3 = '/upload/sales/' . $adid . '/' . $path3;
    $path4 = $_FILES['car4']['name'];
    $path4 = '/upload/sales/' . $adid . '/' . $path4;

    move_uploaded_file($_FILES['car1']['tmp_name'], 'upload/sales/' . $adid . '/' . '/' . $_FILES['car1']['name']);
    move_uploaded_file($_FILES['car2']['tmp_name'], 'upload/sales/' . $adid . '/' . '/' . $_FILES['car2']['name']);
    move_uploaded_file($_FILES['car3']['tmp_name'], 'upload/sales/' . $adid . '/' . '/' . $_FILES['car3']['name']);
    move_uploaded_file($_FILES['car4']['tmp_name'], 'upload/sales/' . $adid . '/' . '/' . $_FILES['car4']['name']);
    $sql2 = "INSERT INTO `tbl_image`(`advertisement_id`, `image1`, `image2`, `image3`, `image4`) VALUES ('$adid','$path','$path2','$path3','$path4')";
    mysqli_query($conn, $sql2);
    echo "<script>alert('Your advertisement posted');window.location='../user.php';</script>";
    $_SESSION['carid'] = '';
}
function viewMore($conn)
{
    $carid = $_POST['carid'];
    setSession('carid', $carid);
    ?>
    <script>
        window.location = '../viewmore.php';
    </script>
<?php

}
function makeOffer($conn)
{
    $adid = $_POST['adid'];
    $date = $_POST['date'];
    $offer = $_POST['offer'];
    $userid = getSession('user_id');
    $sq = "SELECT * FROM tbl_offeredprice WHERE advertisement_id='$adid' AND user_id='$userid'";
    $val = mysqli_query($conn, $sq);
    if (mysqli_num_rows($val) > 0) {
        echo "<script>alert('You already made an offer');window.location='../viewmore.php';</script>";
    } else {
        $sql = "INSERT INTO `tbl_offeredprice`(`advertisement_id`, `offer_amount`, `user_id`, `offer_status`,`offer_date`) VALUES ('$adid','$offer','$userid','0','$date')";
        mysqli_query($conn, $sql);
        echo "<script>alert('Your offer is saved');window.location='../viewmore.php';</script>";
    }
}
function viewOffer($conn)
{
    $adid = $_POST['adid'];
    setSession('advertisement_id', $adid);
    ?>
    <script>
        window.location = '../viewoffer.php';
    </script>
<?php
}

function  offerApprove($conn)
{
    $offerid = $_POST['id'];
    // 1 approved
    // -1 rejected
    // 0 pending
    $sql = "UPDATE `tbl_offeredprice` SET `offer_status`='1' WHERE `offer_id`='$offerid' ";
    mysqli_query($conn, $sql);
    echo '1';
}
function  offerReject($conn)
{
    $offerid = $_POST['id'];
    // 1 approved
    // -1 rejected
    // 0 pending
    $sql = "UPDATE `tbl_offeredprice` SET `offer_status`='-1' WHERE `offer_id`='$offerid' ";
    mysqli_query($conn, $sql);
    echo '1';
}
function deleteAd($conn)
{
    $carid = $_POST['carid'];
    $reason = $_POST['reason'];
    if ($reason == 3) {
        $sql1 = "UPDATE `tbl_car` SET status='1' WHERE car_id='$carid'";
        mysqli_query($conn, $sql1);
        $sql = "UPDATE `tbl_advertisement` SET status='1' WHERE car_id='$carid'";
        mysqli_query($conn, $sql);
        echo "<script>alert('Advertisement Deleted');window.location='../user.php';</script>";
    } else {
        $sql = "UPDATE `tbl_advertisement` SET status='1' WHERE car_id='$carid'";
        mysqli_query($conn, $sql);
        echo "<script>alert('Advertisement Deleted');window.location='../user.php';</script>";
    }
}
function filterCar($conn)
{
    $userid = getSession('user_id');
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $minprice = $_POST['minprice'];
    $maxprice = $_POST['maxprice'];
    $minkm = $_POST['minkm'];
    $maxkm = $_POST['maxkm'];
    $fuel = $_POST['fuel'];
    $sql = "SELECT * FROM `tbl_advertisement` JOIN tbl_car ON tbl_advertisement.car_id=tbl_car.car_id JOIN tbl_variant ON tbl_car.variant_id=tbl_variant.variant_id JOIN tbl_model ON tbl_variant.model_id=tbl_model.model_id JOIN tbl_brand on tbl_model.brand_id=tbl_brand.brand_id WHERE tbl_car.user_id!='5' AND tbl_advertisement.status=0 ";
    if ($brand != null) {
        $sql .= "AND tbl_brand.brand_id='$brand'";
    }
    if ($model != null) {
        $sql .= "AND tbl_brand.brand_id='$brand' AND tbl_model.model_id='$model'";
    }
    if ($minprice != null) {
        $sql .= " AND tbl_advertisement.price>='$minprice'";
    }
    if ($maxprice != null) {
        $sql .= " AND tbl_advertisement.price<='$maxprice'";
    }
    if ($minkm != null) {
        $sql .= " AND tbl_advertisement.odometer>='$minkm'";
    }
    if ($maxkm != null) {
        $sql .= " AND tbl_advertisement.odometer<='$maxkm'";
    }
    if ($fuel != null) {
        $sql .= " AND tbl_variant.fuel_id='$fuel'";
    }
    // print_r($sql);
    // return;
    $val = mysqli_query($conn, $sql);
    if (mysqli_num_rows($val) > 0) {
        while ($result = mysqli_fetch_array($val)) {
            $sql2 = "SELECT * FROM tbl_image WHERE advertisement_id='$result[advertisement_id]'";
            $val1 = mysqli_query($conn, $sql2);
            $image = mysqli_fetch_array($val1);
            ?>
            <div class="col-md-3 pb-3 " style="border-style: groove; margin-left:10px;">
                <div class="row">

                    <div class="col">
                        <img src="data/<?php echo $image['image1']; ?>" class="image1" style="width: inherit;height: auto;">

                        <?php
                        $sql1 = "SELECT tbl_brand.brand_name,tbl_brand.brand_id,tbl_model.model_name,tbl_model.model_id,tbl_variant.variant_name, tbl_variant.variant_id,tbl_fuel.fuel FROM tbl_variant JOIN tbl_car ON tbl_variant.variant_id=tbl_car.variant_id JOIN tbl_model ON tbl_model.model_id=tbl_variant.model_id JOIN tbl_brand ON tbl_brand.brand_id=tbl_model.brand_id JOIN tbl_fuel ON tbl_fuel.fuel_id=tbl_variant.fuel_id WHERE tbl_car.car_id='$result[car_id]'";
                        $val2 = mysqli_query($conn, $sql1);
                        $result1 = mysqli_fetch_array($val2);
                        $sql3 = "SELECT * FROM tbl_car WHERE car_id='$result[car_id]'";
                        $val3 = mysqli_query($conn, $sql3);
                        $result3 = mysqli_fetch_array($val3);
                        ?>
                        <h3 style="font-size:30px;"><b>₹<?php echo $result['price']; ?></b></h3>
                        <label><b><?php echo $result1['brand_name']; ?> | </b></label>
                        <label><b><?php echo $result1['model_name']; ?> | </b></label>
                        <label><b><?php echo $result1['variant_name']; ?></b></label><br>
                        <label><b><?php echo $result3['manufactured_year']; ?> - </b></label>
                        <label><b><?php echo $result['odometer']; ?>KM</b></label><br>


                        <!-- <label><b><?php echo $result1['fuel']; ?></b></label> -->

                        <!-- <label><b><?php echo $result['description']; ?></b></label><br>
                                                               -->

                        <form name="" id="login" method="post" action="data/userdata.php" enctype="multipart/form-data" class="mt-5">
                            <!-- Heading -->

                            <input type="text" hidden value="viewmore" name="type">
                            <input type="text" hidden value="<?php echo $result['car_id']; ?>" name="carid">
                            <button type="submit" class="btn button1" value="appointment" name="car">View More</button>
                        </form>
                    </div>
                </div>

            </div>
        <?php
    }
} else {
    ?>
        <div offset-md-5>
            <img src="nothing.png" style="max-width:35%;margin-left: auto; margin-right: auto; ">
            <h3><?php echo "NOTHING TO SHOW !  THERE  IS NO ADVERTISEMENT IS AVAILABLE !!"; ?></h3>
        </div>
    <?php
}
}
