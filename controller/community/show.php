<?php
$ASSET_URL = "/culture_swap/public/";

use core\Classes\Post;


$req = $_GET['id'];

$post = new Post();

$postdet = $post->getOne($req);

$comments = $postdet['comments'];
dd($postdet);
$num_comments = count($comments);







require base_path("views/community/show.view.php");
