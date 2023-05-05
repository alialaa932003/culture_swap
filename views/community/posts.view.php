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
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title " id="exampleModalLabel">add post</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="postItem">
                                <label for="title">title</label>
                                <input placeholder="enter title" name="title" type="text">
                            </div>
                            <div class="postItem">
                                <label for="content">content</label>
                                <textarea placeholder="enter content" name="content" type="text"></textarea>
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
            <div class="row">
                <div class="col-lg-8">
                    <div class="left-blog">
                        <div class="row">




                            <?php foreach ($results as $post) : ?>
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
                                                    <a href="./post?id=<?= $post['post_id'] ?>"><?= $post['title'] ?></a>
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
                                            <a href="./post?id=<?= $post['post_id'] ?>">
                                                <button class="love">
                                                    <span>
                                                        <i class="fa-regular fa-heart"></i>
                                                    </span>
                                                </button>
                                                <img src=<?= "${ASSET_URL}assets/imgs/home/header3.webp" ?> alt="">
                                            </a>

                                        </div>
                                        <div class="article-content">
                                            <p><?= $post['content'] ?></p>
                                            <div class="details">
                                                <a href="./post?id=<?= $post['post_id'] ?>" class="second-btn">
                                                    read more
                                                </a>
                                                <div class="review">


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                            <?php if (!$totalResults) : ?>
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
                            <div class="item">
                                <div class="image">
                                    <a href="#">
                                        <img src=<?= "${ASSET_URL}assets/imgs/home/header5.webp" ?> alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <h5>
                                        <a href="#">
                                            Where Watch English Movies Free?
                                        </a>
                                    </h5>
                                    <span>
                                        <i class="fa fa-clock" aria-hidden="true"></i>

                                        12 mar 2020
                                    </span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="image">
                                    <a href="#">
                                        <img src=<?= "${ASSET_URL}assets/imgs/home/header3.webp" ?> alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <h5>
                                        <a href="#">
                                            Where Watch English Movies Free?
                                        </a>
                                    </h5>
                                    <span>
                                        <i class="fa fa-clock" aria-hidden="true"></i>

                                        12 mar 2020
                                    </span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="image">
                                    <a href="#">
                                        <img src=<?= "${ASSET_URL}assets/imgs/home/header4.webp" ?> alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <h5>
                                        <a href="#">
                                            Where Watch English Movies Free?
                                        </a>
                                    </h5>
                                    <span>
                                        <i class="fa fa-clock" aria-hidden="true"></i>

                                        12 mar 2020
                                    </span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="image">
                                    <a href="#">
                                        <img src=<?= "${ASSET_URL}assets/imgs/home/header3.webp" ?> alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <h5>
                                        <a href="#">
                                            Where Watch English Movies Free?
                                        </a>
                                    </h5>
                                    <span>
                                        <i class="fa fa-clock" aria-hidden="true"></i>

                                        12 mar 2020
                                    </span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="image">
                                    <a href="#">
                                        <img src=<?= "${ASSET_URL}assets/imgs/home/header5.webp" ?> alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <h5>
                                        <a href="#">
                                            Where Watch English Movies Free?
                                        </a>
                                    </h5>
                                    <span>
                                        <i class="fa fa-clock" aria-hidden="true"></i>

                                        12 mar 2020
                                    </span>
                                </div>
                            </div>
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

                    <?php if (count($paginationLinks) != 1) : ?>
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
</body>

</html>