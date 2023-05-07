<?php



// header will change
use core\Classes\Host;
use core\Validator;
$email = $_POST['email'];
$password = $_POST['password'];
$type=2;
$errors = [];

 
if(Validator::string($password,  8, 55) && Validator::email($email))
{
    $user = new Host();
     $data = [
        'username'=>$_POST['user-name'],
        'first_name' => $_POST['first-name'],
        'last_name' => $_POST['last-name'],
         'email' => $_POST['email'],
         'phone_num' => $_POST['phone-number'],
         'phone_num' => $_POST['profile-photo'],
         'cover_img'=> $_POST['cover-img'],
         'country' => $_POST['country'],
         'services' => $_POST['help-with'],
         'password' => $_POST['password'],
         'type' => $type,
         'Status' => null,
         'Description' => $_POST['Description'],
         'Rate_average' => null,
         'Traveller_num' => 0,
         'location' => $_POST['location'],
         'more_info' => $_POST['more-info']
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

 
// image input only
