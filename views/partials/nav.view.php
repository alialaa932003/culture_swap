<?php
$userData = $_SESSION['user'];
// echo "<br>";
// echo "<pre>";
// var_dump($userData);
// echo "</pre>";

?>
<nav class="navbar navbar-expand-lg active ">
    <div class="container-fluid">
        <a class="navbar-brand" href="/culture_swap/">culture swap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/culture_swap/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/culture_swap/about">how it is work</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/culture_swap/faq">support</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/culture_swap/posts">community</a>
                </li>
                <?php if ($userData['type'] == 'traveller') : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/culture_swap/favourites">favourites</a>
                    </li>
                <?php endif; ?>
                <?php if (!empty($userData)) : ?>
                    <li class="nav-item">
                        <a class="nav-link userInfo" href="#">
                            <div class="user_img">
                                <img src=<?= $userData['profileImg'] ?> alt="">

                            </div>
                            <h4><?= $userData['name'] ?></h4>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (empty($userData)) : ?>
                    <li class="nav-item">
                        <a class=" navJoinBtn second-btn" href="#">join now</a>
                    </li>
                <?php endif; ?>
                <?php if (!empty($userData)) : ?>
                    <div class="dropdown notification">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bell"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li class="noti-item ">
                                <span class="noti-icon red-noti">
                                    <i class="fa-regular fa-heart"></i>
                                </span>
                                <div>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit est rem quaerat doloremque ab error voluptates ex, aperiam eaque odit! Perspiciatis sequi, magni suscipit nihil optio dolorem ducimus maiores consequuntur.</p>
                                    <form class="noti-actions">
                                        <button class="second-btn" type="submit">accept</button>
                                        <button class="main-btn" type="submit">cancel</button>

                                    </form>
                                </div>
                            </li>
                            <li class="noti-item ">
                                <span class="noti-icon green-noti">
                                    <i class="fa-regular fa-bell"></i>
                                </span>
                                <div>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit est rem quaerat doloremque ab error voluptates ex, aperiam eaque odit! Perspiciatis sequi, magni suscipit nihil optio dolorem ducimus maiores consequuntur.</p>
                                    <form class="noti-actions">
                                        <button class="second-btn" type="submit">accept</button>
                                        <button class="main-btn" type="submit">cancel</button>

                                    </form>
                                </div>
                            </li>
                            <li class="noti-item ">
                                <span class="noti-icon purple-noti">
                                    <i class="fa-regular fa-comment"></i>
                                </span>
                                <div>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit est rem quaerat doloremque ab error voluptates ex, aperiam eaque odit! Perspiciatis sequi, magni suscipit nihil optio dolorem ducimus maiores consequuntur.</p>
                                    <div class="noti-actions">
                                        <a href="#" class="second-btn" type="submit">view post</a>

                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <button class="logoutBtn second-btn">logout</button>
                <?php endif; ?>

            </ul>

        </div>
    </div>
</nav>