<?php
$userData = $_SESSION['user'];

use core\Classes\Notification;

$notifications = Notification::getAll($userData['id']);
// dd($notifications);;
// if (!empty($_POST['action_id'])) {

//     var_dump($_POST);
//     die();
// }
