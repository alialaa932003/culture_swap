<?php


use core\Classes\TravellerVip;
use core\Validator;
$email = $_POST['email'];
$password = $_POST['password'];
$type="1";
$errors = [];
$cvc=$_POST['cvc'];
$card_num=$_POST['card-number'];

 
if(Validator::string($password,  8, 55) && Validator::email($email)&&Validator::string($card_num,  16, 16) &&Validator::string($cvc,  3, 3))
{
    $user = new TravellerVip();
     $data = [
        'username'=>$_POST['username'],
      'first_name' => $_POST['first-name'],
      'last_name' => $_POST['last-name'],
       'email' => $_POST['email'],
       'phone_num' => $_POST['phone-number'],
       'profile_img' => $_POST['profile-photo'],
       'cover_img'=> $_POST['cover-img'],
       'services' => [
         [
           'service_id' => '1',
           'service' => $_POST['services']
         ],
       'password' => $_POST['password'],
       'country' => $_POST['country'],
       'type' => 1,
        'payment_option' =>  $_POST['payment'],
        'card_number' =>  $_POST['card-number'],
        'cvc_number' =>  $_POST['cvc'],
        'exp_date' =>  $_POST['expiration-date'],
        ];
    $user->add($data);
     login($user);
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
 
 
