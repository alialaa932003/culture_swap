<?php
$router->get('/culture_swap/', 'controller/index.php');
$router->get('/culture_swap/blogs', 'controller/community/blogs.php');
$router->get('/culture_swap/blog', 'controller/community/show.php');
$router->get('/culture_swap/faq', 'controller/faq.php');
$router->get('/culture_swap/about', 'controller/about.php');

$router->get('/culture_swap/signup/traveller', 'controller/signup/traveller.php')->only('guest');
$router->get('/culture_swap/signup/traveller_vip', 'controller/signup/traveller_vip.php')->only('guest');
$router->get('/culture_swap/signup/host', 'controller/signup/host.php')->only('guest');

$router->get('/culture_swap/login', 'controller/session/create.php')->only('guest');
$router->get('/culture_swap/template', 'controller/template.php');

$router->get('/culture_swap/test', 'controller/test.php');

$router->get('/culture_swap/hosts', 'controller/hosts.php');
$router->get('/culture_swap/travelers', 'controller/travelers.php');
