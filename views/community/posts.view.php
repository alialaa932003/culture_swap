<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
</head>

<?php
require base_path("views/partials/head.view.php");
?>
<link rel="stylesheet" href="/culture_swap/public/assets/css/blogs.css">
<title>blogs</title>

<body>
    <?php
    require base_path("views/partials/nav.view.php");
    ?>




    <!--------------------------------------------------------------------------------------------------start blog content--------------------->

    <section class="section-padding blog-content">

        <div class="container">
            <section class="header-pages blog-header">
                <div class="content-header">
                    <div class="head">
                        <h2 class="heading">
                            news update
                        </h2>
                        <button class="main-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">add post</button>
                    </div>

                </div>
            </section>
            <div class="addPost modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content" action="/culture_swap/posts" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h2 class="modal-title " id="exampleModalLabel">add post</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="postItem">
                                <label for="title">title</label>
                                <input class="title" placeholder="enter title" name="title" type="text">
                            </div>
                            <div class="postItem">
                                <label for="content">content</label>
                                <textarea class="postContent" placeholder="enter content" name="content" type="text"></textarea>
                            </div>
                            <div class="postItem">
                                <label for="image">image</label>
                                <input class="postImg" placeholder="enter image" name="image" type="file">
                            </div>
                            <span class="error"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="main-btn" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="second-btn">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="left-blog">
                        <div class="row">




                            <?php foreach ($results as $post) : ?>
                                <?php if (isset($post)) : ?>
                                    <div class="col-12">
                                        <div class="article">
                                            <div class="article-header">
                                                <div class="date">

                                                    <span>
                                                        <?= (new DateTime($post['date']))->format('d') ?>
                                                    </span>
                                                    <span><?= (new DateTime($post['date']))->format('M') ?> <?= (new DateTime($post['date']))->format('y') ?></span>
                                                </div>
                                                <div class="heading-header">
                                                    <h3>
                                                        <a href="/culture_swap/post?id=<?= $post['post_id'] ?>"><?= $post['title'] ?></a>
                                                    </h3>
                                                    <div class="company-content">
                                                        <div class="item">
                                                            <a href="#">
                                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                                <?= $post['first_name'] ?>
                                                                <?= $post['last_name'] ?>
                                                            </a>
                                                        </div>
                                                        <div class="item">
                                                            <span>
                                                                <i class="fa fa-folder-open" aria-hidden="true"></i>
                                                                <?= $post['type'] == 1 ? "host" : "traveller" ?>
                                                            </span>

                                                        </div>
                                                        <div class="item">
                                                            <span>
                                                                <i class="fa fa-location" aria-hidden="true"></i>
                                                                <?= $post['country'] ?>
                                                            </span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="article-image">
                                                <a href="/culture_swap/post?id=<?= $post['post_id'] ?>">
                                                    <form action="/culture_swap/posts" method="POST">
                                                        <input type="hidden" name="loveVal" value=<?= $post['post_id'] ?>>
                                                        <button class="love" type="submit" name="subLove">
                                                            <span>
                                                                <?php if (in_array($post['post_id'], $user_loves)) :  ?>
                                                                    <i class="fa-solid fa-heart"></i>
                                                                <?php endif;  ?>
                                                                <?php if (!in_array($post['post_id'], $user_loves)) :  ?>
                                                                    <i class="fa-regular fa-heart"></i>
                                                                <?php endif;  ?>
                                                            </span>
                                                        </button>
                                                    </form>
                                                    <img src="<?= $post['img'] ?> " alt="">
                                                </a>

                                            </div>
                                            <div class=" article-content">
                                                <p><?= $post['content'] ?></p>
                                                <div class="details">
                                                    <a href="/culture_swap/post?id=<?= $post['post_id'] ?>" class="second-btn">
                                                        read more
                                                    </a>
                                                    <div class="review">


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            <?php endforeach; ?>
                            <?php if (!$totalResults && $post['search']) : ?>
                                <p class="searchNot">
                                    search not found
                                </p>

                            <?php endif; ?>










                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-blog">
                        <div class="search">
                            <h4>search</h4>
                            <form action="" method="GET">
                                <input name="search" type="search" placeholder="search">
                                <button class="second-btn subSearch" type="submit">submit</button>
                            </form>
                        </div>
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

                        <div class="recent-comments">
                            <h4>recent comments</h4>
                            <ul>
                                <?php foreach ($recentComments as $comment) : ?>
                                    <li>
                                        <a href="./post?id=<?= $comment['post_id'] ?>">
                                            <i class="fa fa-comment" aria-hidden="true"></i>
                                            <?= $comment['content'] ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="postsPagination">

                    <?php if (isset($paginationLinks)  &&  count($paginationLinks) != 1) : ?>
                        <?= implode(' ', $paginationLinks) ?>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>














    <!--------------------------------------------------------------------------------------------------start trial--------------------->


    <?php
    require base_path("views/partials/footer.view.php");
    ?>
    <?php
    require base_path("views/partials/scripts.view.php");
    ?>
    <script src="public/assets/js/posts.js"></script>
</body>

</html>