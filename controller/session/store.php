<?php

use core\function ;
use core\Classes\DB\user;

$username=$_POST['username'];
$password=$_POST['password'];
$errors ;
/*
Qure  
$username=$_POST['username'];
$password=$_POST['password'];

*/




$user =user::cheick($username,$password) ;

if ($user){
    login($user);

}
else{
    $errors ="user name or password invaild " ;
}
