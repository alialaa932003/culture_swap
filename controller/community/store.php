<?php

use core\Classes\Post;

$config = require base_path('config.php');
$current_user_id = 1;
if (isset($_POST['subLove'])) {
    Post::makeLove($current_user_id, $_POST['loveVal']);
}
if (isset($_POST['submit'])) {


    $file = $_FILES['image'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;

                $fileDestination = base_path('public/assets/imgs/posts/') . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $post = new Post();
                $post->add([
                    'user_id' => 1,
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'img' => "{$config['base_urll']}/public/assets/imgs/posts/{$fileNameNew}",
                ]);

                header('location: ' .  "/culture_swap/posts?message=upload-success");
                die();
            } else {
                header('location: ' .  '/culture_swap/posts?message=your-file-is-too-big');
                die();
            }
        } else {
            header('location: ' .  '/culture_swap/posts?message=there-was-an-error-uploading-your-file');
            die();
        }
    } else {
        header('location: ' .  '/culture_swap/posts?message=you-can-not-upload-file-of-this-type');
        die();
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
