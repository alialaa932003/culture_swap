<?php

use core\Classes\Traveller;
use core\Classes\DB\TravellerDB;

dd(TravellerDB::getOne(5));

require base_path("views/faq.view.php");