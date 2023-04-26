<?php
$router->get('/culture_swap/', 'controller/index.php');
$router->get('/culture_swap/blogs', 'controller/blog/blogs.php');
$router->get('/culture_swap/blog', 'controller/blog/show.php');
$router->get('/culture_swap/faq', 'controller/faq.php');
$router->get('/culture_swap/about', 'controller/about.php');
$router->get('/culture_swap/signup/traveller', 'controller/signup/traveller.php');
$router->get('/culture_swap/signup/traveller_vip', 'controller/signup/traveller_vip.php');
$router->get('/culture_swap/signup/host', 'controller/signup/host.php');
$router->get('/culture_swap/login', 'controller/session/create.php');
$router->get('/culture_swap/template', 'controller/template.php');
