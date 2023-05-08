<?php
$ASSET_URL = "/culture_swap/public/";

$page = $_GET['page'] ?? 0;
$cardsData = fetchTravelersCardData($_GET, $page);

require base_path("views/travelers.view.php");
