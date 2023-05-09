<?php
$ASSET_URL = "/culture_swap/public";

$page = $_GET['page'] ?? 0;

//! Services filter logic
$needIds = [];
foreach($_GET['services'] as $service){
  array_push($needIds, $service);
};
$_GET['needIds'] = implode(',', $needIds);



$cardsData = fetchHostsCardData($_GET, $page);

require base_path("views/hosts.view.php");
