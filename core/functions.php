<?php


use core\Response;
function dd($value){
    echo "<pre>";
    var_dump($value);

    echo "</pre>";
    die();
}
function base_path($path){
    return BASE_PATH . $path;
}

function abort($code=404){
    http_response_code($code);

        require base_path("views/error$code.php");
        die();
}

function authorize($condition,$status =Response::FORBIDDEN){
    if(!$condition){
        abort($status);
    }
}

function fetchCardData($params) {
    $cardsData = [
        [
            'img' => "public/assets/imgs/home/header5.webp",
            'country' => "norway",
            'title' => "Beautiful smallholding on the island of Engeløya, Norway",
            'rating' => 4,
            'hostId' => 1,
            'isFav' => true,
            'toggleFav' => function () {},
        ],
        [
            'img' => "public/assets/imgs/home/header4.webp",
            'country' => "norway",
            'title' => "Beautiful smallholding on the island of Engeløya, Norway",
            'rating' => 5,
            'hostId' => 1,
            'isFav' => true,
            'toggleFav' => function () {},
        ],
        [
            'img' => "public/assets/imgs/home/header2.webp",
            'country' => "norway",
            'title' => "Beautiful smallholding on the island of Engeløya, Norway",
            'rating' => 1,
            'hostId' => 1,
            'isFav' => true,
            'toggleFav' => function () {},
        ],
        [
            'img' => "public/assets/imgs/home/header2.webp",
            'country' => "norway",
            'title' => "Beautiful smallholding on the island of Engeløya, Norway",
            'rating' => 3,
            'hostId' => 1,
            'isFav' => true,
            'toggleFav' => function () {},
        ],
        [
            'img' => "public/assets/imgs/home/header5.webp",
            'country' => "norway",
            'title' => "Beautiful smallholding on the island of Engeløya, Norway",
            'rating' => 0,
            'hostId' => 1,
            'isFav' => true,
            'toggleFav' => function () {},
        ],
        [
            'img' => "public/assets/imgs/home/header4.webp",
            'country' => "norway",
            'title' => "Beautiful smallholding on the island of Engeløya, Norway",
            'rating' => 4,
            'hostId' => 1,
            'isFav' => true,
            'toggleFav' => function () {},
        ],
        [
            'img' => "public/assets/imgs/home/header4.webp",
            'country' => "norway",
            'title' => "Beautiful smallholding on the island of Engeløya, Norway",
            'rating' => 5,
            'hostId' => 1,
            'isFav' => true,
            'toggleFav' => function () {},
        ],
        [
            'img' => "public/assets/imgs/home/header2.webp",
            'country' => "norway",
            'title' => "Beautiful smallholding on the island of Engeløya, Norway",
            'rating' => 2,
            'hostId' => 1,
            'isFav' => true,
            'toggleFav' => function () {},
        ],
        [
            'img' => "public/assets/imgs/home/header5.webp",
            'country' => "norway",
            'title' => "Beautiful smallholding on the island of Engeløya, Norway",
            'rating' => 3,
            'hostId' => 1,
            'isFav' => true,
            'toggleFav' => function () {},
        ],
        [
            'img' => "public/assets/imgs/home/header2.webp",
            'country' => "norway",
            'title' => "Beautiful smallholding on the island of Engeløya, Norway",
            'rating' => 4,
            'hostId' => 1,
            'isFav' => true,
            'toggleFav' => function () {},
        ],
        [
            'img' => "public/assets/imgs/home/header4.webp",
            'country' => "norway",
            'title' => "Beautiful smallholding on the island of Engeløya, Norway",
            'rating' => 1,
            'hostId' => 1,
            'isFav' => true,
            'toggleFav' => function () {},
        ],
        [
            'img' => "public/assets/imgs/home/header5.webp",
            'country' => "norway",
            'title' => "Beautiful smallholding on the island of Engeløya, Norway",
            'rating' => 4,
            'hostId' => 1,
            'isFav' => true,
            'toggleFav' => function () {},
        ],
    ];

    return $cardsData;
}
//////////////////////////////////////////////////////////////
 function  login($user)
{
    session_start();
  $_SESSION['user'] = [
    'type' => $user['type'],
    'email' => $user['email'],
    'username' => $user['username'],
    'id' => $user['id'],
    'country' => $user['country'],
  ];
  session_regenerate_id(true); // To have a high security
}


function  logout(){
  $_SESSION = []; // create our session super global
 
    session_destroy();
}




?>
