<?php
$userData = $_SESSION['user'];

use core\Classes\Notification;
use core\Classes\Reservation;

$notifications = Notification::getAll($userData['id']);

if ($_POST['acceptNoti'] == 1) {
    Reservation::updateStatus($_POST['action_id'], 1);
} else if ($_POST['cancelNoti'] == 1) {
    Reservation::updateStatus($_POST['action_id'], 0);
}
// if (!empty($_POST['action_id'])) {

//     var_dump($_POST);
//     die();
// }