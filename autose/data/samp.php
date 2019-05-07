<?php 
session_start();
print_r($_SESSION);


echo $diff = time() - $_SESSION['time'];

$_SESSION['time'] = time();