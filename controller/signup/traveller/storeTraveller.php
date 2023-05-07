<?php

use core\Classes\Traveller;
use core\Validator;
$email = $_POST['email'];
$password = $_POST['password'];
$repeatPassword=$_POST['repeat-password'];
$type=1;
$errors = [];

 if ($password === $repeatPassword) {
 
if(Validator::string($password,  8, 55) && Validator::email($email))
{
    $user = new Traveller();
     $data = [
        'username'=>$_POST['user-name'],
      'first_name' => $_POST['first-name'],
      'last_name' => $_POST['last-name'],
       'email' => $_POST['email'],
       'phone_num' => $_POST['phone-number'],
       'profile_img' => $_POST['profile-photo'],
       'cover_img'=> $_POST['cover-img'],
       'country' => $_POST['country'],
       'services' => $_POST['services'],
       'password' => $_POST['password'],
       'type' => $type
     ];
     
    $user->add($data);
     login($user);
    header("location: /culture_swap");
}
elseif (!Validator::string($password, 8, 255)) {
     $errors['password'] = 'Please provide a password of at least 8 characters.';
    
    }
else if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
    
 }
 
 
 
 
}

