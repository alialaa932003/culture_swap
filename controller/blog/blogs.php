<?php
$ASSET_URL = "/culture_swap/public/";

use core\Classes\Reservation;

$lol = new Reservation();
$lol->getStDate();
dd($lol);
require base_path("views/blog/blogs.view.php");
