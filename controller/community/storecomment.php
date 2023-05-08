<?php

use core\Classes\Comment;
use core\Classes\Post;

$config = require base_path('config.php');
$current_user_id = 1;
if (isset($_POST['subLove'])) {
    Post::makeLove($current_user_id, $_POST['loveVal']);
}
$comment = $_POST['comment'];
$comment = trim($comment, "");
if (!empty($comment)) {
    (new Comment)->add(
        [
            'user_id' => 1,
            'content' => $comment,
            'post_id' =>   $_GET['id']
        ]
    );
}

header('location: ' .  "/culture_swap/post?id={$_GET['id']}");
