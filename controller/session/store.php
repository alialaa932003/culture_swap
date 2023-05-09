<?php

use core\functions;
use core\Classes\DB\user;

<<<<<<< HEAD
$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];
=======
$email=$_POST['email'];
$password=$_POST['phone_num'];
>>>>>>> refs/remotes/master/main

$errors= null ;

<<<<<<< HEAD
$user = user::cheick($email);
if ($user) {
=======
if (isset($_POST['submit'])){
$user =user::cheick($email) ;
>>>>>>> refs/remotes/master/main

  if (password_verify($password, $user['password']) || $password == $user['password']) {
    login($user);
    header("location: /culture_swap");
<<<<<<< HEAD
    exit();
  } else {
    $errors['password'] = " password invaild ";
  }

} else {
  $errors['email'] = "user name or password invaild ";
}

require base_path("views/session/create.view.php");
=======
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
>>>>>>> refs/remotes/master/main
