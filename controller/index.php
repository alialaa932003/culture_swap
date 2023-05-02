<?php
$ASSET_URL = "/culture_swap/public/";

use core\Classes\DB\NotificationDB;

dd((new NotificationDB())->getAll());
require base_path("views/index.view.php");
