<?php



// header will change
use core\Classes\Host;
use core\Validator;
$email = $_POST['email'];
$password = $_POST['password'];
$type=2;
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

                $fileDestination = base_path('public/assets/imgs/profile/') . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

            } else {
                header('location: ' .  '/culture_swap/signup/host?message=your-file-is-too-big');
            }
        } else {
            header('location: ' .  '/culture_swap/signup/host?message=there-was-an-error-uploading-your-file');
        }
    } else {
        header('location: ' .  '/culture_swap/signup/host?message=you-can-not-upload-file-of-this-type');
    }
}

/*


// Get the user's password from a form
$password = $_POST['password'];

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


*/



///
if(Validator::string($password,  8, 55) && Validator::email($email))
{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $user = new Host();
     $data = [
        'username'=>$_POST['user-name'],
        'first_name' => $_POST['first-name'],
        'last_name' => $_POST['last-name'],
         'email' => $_POST['email'],
         'phone_num' => $_POST['phone-number'],
         'profile_img' => "{$config['base_urll']}/public/assets/imgs/profile/{$fileNameNew}",
         'country' => $_POST['country'],
         'services' => $_POST['help-with'],
         'password' => $hashedPassword ,
         'type' => $type,
         'Description' => $_POST['Description'],
         'Traveller_num' => 0,
         'location' => $_POST['location'],
         'more_info' => $_POST['more-info']
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

// image input only



