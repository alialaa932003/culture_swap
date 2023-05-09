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

$userType = $_SESSION['user']['type'];
$userId = $_SESSION['user']['id'];
$isHost = $userType == 'host' ? True : false;
$userName = $_SESSION['user']['username'];
$country = $_SESSION['user']['country'];
$email = $_SESSION['user']['email'];

if ($userType == 'traveller') {
  $traveller = new Traveller();
  $traveller->getOne($userId);
  $services = [];
  foreach ($traveller->getService() as $service) {
    array_push($services, $service['name']);
  }
  $posts = PostDB::getUserPostIdsAndTitle($userId);
  $postsCount = count($posts);
  $hostsCount = TravellerDB::getHostNums($userId)['COUNT(traveller_id'] ?? 0;
  $commentsCount = CommentDB::getUserCommentsNum($userId)[0]['COUNT(id)'];
} elseif ($userType == 'host') {
  $host = new Host();
  $host->getOne($userId);
  $services = $host->getneeds();
  $description = $hots->getDescription();
  $travellersCount = $host->getTraveller_num();
  $location = $host->getLocation();
  $rate = $host->getrate();
  $status = $host->getStatus();
  $posts = PostDB::getUserPostIdsAndTitle($userId);
  $postsCount = count($posts);
  $commentsCount = CommentDB::getUserCommentsNum($userId)[0]['COUNT(id)'];

}



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