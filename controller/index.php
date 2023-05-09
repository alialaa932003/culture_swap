<?php

use core\Classes\DB\HostDB;
use core\Database;

$ASSET_URL = "/culture_swap/public/";

//   cards
$cards = Database::getInstance()->query(
    "SELECT _user.Id, MAX(Rate_average) AS max_rating, GROUP_CONCAT(Description SEPARATOR ', ') AS descriptions,_user.*
 FROM host INNER JOIN _user ON _user.Id = host.Id 
 GROUP BY id
 ORDER BY max_rating DESC
 LIMIT 6"
)->get();
// dd($cards);
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
$num_trv =  Database::getInstance()->query("SELECT COUNT(Id) AS num_travelers FROM traveller")->find();
$num_hst =  Database::getInstance()->query("SELECT COUNT(Id) AS num_hosts FROM host")->find();
$avg_hst_rating = Database::getInstance()->query("SELECT AVG(Rate_average) AS avg_rate FROM host")->find();
$joins = Database::getInstance()->query("SELECT COUNT(Id) AS num_reservations FROM reservation WHERE Status = 1")->find();


$trv_rate = $num_trv['num_travelers'];
$hst_rate = $num_hst['num_hosts'];
$hst_avg_rate = (int)$avg_hst_rating["avg_rate"];
$num_joins = $joins["num_reservations"];


// end  statistics 





require base_path("views/index.view.php");
