<?php
include "connect.php";
header("Access-control-Allow-Origin: *");
header("Access-control-Allow-Methods: PUT,GET,POST");
header("Access-control-Allow-Headers: Origin,X-Requested-With,Content-Type,Accept");
$postdata=file_get_contents("php://input");
$request=json_decode($postdata);

// print_r($request->data->username);

$username=mysqli_real_escape_string($con,trim($request->data->username));
$password=mysqli_real_escape_string($con,trim($request->data->password));


$sql="INSERT INTO `login`(`username`,`password`,`status`) VALUES('$username','$password',1)";
if(mysqli_query($con, $sql))
{
$student=[
'name' => $username,
'password'=> $password
];
echo json_encode(['data'=>$student]);
}