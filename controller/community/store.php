<?php
$error = [];

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
                header('location: ' .  '/culture_swap/posts?message=upload-success');
            } else {
                header('location: ' .  '/culture_swap/posts?message=your-file-is-too-big');
            }
        } else {
            header('location: ' .  '/culture_swap/posts?message=there-was-an-error-uploading-your-file');
        }
    } else {
        header('location: ' .  '/culture_swap/posts?message=you-can-not-upload-file-of-this-type');
    }
}
