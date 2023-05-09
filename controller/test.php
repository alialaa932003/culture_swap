<?php

use core\Classes\Traveller;
use core\Classes\DB\{
  HostDB,
  TravellerDB,
  TravellerVipDB
};
use core\Classes\Host;

ini_set('display_errors', 1);
ini_set('error_reporting', 1);

use core\Classes\Reservation;

$test = new Host();
$test->getOne(1);
dd($test);
