<?php
$ASSET_URL = "/culture_swap/public";

$page = $_GET['page'] ?? 0;
$cardsData = fetchHostsCardData($_GET, $page);


require base_path("views/hosts.view.php");
