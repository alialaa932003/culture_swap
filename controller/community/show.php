<?php
$ASSET_URL = "/culture_swap/public/";

use core\Classes\Post;


$req = $_GET['id'];

$post = new Post();

$postdet = $post->getOne($req);

$comments = $postdet['comments'];

$num_comments = count($comments);

/// extract day from date

//$postdet["date"];
$date = '2023-05-07';
$day = date('d', strtotime($date));
//echo $day; 
///end date





require base_path("views/community/show.view.php");
