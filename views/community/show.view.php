<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
</head>

<?php
require base_path("views/partials/head.view.php");
?>
<link rel="stylesheet" href="/culture_swap/public/assets/css/blog.css">
<title>blog</title>

<body>

    <?php
    require base_path("views/partials/nav.view.php");
    ?>
    <?php if ($postdet['user_id'] == $userData['id']) : ?>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="modal-header">

                        <h2 class="modal-title " id="exampleModalLabel">edit post</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="postItem">
                            <label for="title">title</label>
                            <input placeholder="enter title" name="title" type="text" value=<?= $postdet["title"]  ?>>
                        </div>
                        <div class="postItem">
                            <label for="content">content</label>
                            <textarea placeholder="enter content" name="content" type="text" value=><?= $postdet["content"]  ?></textarea>
                        </div>
                        <div class="postItem">
                            <label for="image">image</label>
                            <input placeholder="enter image" name="image" type="file">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="main-btn" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="second-btn">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
    <section class="blogDetails section-padding">
        <div class="container">
            <div class="head">
                <h2 class="heading">
                    post details
                </h2>
                <?php if ($postdet['user_id'] == $userData['id']) : ?>
                    <div class="postActions" style="display: flex;">
                        <button class="second-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">edit post</button>
                        <form action="" method="POST" style="margin-left: 1rem;">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="main-btn"> delete post</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row">

                <!------------------------ Recent posts -------------------------------------->
                <div class="col-lg-4">
                    <div class="recent-posts">
                        <h4>recent posts</h4>
                        <?php foreach ($recentPosts as $post) : ?>
                            <div class="item">
                                <div class="image">
                                    <a href="/culture_swap/post?id=<?= $post['post_id'] ?>">
                                        <img src=<?= $post['img'] ?> alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <h5>
                                        <a href="/culture_swap/post?id=<?= $post['post_id'] ?>">
                                            <?= $post['title'] ?>
                                        </a>
                                    </h5>
                                    <span>
                                        <i class="fa fa-clock" aria-hidden="true"></i>
                                        <?= (new DateTime($post['date']))->format('d') ?>
                                        <?= (new DateTime($post['date']))->format('M') ?>
                                        <?= (new DateTime($post['date']))->format('Y') ?>
                                    </span>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>

                <!------------------------ end  Recent posts -------------------------------------->





                <div class="col-lg-8">
                    <div class="details">
                        <div class="image">
                            <img src=<?= $postdet['img'] ?> alt="">
                            <form action="" method="POST">
                                <input type="hidden" name="loveVal" value=<?= $_GET['id'] ?>>
                                <button class="love" type="submit" name="subLove">
                                    <span>
                                        <?php if (in_array($_GET['id'], $user_loves)) :  ?>
                                            <i class="fa-solid fa-heart"></i>
                                        <?php endif;  ?>
                                        <?php if (!in_array($_GET['id'], $user_loves)) :  ?>
                                            <i class="fa-regular fa-heart"></i>
                                        <?php endif;  ?>
                                    </span>
                                </button>
                            </form>
                        </div>

                        <!------------------------------------------------- post info  --------------------------------------------->

                        <div class="article-header">
                            <div class="date">

                                <span>
                                    <?= (new DateTime($postdet['date']))->format('d') ?>
                                </span>
                                <span><?= (new DateTime($postdet['date']))->format('M') ?> <?= (new DateTime($postdet['date']))->format('y') ?></span>
                            </div>
                            <div class="heading-header">
                                <h3>
                                    <a href="#"><?= $postdet["title"]  ?></a>
                                </h3>
                                <div class="company-content">
                                    <div class="item">
                                        <a href="#">
                                            <i class="fa fa-user" aria-hidden="true"></i>

                                            <?= $postdet['first_name'] . " " . $postdet['last_name'] ?>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <span>
                                            <i class="fa fa-folder-open" aria-hidden="true"></i>
                                            <?= $postdet['type'] == 1 ? "host" : "traveller" ?>
                                        </span>

                                    </div>
                                    <div class="item">
                                        <span>
                                            <i class="fa fa-location" aria-hidden="true"></i>
                                            <?= $postdet['country'] ?>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!------------------------------------------------- post info  --------------------------------------------->


                        <div class="detailsContent">
                            <div class="total">
                                <div class="totalItem">
                                    <span class="totalIcon"><i class="fa fa-heart" aria-hidden="true"></i></span>
                                    <span class="totalCount"><?= $lovesNum ?></span>
                                </div>
                                <div class="totalItem">
                                    <span class="totalIcon"><i class="fa fa-comment" aria-hidden="true"></i></span>
                                    <span class="totalCount"><?= $num_comments ?></span>
                                </div>
                            </div>

                            <p>
                                <?= $postdet["content"] ?>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="commentsSection">
        <div class="container">
            <div class="head">
                <h2 class="heading">comments</h2>
            </div>
            <form class="addComment" action="/culture_swap/post?id=<?= $_GET['id'] ?>" method="POST">
                <label for="comment">add comment</label>
                <textarea name="comment" id="" cols="30" rows="10"></textarea>
                <button class="main-btn " type="submit">submit</button>
            </form>

        </div>
    </section>
    <div class="allComments">
        <div class="container">
            <!-----------------------------   comments             ----------------------------------->
            <?php if (isset($comments)) : ?>

                <?php $cnt = 0; ?>
                <?php while ($cnt < $num_comments) : ?>

                    <div class="comment row">
                        <?php $name = $comments[$cnt]["first_name"] . " " . $comments[$cnt]["last_name"] ?>
                        <div class="col-lg-2">
                            <div class="user">
                                <div class="userImg">
                                    <img src=<?= $comments[$cnt]['profile_img'] ?> alt="">
                                </div>

                                <div class="userContent">
                                    <h3><?= $name ?></h3>
                                </div>

                            </div>

                        </div>

                        <div class="col-lg-10">

                            <p><?= $comments[$cnt]["content"] ?></p>

                            <?php $cnt++ ?>


                        </div>


                    </div>


                <?php endwhile ?>
            <?php endif ?>

            <?php if (empty($comments)) : ?>

                <p style="font-size: 20px;"> No comments found </p>


            <?php endif ?>



            <!--------------------------------------- end  comments   ----------------------------------->


        </div>
    </div>
    <?php
    require base_path("views/partials/footer.view.php");
    ?>
    <?php
    require base_path("views/partials/scripts.view.php");
    ?>
</body>

</html>