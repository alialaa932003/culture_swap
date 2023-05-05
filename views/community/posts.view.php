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
                            <div class="col-12">
                                <div class="article">
                                    <div class="article-header">
                                        <div class="date">
                                            <span>07</span>
                                            <span>may 12</span>
                                        </div>
                                        <div class="heading-header">
                                            <h3>
                                                <a href="#">Where watch English movies free?</a>
                                            </h3>
                                            <div class="company-content">
                                                <div class="item">
                                                    <a href="#">
                                                        <i class="fa fa-user" aria-hidden="true"></i>
                                                        ali alaa
                                                    </a>
                                                </div>
                                                <div class="item">
                                                    <span>
                                                        <i class="fa fa-folder-open" aria-hidden="true"></i>
                                                        host
                                                    </span>

                                                </div>
                                                <div class="item">
                                                    <span>
                                                        <i class="fa fa-location" aria-hidden="true"></i>
                                                        norway
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="article-image">
                                        <a href="#">
                                            <button class="love">
                                                <span>
                                                    <i class="fa-regular fa-heart"></i>
                                                </span>
                                            </button>
                                            <img src=<?= "${ASSET_URL}assets/imgs/home/header3.webp" ?> alt="">
                                        </a>

                                    </div>
                                    <div class="article-content">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque quibusdam saepe deleniti a eaque laborum, minima aliquid provident ipsa tempora iure, in vero itaque eum molestiae eveniet totam voluptas neque.</p>
                                        <div class="details">
                                            <a href="#" class="second-btn">
                                                read more
                                            </a>
                                            <div class="review">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="col-12">
                                <div class="article">
                                    <div class="article-header">
                                        <div class="date">
                                            <span>07</span>
                                            <span>may 12</span>
                                        </div>
                                        <div class="heading-header">
                                            <h3>
                                                <a href="#">Where watch English movies free?</a>
                                            </h3>
                                            <div class="company-content">
                                                <div class="item">
                                                    <a href="#">
                                                        <i class="fa fa-user" aria-hidden="true"></i>
                                                        ali alaa
                                                    </a>
                                                </div>
                                                <div class="item">
                                                    <span>
                                                        <i class="fa fa-folder-open" aria-hidden="true"></i>
                                                        host
                                                    </span>

                                                </div>
                                                <div class="item">
                                                    <span>
                                                        <i class="fa fa-location" aria-hidden="true"></i>
                                                        norway
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="article-image">
                                        <a href="#">
                                            <button class="love">
                                                <span>
                                                    <i class="fa-regular fa-heart"></i>
                                                </span>
                                            </button>
                                            <img src=<?= "${ASSET_URL}assets/imgs/home/header3.webp" ?> alt="">
                                        </a>

                                    </div>
                                    <div class="article-content">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque quibusdam saepe deleniti a eaque laborum, minima aliquid provident ipsa tempora iure, in vero itaque eum molestiae eveniet totam voluptas neque.</p>
                                        <div class="details">
                                            <a href="#" class="second-btn">
                                                read more
                                            </a>
                                            <div class="review">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="col-12">
                                <div class="article">
                                    <div class="article-header">
                                        <div class="date">
                                            <span>07</span>
                                            <span>may 12</span>
                                        </div>
                                        <div class="heading-header">
                                            <h3>
                                                <a href="#">Where watch English movies free?</a>
                                            </h3>
                                            <div class="company-content">
                                                <div class="item">
                                                    <a href="#">
                                                        <i class="fa fa-user" aria-hidden="true"></i>
                                                        ali alaa
                                                    </a>
                                                </div>
                                                <div class="item">
                                                    <span>
                                                        <i class="fa fa-folder-open" aria-hidden="true"></i>
                                                        host
                                                    </span>

                                                </div>
                                                <div class="item">
                                                    <span>
                                                        <i class="fa fa-location" aria-hidden="true"></i>
                                                        norway
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="article-image">
                                        <a href="#">
                                            <button class="love">
                                                <span>
                                                    <i class="fa-regular fa-heart"></i>
                                                </span>
                                            </button>
                                            <img src=<?= "${ASSET_URL}assets/imgs/home/header3.webp" ?> alt="">
                                        </a>

                                    </div>
                                    <div class="article-content">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque quibusdam saepe deleniti a eaque laborum, minima aliquid provident ipsa tempora iure, in vero itaque eum molestiae eveniet totam voluptas neque.</p>
                                        <div class="details">
                                            <a href="#" class="second-btn">
                                                read more
                                            </a>
                                            <div class="review">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>






                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-blog">
                        <div class="search">
                            <h4>search</h4>
                            <form action="">
                                <input type="search" placeholder="search">
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

                                <li>
                                    <a href="#">
                                        <i class="fa fa-comment" aria-hidden="true"></i>
                                        admin on Love In 21st
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-comment" aria-hidden="true"></i>
                                        admin on My Generation
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-comment" aria-hidden="true"></i>
                                        nilofer on the giant ship
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-comment" aria-hidden="true"></i>
                                        imran on Gnome Alone
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-comment" aria-hidden="true"></i>
                                        imran on Kimozy-The Dragon </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="postsPagination">
                    <a href="./posts?page=1" class="pagiItem">1</a>
                    <a href="./posts?page=2" class="pagiItem">2</a>
                    <a href="" class="pagiItem">3</a>
                    <a href="#" class="pagiItem">4</a>
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