<?php
$ASSET_URL = "/culture_swap/public/";

use core\Classes\{
  Traveller,
  Host
};

use core\Classes\DB\{
  PostDB,
  CommentDB,
  TravellerDB,
};

$userId = $_SESSION['user']['id'];
$idFromQuery = $_GET['id'];
$canEditProfile = $userId == $idFromQuery ? True : False;

if (!getUserType($idFromQuery))
  abort();

$userType = getUserType($idFromQuery)['type'] == 1 ? 'host' : 'traveller';
$isHost = $userType == 'host' ? True : false;

if ($userType == 'traveller') {
  $traveller = new Traveller();
  $traveller->getOne($idFromQuery);
  $userName = $traveller->getUserName();
  $country = $traveller->getCountry();
  $email = $traveller->getEmail();
  $services = [];
  foreach ($traveller->getService() as $service) {
    array_push($services, $service['name']);
  }
  $posts = PostDB::getUserPostIdsAndTitle($idFromQuery);
  $postsCount = count($posts);
  $hostsCount = TravellerDB::getHostNums($idFromQuery)['COUNT(traveller_id'] ?? 0;
  $commentsCount = CommentDB::getUserCommentsNum($idFromQuery)[0]['COUNT(id)'];
} elseif ($userType == 'host') {
  $host = new Host();
  $host->getOne($idFromQuery);
  $userName = $host->getUserName();
  $country = $host->getCountry();
  $email = $host->getEmail();
  $needs = [];
  foreach ($host->getneeds() as $need) {
    array_push($needs, $need['name']);
  }
  $description = $host->getDescription();
  $travellersCount = $host->getTraveller_num() ?? 0;
  $location = $host->getLocation();
  $rate = $host->getrate();
  $status = $host->getStatus();
  $posts = PostDB::getUserPostIdsAndTitle($idFromQuery);
  $postsCount = count($posts);
  $commentsCount = CommentDB::getUserCommentsNum($idFromQuery)[0]['COUNT(id)'];
}

<<<<<<< HEAD:controller/profile.php
=======

>>>>>>> refs/remotes/origin/main:controller/profile/index.php
require base_path("views/profile.view.php");








// $isHost = false;
// $userName = "Salah Mohamed";
// $country = 'USA';
// $email = 'sdasda@gmail.com';
// $description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis magnam repellat adipisci voluptatibus tempore, nemo repellendus, eum accusantium et, illo odit obcaecati. Qui nam reprehenderit corporis amet exercitationem ad dolorum!';
// $posts = [
//   [
//     'id' => 1,
//     'title' => 'My last journy'
//   ]
// ];
// $postsCount = 5;
// $commentsCount = 7;
// $services = ['Web', 'mobile', 'UI'];
// //Traveller
// $hostsCount = 10;
// //Host
// $travellersCount = 20;
// $location = "128,los anglos";
// $rate = 5;
// $status = 'Active'