<?php

use core\Classes\DB\HostDB;
use core\Classes\DB\TravellerDB;

if (!$_POST['update'])
  return;

$id = $_POST['id'];
unset($_POST['id']);

if (getUserType($id)) {
  foreach ($_POST as $item)
    HostDB::update([$item]);
} else {
  foreach ($_POST as $item)
    TravellerDB::update([$item]);
}

header('location:' . "/culture_swap/profile?id=$id");
