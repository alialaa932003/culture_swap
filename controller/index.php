<?php
use core\Classes\DB\HostDB;
use core\Database;
$ASSET_URL = "/culture_swap/public/";

//   cards
 $cards= Database::getInstance()->query("SELECT id, MAX(Rate_average) AS max_rating, GROUP_CONCAT(Description SEPARATOR ', ') AS descriptions
 FROM host
 GROUP BY id
 ORDER BY max_rating DESC
 LIMIT 6"
)->get();

//end cards



//services 
$services = Database::getInstance()->query("SELECT Id, name FROM service")->get();







 
   
require base_path("views/index.view.php");
