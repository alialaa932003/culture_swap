<?php

use core\Classes\DB\{
  HostDB,
  TravellerDB,
  TravellerVipDB
};

ini_set('display_errors', 1);
ini_set('error_reporting', 1);

use core\Classes\TravellerVip;

dd(HostDB::search([
  'needIds' => [8, 3],
  'startRate' => 0,
  'endRate' => 5
], 0, 30));


// $traveller->getOne(6);
// dd($traveller->delete(5));