<?php
use core\Classes\DB\{
  TravellerDB,
};

use core\Classes\Traveller;

$traveller = new Traveller();
// $traveller->add([
//   'first_name' => 'shehab',
//   'last_name' => 'waleed',
//   'username'=> 'shehab2211',
//   'password' => '1234',
//   'email' =>'shehab2222@gmail.com',
//   'type' => 1,
//   'phone_num' =>'0163',
//   'profile_img' =>'sdjmeiwfw',
//   'cover_img' => 'iiigiegierg',
//   'country' => 'Egypt',
//   'services'=> [
//     [
//       'service' => '1',
//       'service_id' => 'cooking'
//     ]
//   ],
// ]);

dd($traveller->getOne(5));