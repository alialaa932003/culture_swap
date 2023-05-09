<?php
$userData = $_SESSION['user'];

use core\Classes\Notification;
use core\Classes\DB\NotificationDB;
use core\Classes\Reservation;

$notifications = Notification::getAll($userData['id']);
$notificationsRes = NotificationDB::getAllRes($userData['id']);
$notimerge = array_merge($notificationsRes, $notifications);


