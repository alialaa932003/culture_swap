<?php
$userData = $_SESSION['user'];

use core\Classes\Notification;
use core\Classes\Reservation;

$notifications = Notification::getAll($userData['id']);


if ($_POST['acceptNoti'] == 1) {
    Reservation::updateStatus($_POST['action_id'], 1);
    Notification::delete($_POST['noti_id'], $userData['id']);
} else if ($_POST['cancelNoti'] == 2) {
    Reservation::updateStatus($_POST['action_id'], 2);
    Notification::delete($_POST['noti_id'], $userData['id']);
}
// if (!empty($_POST['action_id'])) {

//     var_dump($_POST);
//     die();
// }
