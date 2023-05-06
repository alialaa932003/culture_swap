<?php
use core\Classes\DB\{
  TravellerDB,
  TravellerVipDB
};

ini_set('display_errors', 1);
ini_set('error_reporting', 1);
use core\Classes\TravellerVip;

$traveller = new TravellerVip();

$traveller->getOne(23);
$traveller->setCvc('999');
dd($traveller->getCvc());

// $traveller->getOne(6);
// dd($traveller->delete(5));