<?php

use core\Classes\DB\user;
use core\Classes\Host;
use core\Classes\Traveller;
use core\Response;
use core\Database;

function dd($value)
{
  echo "<pre>";
  var_dump($value);

  echo "</pre>";
  die();
}
function base_path($path)
{
  return BASE_PATH . $path;
}

function abort($code = 404)
{
  http_response_code($code);

  require base_path("views/error$code.php");
  die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
  if (!$condition) {
    abort($status);
  }
}

function fetchHostsCardData($params, $page)
{
  $filters = [
    'first_name' => $params['searchQ'] ?? '',
    'last_name' => $params['searchQ'] ?? '',
    'countries' => $params['countries'] ?? '',
    'needIds' => $params['needIds'],
    'startRate' => $params['startRate'] ?? 0,
    'endRate' => $params['endRate'] ?? 5
  ];
  $limit = Components::getCardsPerPageLimit();
  $cardsData = Host::search($filters, $page, $limit);

  return $cardsData;
}

function fetchTravelersCardData($params, $page)
{
  $filters = [
    'first_name' => $params['searchQ'] ?? '',
    'last_name' => $params['searchQ'] ?? '',
    'countries' => $params['countries'] ?? '',
    'serviceIds' => $params['serviceIds'],
  ];
  $limit = Components::getCardsPerPageLimit();
  $cardsData = Traveller::search($filters, $page, $limit);

  return $cardsData;
}

function getUserType($id)
{
  return (Database::getInstance()->query(
    "SELECT type FROM _user WHERE Id = :id",
    [':id' => $id]
  )->find());
}
//////////////////////////////////////////////////////////////
function signUp($user)
{
  session_start();
  $_SESSION['user'] = [
    'name' => "{$user->getFirstName()} {$user->getLastName()}",
    'email' => $user->getEmail(),
    'username' => $user->getUserName(),
    'profileImg' => $user->getProfilePhoto(),
    'id' => $user->getId(),
    'country' => $user->getCountry(),
    'type' => $user->getType() == 1 ? "host" : "traveller"
  ];

  session_regenerate_id(true); // To have a high security
}

function login($user)
{
  session_start();
  $_SESSION['user'] = [
    'name' => "{$user['first_name']} {$user['last_name']}",
    'email' => $user['email'],
    'profileImg' => $user['profile_img'],
    'username' => $user['user_name'],
    'id' => $user['Id'],
    'country' => $user['country'],
    'type' => $user['type'] == 1 ? "host" : "traveller"
  ];
  session_regenerate_id(true); // To have a high security
}


function logout()
{
  $_SESSION = []; // create our session super global

  session_destroy();
}


function getCountries()
{
  $db = Database::getInstance();
  return $db->query('SELECT DISTINCT country FROM _user')->get();
}
