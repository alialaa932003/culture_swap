<?php

use core\Classes\Reservation;

if (!$_POST['join'])
  return;

$currentUserId = $_SESSION['user']['id'];
$currentUserName = $_SESSION['user']['name'];
$hostId = $_POST['id'];
$startDate = strtotime($_POST['startDate']);
$endDate = strtotime($_POST['endDate']);

$startTime = date("Y-m-d H:i:s", $startDate);
$endTime = date("Y-m-d H:i:s", $endDate);

Reservation::makeReservation($currentUserId, $hostId, 0, $startTime, $endTime, $currentUserName);

header('location:' . "/culture_swap/profile?id=$hostId");
