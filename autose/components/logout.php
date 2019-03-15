<?php
session_start();
 $_SESSION['user_id'] = '';
 $_SESSION['designation_id'] = '';
 session_destroy();
 header('location:../index.php');