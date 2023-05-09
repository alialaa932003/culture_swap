<?php

use core\Classes\DB\HostDB;
use core\Database;

$ASSET_URL = "/culture_swap/public/";

//   cards
$cards = Database::getInstance()->query(
    "SELECT id, MAX(Rate_average) AS max_rating, GROUP_CONCAT(Description SEPARATOR ', ') AS descriptions
 FROM host
 GROUP BY id
 ORDER BY max_rating DESC
 LIMIT 6"
)->get();

//end cards

$icons = [
    "Animals & Farming" => '<i class="fa-solid fa-seedling"></i>',
    "packpaker Hotels &hospitality" => '<i class="fa-regular fa-hospital"></i>',
    "Farming & Homesteads" => '<i class="fa-solid fa-tractor"></i>',
    "Building & Restoration" => '<i class="fa-solid fa-hammer"></i>',
    "Teaching & language" => '<i class="fa-solid fa-graduation-cap"></i>',
    "intenships Abroad" => '<i class="fa-solid fa-school"></i>',
];


///////services 
$services = Database::getInstance()->query("SELECT Id, name FROM service limit 6")->get();

/////end services

//////popular places
$popularPlaces = Database::getInstance()->query("SELECT Location,
 COUNT(*) AS host_count  FROM host GROUP BY Location
ORDER BY host_count DESC
LIMIT 8 ")->get();
//////end popular places


// statistics 

$num_trv =  Database::getInstance()->query("SELECT COUNT(id) AS num_travelers FROM traveller")->get();


// end  statistics 





require base_path("views/index.view.php");
