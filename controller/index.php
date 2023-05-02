<?php
$ASSET_URL = "/culture_swap/public/";

use core\Classes\DB\NotificationDB;

// require base_path('core/Classes/DB/NotificationDB.php');
dd((new NotificationDB())->getAll());
require base_path("views/index.view.php");
