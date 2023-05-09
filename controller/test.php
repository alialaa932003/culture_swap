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



dd(HostDB::add([
  'first_name' => 'asfaf',
  'last_name' => 'asfwfasfsaf',
  'user_name' => 'asfsaf5477',
  'email' => '5asf4as@g.com',
  'type' => 1,
  'phone_num' => '5454112',
  'profile_img' => '',
  'cover_img' => '',
  'country' => 'USA',
  'password' => '451412',
  'status' => 'Active',
  'Description' => '452154',
  'Rate_average' => 3,
  'travelers_num' => 9,
  'location' => 'los815',
  'needs' => [1, 2]
]));
