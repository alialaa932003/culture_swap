<?php

use core\Classes\Post;
use core\Classes\DB\PostDB;

$config = require base_path('config.php');

$postObj = new Post();
$post = $postObj->getOne($_GET['id']);

$data = [];
$data['title'] = $_POST['title'];
$data['content'] = $_POST['content'];
if (empty($_FILES['image']['name'])) {
    $data['img'] = $post['img'];
} else {


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
                $data['img'] = "{$config['base_urll']}/public/assets/imgs/posts/{$fileNameNew}";
            } else {
                $data['img'] = $post['img'];
                header('location: ' .  "/culture_swap/post?id={$_GET['id']}&message=your-file-is-too-big");
                die();
            }
        } else {
            $data['img'] = $post['img'];
            header('location: ' .  "/culture_swap/post?id={$_GET['id']}&message=there-was-an-error-uploading-your-file");
            die();
        }
    } else {
        $data['img'] = $post['img'];
        header('location: ' .  "/culture_swap/post?id={$_GET['id']}&message=you-can-not-upload-file-of-this-type");
        die();
    }
}
$postObj->setContent($data['content']);
$postObj->setTitle($data['title']);
$postObj->setImg($data['img']);
header('location: ' .  "/culture_swap/post?id={$_GET['id']}&message=upload-success");
die();

// dd($_FILES);
