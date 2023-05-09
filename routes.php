<?php
$router->get('/culture_swap/', 'controller/index.php');
//! community
$router->get('/culture_swap/posts', 'controller/community/posts.php')->only('user');
$router->get('/culture_swap/post', 'controller/community/show.php')->only('user');
$router->post('/culture_swap/posts', 'controller/community/store.php')->only('user');
$router->post('/culture_swap/post', 'controller/community/storecomment.php')->only('user');
$router->patch('/culture_swap/post', 'controller/community/update.php')->only('user');
$router->delete('/culture_swap/post', 'controller/community/danger.php')->only('user');


$router->get('/culture_swap/favourites', 'controller/favourites.php');
$router->get('/culture_swap/faq', 'controller/faq.php');
$router->get('/culture_swap/about', 'controller/about.php');

//! Signup Requests
$router->get('/culture_swap/signup/traveller', 'controller/signup/traveller/createTraveller.php')->only('guest');
$router->post('/culture_swap/signup/traveller', 'controller/signup/traveller/storeTraveller.php');
$router->get('/culture_swap/signup/traveller_vip', 'controller/signup/traveller/createTravellerVip.php')->only('guest');
$router->post('/culture_swap/signup/traveller_vip', 'controller/signup/traveller/storeTravellerVip.php');
$router->get('/culture_swap/signup/host', 'controller/signup/host/createHost.php')->only('guest');
$router->post('/culture_swap/signup/host', 'controller/signup/host/storeHost.php');
//! Login Requests
$router->get('/culture_swap/login', 'controller/session/create.php')->only('guest');
$router->post('/culture_swap/login', 'controller/session/store.php')->only('guest');

$router->get('/culture_swap/test', 'controller/test.php');

//! Search
$router->get('/culture_swap/hosts', 'controller/hosts.php');
$router->get('/culture_swap/travelers', 'controller/travelers.php');
$router->get('/culture_swap/profile', 'controller/profile.php');
