<?php
$ASSET_URL = "/culture_swap/public/";

use core\Classes\DB\TravellerDB;

dd((new TravellerDB())->search([
    'first_name' => "ali",
    'last_name' => "alaa",
    'country' => "egypt",

], 0, 5));
require base_path("views/index.view.php");
