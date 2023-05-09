<?php

use core\Classes\Reservation;

if ($_POST['cancelNoti'] == 0) {
    Reservation::updateStatus($_POST['action_id'], -1);
} else if ($_POST['acceptNoti'] == 1) {
    Reservation::updateStatus($_POST['action_id'], 1);
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
