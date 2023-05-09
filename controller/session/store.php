<?php

use core\functions;
use core\Classes\DB\user;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

$errors= null ;

$user = user::cheick($email);
if ($user) {

  if (password_verify($password, $user['password']) || $password == $user['password']) {
    login($user);
    header("location: /culture_swap");
    exit();
  } else {
    $errors['password'] = " password invaild ";
  }

} else {
  $errors['email'] = "user name or password invaild ";
}

require base_path("views/session/create.view.php");
