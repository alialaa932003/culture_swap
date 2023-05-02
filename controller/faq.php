<?php

use core\Classes\DB\ReservationDB;


ReservationDB::update([
  'id' => '27',
  'key' => 'traveller_id',
  'value' => '6'
]);
dd(ReservationDB::getAll());


require base_path("views/faq.view.php");