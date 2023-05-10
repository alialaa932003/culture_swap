<?php

use core\Classes\DB\HostDB;
use core\Classes\DB\TravellerDB;

if (!$_POST['update'])
  return;

$id = $_POST['id'];
unset($_POST['id']);
$userType = getUserType($id)['type'] == 1 ? 'host' : 'traveller';
if ($userType == 'host') {
  foreach ($_POST as $key => $value)
    HostDB::update([
      'id' => $id,
      'key' => $key,
      'value' => $value
    ]);
} else {
  foreach ($_POST as $key => $value)
    TravellerDB::update([
      'id' => $id,
      'key' => $key,
      'value' => $value
    ]);
}

header('location:' . "/culture_swap/profile?id=$id");