<?php

use core\function ;

$username=$_POST['username'];
$password=$_POST['password'];
$errors ;
/*
Qure  
$username=$_POST['username'];
$password=$_POST['password'];


*/
$user;// = query

if (true){
    login($user);

}
else{
    $errors ="user name or password invaild " ;
}

//// route