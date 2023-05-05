<?php
$ASSET_URL = "/culture_swap/public/";

use core\Classes\Post;

$lol = new Post();
$lol->getOne(2);
dd($lol->getId());
require base_path("views/blog/blogs.view.php");
