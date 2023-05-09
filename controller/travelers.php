<?php
$ASSET_URL = "/culture_swap/public/";
$allCountries = getCountries();

//! services filter logic
$servicesIds = [];
foreach ($_GET['services'] as $service) {
  array_push($servicesIds, $service);
};
$_GET['service'] ? array_push($servicesIds, $_GET['service']) : "";
$_GET['serviceIds'] = implode(',', $servicesIds);

//! Countries filter logic
$countries = [];
foreach ($_GET['countries'] as $country) {
  array_push($countries, "'$country'");
}
;
$_GET['country'] = implode(',', $countries);


$page = $_GET['page'] ?? 0;
$cardsData = fetchTravelersCardData($_GET, $page);

require base_path("views/travelers.view.php");
