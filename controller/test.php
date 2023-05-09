<?php

use core\Classes\DB\{
  HostDB,
  TravellerDB,
  TravellerVipDB
};

ini_set('display_errors', 1);
ini_set('error_reporting', 1);

use core\Classes\Reservation;

    $myres = new  Reservation() ;

    $myres::updateStatus(1,1);



dd(TravellerDB::add([
  'first_name' => 'aswefwfwffsafsf',
  'last_name' => 'afsaweweffwefsfwefsf',
  'user_name' => 'safsweweffafwef4578',
  'email' => 'asfsafaswweffewfaweffw@g.com',
  'type' => 1,
  'phone_num' => '815weweffw5184',
  'profile_img' => '',
  'cover_img' => '',
  'country' => 'UK',
  'password' => '564215451',
  'services' => [1, 2,3]
]));