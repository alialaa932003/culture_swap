<?php


use core\Classes\TravellerVip;
use core\Validator;
$email = $_POST['email'];
$password = $_POST['password'];
$type="1";
$errors = [];
$cvc=$_POST['cvc'];
$card_num=$_POST['card-number'];


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
               header('location: ' .  '/culture_swap/signup/traveller_vip?message=your-file-is-too-big');
           }
       } else {
           header('location: ' .  '/culture_swap/signup/traveller_vip?message=there-was-an-error-uploading-your-file');
       }
   } else {
       header('location: ' .  '/culture_swap/signup/traveller_vip?message=you-can-not-upload-file-of-this-type');
   }
}










 
if(Validator::string($password,  8, 55) && Validator::email($email)&&Validator::string($card_num,  16, 16) &&Validator::string($cvc,  3, 3))
{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $user = new TravellerVip();
     $data = [
        'username'=>$_POST['username'],
      'first_name' => $_POST['first-name'],
      'last_name' => $_POST['last-name'],
       'email' => $_POST['email'],
       'phone_num' => $_POST['phone-number'],
       'profile_img' => "{$config['base_urll']}/public/assets/imgs/abdo/{$fileNameNew}",
       'services' => [
         [
           'id' => '1',
           'service' => $_POST['services']
         ],
      ],
       'password' => $hashedPassword ,
       'country' => $_POST['country'],
       'type' => 1,
        'payment_option' =>  $_POST['payment'],
        'card_number' =>  $_POST['card-number'],
        'cvc_number' =>  $_POST['cvc'],
        'exp_date' =>  $_POST['expiration-date'],
        ];
    $user->add($data);
    signUp($user);
     header("location: /culture_swap");
      exit();
}
elseif (!Validator::string($password, 8, 255)) {
     $errors['password'] = 'Please provide a password of at least 8 characters.';
   
    }
else if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
    }
 
 else if (!Validator::string($cvc,  3, 3)) {
    $errors['cvc'] = 'Please provide a valid cvc number.';
    }
 else if (!Validator::string($card_num,  16, 16)) {
    $errors['card_num'] = 'Please provide a valid card number.';
   
 }
 
 
