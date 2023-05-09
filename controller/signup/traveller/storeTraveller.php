<?php

use core\Classes\Traveller;
use core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];
$type = 1;
$errors = [];





$config = require base_path('config.php');



if (isset($_POST['submit'])) {


    $file = $_FILES['profile-photo'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;

                $fileDestination = base_path('public/assets/imgs/abdo/') . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

            } else {
                header('location: ' .  '/culture_swap/signup/traveller?message=your-file-is-too-big');
            }
        } else {
            header('location: ' .  '/culture_swap/signup/traveller?message=there-was-an-error-uploading-your-file');
        }
    } else {
        header('location: ' .  '/culture_swap/signup/traveller?message=you-can-not-upload-file-of-this-type');
    }
}





if (Validator::string($password, 8, 55) && Validator::email($email)) {
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $user = new Traveller();
  $data = [
    'user_name' => $_POST['user-name'],
    'first_name' => $_POST['first-name'],
    'last_name' => $_POST['last-name'],
    'email' => $_POST['email'],
    'phone_num' => $_POST['phone-number'],
    'profile_img' => "{$config['base_urll']}/public/assets/imgs/abdo/{$fileNameNew}",
    'country' => $_POST['country'],
    'services' => [
      [
        'id' => '1',
        'service' => $_POST['services']
      ]
    ],
    'password' => $hashedPassword ,
    'type' => $type
  ];
  $user->add($data);
  signUp($user);
  header("location: /culture_swap");
  exit();
} elseif (!Validator::string($password, 8, 255)) {
  $errors['password'] = 'Please provide a password of at least 8 characters.';

} else if (!Validator::email($email)) {
  $errors['email'] = 'Please provide a valid email address.';

}