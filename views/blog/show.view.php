<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
</head>

<body>
    <?php
    require base_path("views/partials/head.view.php");
    ?>
    <link rel="stylesheet" href="/culture_swap/public/assets/css/blog.css">
    <title>blog</title>

    <?php
    require base_path("views/partials/nav.view.php");
    ?>


    <section class="blogDetails section-padding">
        <div class="container">
            <div class="head">
                <h2 class="heading">
                    post details
                </h2>
            </div>
            <div class="row">
                <div class="col-lg-4">
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
                </div>
                <div class="col-lg-8">
                    <div class="details">
                        <div class="image">
                            <img src=<?= "${ASSET_URL}assets/imgs/home/header3.webp" ?> alt="">
                            <button class="love">
                                <span>
                                    <i class="fa-regular fa-heart"></i>
                                </span>
                            </button>
                        </div>
                        <div class="detailsContent">
                            <h2>Your Free Movie Streaming Purposes</h2>
                            <div class="total">
                                <div class="totalItem">
                                    <span class="totalIcon"><i class="fa fa-heart" aria-hidden="true"></i></span>
                                    <span class="totalCount">20</span>
                                </div>
                                <div class="totalItem">
                                    <span class="totalIcon"><i class="fa fa-comment" aria-hidden="true"></i></span>
                                    <span class="totalCount">20</span>
                                </div>
                            </div>

                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque assumenda sequi repudiandae magni quisquam rerum inventore quas ullam iste, suscipit fuga enim deserunt at maiores, sed excepturi ratione error culpa.
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta nihil non nisi maxime amet voluptate culpa rem porro explicabo sit, ex adipisci molestiae, debitis possimus illum fugiat quaerat harum sed?
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita ullam nulla cum! Dignissimos eius nobis quos velit? Veniam repudiandae corporis esse iusto obcaecati nesciunt accusantium excepturi est? Nesciunt, ad?
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
            <form class="addComment">
                <label for="comment">add comment</label>
                <textarea name="comment" id="" cols="30" rows="10"></textarea>
                <button class="main-btn " type="submit">submit</button>
            </form>

        </div>
    </section>
    <div class="allComments">
        <div class="container">
            <div class="comment row">
                <div class="col-lg-2">
                    <div class="user">
                        <div class="userImg">
                            <img src=<?= "${ASSET_URL}assets/imgs/home/header4.webp" ?> alt="">
                        </div>
                        <div class="userContent">
                            <h3>ali alaa eldin</h3>
                        </div>
                    </div>

                </div>
                <div class="col-lg-10">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit rem accusantium nostrum aliquid. Explicabo odit soluta itaque obcaecati provident optio maiores totam aperiam asperiores rerum repudiandae, vel esse saepe non.</p>
                    <div class="like">
                        <button class="likeBtn active"><i class="fa fa-heart"></i></button>
                        <span class="likeCounters">25</span>
                    </div>
                </div>
            </div>
            <div class="comment row">
                <div class="col-lg-2">
                    <div class="user">
                        <div class="userImg">
                            <img src=<?= "${ASSET_URL}assets/imgs/home/header4.webp" ?> alt="">
                        </div>
                        <div class="userContent">
                            <h3>ali alaa eldin</h3>
                        </div>
                    </div>

                </div>
                <div class="col-lg-10">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit rem accusantium nostrum aliquid. Explicabo odit soluta itaque obcaecati provident optio maiores totam aperiam asperiores rerum repudiandae, vel esse saepe non.</p>
                    <div class="like">
                        <button class="likeBtn"><i class="fa fa-heart"></i></button>
                        <span class="likeCounters">25</span>
                    </div>
                </div>
            </div>
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