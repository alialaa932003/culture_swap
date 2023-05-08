<?php

use core\Classes\Host;
use core\Response;

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
        'country' => $params['searchQ'] ?? '',
        'needIds' => $params['needIds'],
        'startRate' => $params['startRate'] ?? 0,
        'endRate' => $params['endRate'] ?? 5
    ];
    $limit = Components::getCardsPerPageLimit();
    $cardsData = Host::search($filters, $page, $limit);

    return $cardsData;
}
//////////////////////////////////////////////////////////////
function  login($user)
{

    session_start();
    $_SESSION['user'] = [
        'type' => $user->getType(),
        'email' => $user->getEmail(),
        'username' => $user->getUserName(),
        'id' => $user->getId(),
        'country' => $user->getCountry(),
    ];
    session_regenerate_id(true); // To have a high security
}


function  logout()
{
    $_SESSION = []; // create our session super global

    session_destroy();
}
