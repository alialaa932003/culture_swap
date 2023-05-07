<?php
use core\Classes\DB\{
  TravellerDB,
  TravellerVipDB
};

ini_set('display_errors', 1);
ini_set('error_reporting', 1);
use core\Classes\TravellerVip;

$traveller = new TravellerVip();
$traveller->add([
  'first_name' => 'shehab',
  'last_name' => 'waleed',
  'username' => 'shehab2211',
  'password' => '1234',
  'email' => 'shehab2222@gmail.com',
  'type' => 1,
  'phone_num' => '0163',
  'profile_img' => 'sdjmeiwfw',
  'cover_img' => 'iiigiegierg',
  'country' => 'Egypt',
  'services' => [
    [
      'service' => 'Web Development',
      'service_id' => 1
    ]
  ],
  'payment_option' => 'Visa',
  'card_number' => '123456',
  'cvc_number' => '44',
  'exp_date' => '2023-05-04'
]);


// $traveller->getOne(6);
// dd($traveller->delete(5));