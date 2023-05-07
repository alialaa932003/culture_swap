<?php

use core\Classes\Comment;

$config = require base_path('config.php');

$comment = $_POST['comment'];
$comment = trim($comment, " ");
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
