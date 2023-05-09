<?php
$ASSET_URL = "/culture_swap/public";

$page = $_GET['page'] ?? 0;
$allCountries = getCountries();


//! needs filter logic
$needIds = [];
foreach ($_GET['needs'] as $need) {
  array_push($needIds, $need);
}
;
$_GET['need'] ? array_push($needIds, $_GET['need']) : "";
$_GET['needIds'] = implode(',', $needIds);

//! Countries filter logic
$countries = [];
foreach ($_GET['countries'] as $country) {
  array_push($countries, "'$country'");
};

$_GET['country'] ? array_push($countries, "'{$_GET['country']}'") : "";
$_GET['countries'] = implode(',', $countries);
$cardsData = fetchHostsCardData($_GET, $page);

require base_path("views/hosts.view.php");