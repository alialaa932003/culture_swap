<?php
$ASSET_URL = "/culture_swap/public/";

use core\Classes\Post;


$req = $_GET['id'];

$post = new Post();

$postdet = $post->getOne($req);

$comments = $postdet['comments'];
$num_comments = count($comments);
$recentPosts = Post::search("", 0, 6);







require base_path("views/community/show.view.php");
