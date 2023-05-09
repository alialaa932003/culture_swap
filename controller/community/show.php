<?php
$ASSET_URL = "/culture_swap/public/";

use core\Classes\Post;

$userData = $_SESSION['user'];

$current_user_id = $userData['id'];
$user_loves = Post::get_user_loves($current_user_id);
$req = $_GET['id'];
$lovesNum = Post::get_loves_num($_GET['id'])['lovesNum'];
$post = new Post();

$postdet = $post->getOne($req);

$comments = $postdet['comments'];
$num_comments = count($comments);
$recentPosts = Post::search("", 0, 6);

/// extract day from date

//$postdet["date"];


$date = '2023-05-07';
$day = date('d', strtotime($date));
//echo $day; 
///end date




require base_path("views/community/show.view.php");
