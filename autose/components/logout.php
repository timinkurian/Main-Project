<?php
session_start();
 $_SESSION['logid'] = '';
 $_SESSION['utype'] = '';
 session_destroy();
 header('location:../index.php');