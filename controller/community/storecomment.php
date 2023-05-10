<?php

use core\Classes\Comment;
use core\Classes\Post;

$config = require base_path('config.php');
$userData = $_SESSION['user'];

$current_user_id = $userData['id'];
if (isset($_POST['subLove'])) {
    Post::makeLove($current_user_id, $_POST['loveVal']);
    //add love noti
}
$comment = $_POST['comment'];
$comment = trim($comment, "");
if (!empty($comment)) {
    (new Comment)->add(
        [
            'user_id' => $current_user_id,
            'content' => $comment,
            'post_id' =>   $_GET['id']
        ]
    );
    //add comment noti
}

header('location: ' .  "/culture_swap/post?id={$_GET['id']}");
