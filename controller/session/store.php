<?php

use core\function ;
use core\Classes\DB\user;

$email=$_POST['email'];
$password=$_POST['phone_num'];

$errors= null ;

if (isset($_POST['submit'])){
$user =user::cheick($email) ;

if ($user){
    
     if (password_verify($password,$user['password'])) {
   login($user);   
    header("location: /culture_swap");
     exit(); 
}
 else {
    $errors =" password invaild " ;
    dd($errors);
    
}

}
else{
    $errors ="user name or password invaild " ;
        dd($errors);
}

}