<?php

use core\Classes\Reservation;
use core\Classes\Notification;

$userData = $_SESSION['user'];

if ($_POST['acceptNoti'] == 1) {

    Reservation::updateStatus($_POST['action_id'], 1);
    Notification::delete($_POST['noti_id'], $userData['id']);
} else if ($_POST['cancelNoti'] == 2) {
    Reservation::updateStatus($_POST['action_id'], 2);
    Notification::delete($_POST['noti_id'], $userData['id']);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
