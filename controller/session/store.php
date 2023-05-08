<?php

use core\function ;
use core\Classes\DB\user;

$username=$_POST['Username'];
$password=$_POST['Password'];

$errors ;
/*
Qure  
$username=$_POST['username'];
$password=$_POST['password'];

*/




$user =user::cheick($username,$password) ;

if ($user){

    if (password_verify($password,$user['password'])) {
    login($user);    
}
 else {
    $errors =" password invaild " ;
}

}
else{
    $errors ="user name or password invaild " ;
}
