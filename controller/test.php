<?php
use core\Classes\DB\{
  TravellerDB,
  TravellerVipDB
};

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
use core\Classes\TravellerVip;

$traveller = new TravellerVip();
$traveller->add([
  'first_name' => 'shehab',
  'last_name' => 'waleed',
  'type' => '1',
  'email' => 'ShehabWaleed@gmail.com',
  'country'=> 'Egypt',
  'payment_option' => 'Visa',
  'card_number' => '123456',
  'phone_num' =>'010202010',
  'profile_img' =>'sjadn',
  'cover_img' => 'dwfwef',
  'cvc_number' => '44848',
  'exp_date' => '2023-5-4'
]);

