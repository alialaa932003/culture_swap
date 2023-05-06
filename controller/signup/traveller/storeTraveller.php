<?php

use core\Classes\Traveller;

 if (isset($_POST['repeat-password']) && isset($_POST['password'])) {
   session_start();
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
     'type' => 1
   ];

   echo $_POST['services'];


   $user->add($data);

 }// add user name && cover image




/*


$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::email($email)) {
   $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 8, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}

if (! empty($errors)) {
    return "coreect password ";
}

*/



dd($_POST);