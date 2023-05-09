<?php
$post_id = $_GET['id'];
$userData = $_SESSION['user'];

use core\Classes\Post;

Post::delete($post_id, $userData['id']);
header('location: ' . "/culture_swap/posts");
