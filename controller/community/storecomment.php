<?php

use core\Classes\Comment;
use core\Classes\Post;
use core\Classes\Notification;

$config = require base_path('config.php');
$userData = $_SESSION['user'];

$current_user_id = $userData['id'];
if (isset($_POST['subLove'])) {
    Post::makeLove($current_user_id, $_POST['loveVal'],$userData['id'],$userData);
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
    $post = new Post();
    $mypost = $post->getOne($_GET['id']);
      $recieverid = $mypost['user_id'];
      $sendername = $userData['name'] ;   
        if($current_user_id != $recieverid){
            Notification::makeNoti($current_user_id, $recieverid,"$sendername comment on your post",2, $_GET['id']);
        }
}

header('location: ' .  "/culture_swap/post?id={$_GET['id']}");
