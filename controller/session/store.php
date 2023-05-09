<?php

use core\function ;
use core\Classes\DB\user;

$email=$_POST['email'];
$password=$_POST['password'];

$errors ;


$user =user::cheick($email) ;

if ($user){
    
     if (password_verify($password,$user['password'])) {
   login($user);   
    header("location: /culture_swap");
     exit(); 
}
 else {
    $errors =" password invaild " ;
}

}
else{
    $errors ="user name or password invaild " ;
}

