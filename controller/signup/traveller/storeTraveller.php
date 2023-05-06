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
      'fName' => $_POST['first-name'],
       'lName' => $_POST['last-name'],
       'email' => $_POST['email'],
       'phoneNum' => $_POST['phone-number'],
       'profileImg' => $_POST['profile-photo'],
       'coverImg' => $_POST['profile-photo'],
       'country' => $_POST['country'],
       'services' => $_POST['services'],
       'password' => $_POST['password'],
       'type' => $type
     ];
  
    $user->add($data);
     login($user);
    header("location: /culture_swap");
}
else if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
 }
 
 elseif (!Validator::string($password, 8, 255)) {
     $errors['password'] = 'Please provide a password of at least seven characters.';
 }
 
 
}

