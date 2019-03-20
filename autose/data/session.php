<?php
session_start();
//session manager

function setSession($key, $value){ 
    $_SESSION[$key] =$value;
}

function getSession($key){
    if(isset($_SESSION[$key])){
        return $_SESSION[$key];
    }
    
    return false;
}

function sessionRedirect($user, $key){
    if($user == getSession($key)){
        return true;
    }
    return false;
}